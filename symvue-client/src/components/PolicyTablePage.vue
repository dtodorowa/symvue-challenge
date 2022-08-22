<template>
	<div>
		<header class=" mb-6">
			<div class="max-w-7xl mx-auto px-4">
				<h1 class=" text-3xl tracking-tight font-bold leading-tight text-gray-900">
					Policies
				</h1>
			</div>
		</header>

		<div v-show="!isLoading" class="w-full  gap-10 mb-6">
			<input
				v-model="filter"
				class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
				id="username"
				type="text"
				placeholder="Search policies"/>
		</div>

		<div class="content-wrapper">
			<content-loader v-if="isLoading" :speed="2" :animate="true"></content-loader>

			<div v-else class="my-real-content">
				<table class="table w-full ">
					<thead>
						<tr>
							<th>Customer</th>
							<th>Customer Address</th>
							<th>Insurer</th>
							<th>Policy Type</th>
							<th>Premium</th>
						</tr>
					</thead>

					<tbody>
						<template v-for="p in filteredPolicies" v-bind:key="p.id">
							<tr>
								<td>{{ p.customer.name }}</td>
								<td>{{ p.customer.address }}</td>
								<td>{{ p.insurer.name }}</td>
								<td>{{ p.policyType.type }}</td>
								<td>{{ p.premium }}</td>
								<td>             
                                    <router-link :to="{path:setRouter(p.id)}">
                                        <div
                                            class="inline-flex items-center p-1  rounded-full shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            <PencilIcon class="h-5 w-5" aria-hidden="true" />
                                        </div>
                                    </router-link>                           
								</td>
								<td>
									<button @click="deletePolicy(p.id)" class="inline-flex items-center p-1  rounded-full shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"> <TrashIcon class="h-5 w-5" aria-hidden="true" />
									</button>
								</td>
							</tr>
						</template>
					</tbody>
				</table>

				<div class="grid place-items-end">
					<router-link :to="'add-policy'" class=" ml-0 px-5 py-2  items-center  border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
						Add Policy
					</router-link>
				</div>
			</div>
		</div>
	</div>

</template>

<script>
import { PencilIcon, TrashIcon } from "@heroicons/vue/outline";

import { ContentLoader } from "vue-content-loader";
import axios from "axios";

export default {
	components: {
		ContentLoader,
		PencilIcon,
        TrashIcon
	},
	data() {
        function setRouter(id){
            return "/edit-policy/"+id;
        }

        function editPolicy(id) {
            console.log(id)
            this.modalTitle="Edit Department";
        }

		//TODO: Notify User that the record has been successfully deleted
		//TODO: Refresh table
		//TODO: UX extras -> ask before deleting
		function deletePolicy(index) {
			axios.delete("http://localhost:8000/policy/" + index).then(response => {
				// alert("Success");
				this.policies = this.policies.filter(p => p.id !== index);
				return response;
			});
		}

		return {
			filter: "",
			policies: {},
			isLoading: true,
			deletePolicy,
            editPolicy,
            setRouter
		};
	},
	mounted() {
		setTimeout(() => {
			this.myData = "Example Data";
		}, 5000);
	},
	computed: {
		filteredPolicies() {
			return this.policies.filter(policy => {
				const customer = policy.customer.name.toString().toLowerCase();
				const customerAddress = policy.customer.address.toString().toLowerCase();
				const insurer = policy.insurer.name.toLowerCase();
				const policyType = policy.policyType.type.toLowerCase();
				const searchTerm = this.filter.toLowerCase();

				return (
					customer.includes(searchTerm) ||
					insurer.includes(searchTerm) ||
					customerAddress.includes(searchTerm) ||
					policyType.includes(searchTerm)
				);
			});
		}
	},
	async created() {
		try {
			const response = await axios.get("http://localhost:8000/policy");
			this.policies = response.data;
			this.isLoading = false;
			console.log(this.policies);
		} catch (e) {
			// handle authentication errors here
		}
	}
};
</script>
