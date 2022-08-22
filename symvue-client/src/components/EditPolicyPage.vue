<template>
	<form class="space-y-8 divide-y divide-gray-200">
		<div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
			<div>
				<div>
					<h3 class="text-lg leading-6 font-medium text-gray-900">
						Edit Policy
					</h3>
					<p class="mt-1 max-w-2xl text-sm text-gray-500">This page allows you to edit a policy that's fetched dynamically using the routing parameter.</p>
				</div>
			</div>

			<content-loader v-if="isLoading" :speed="2" :animate="true">
			</content-loader>

			<div v-else class="my-real-content">
				<div class="space-y-6 sm:space-y-5">
					<div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
						<label for="customer" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
							Customer
						</label>
						<div class="mt-1 sm:mt-0 sm:col-span-2">
							<input
                                disabled	
								v-model="policy.customer.name"
								type="text"
								name="premium"
								id="premium"
								autocomplete="premium"
								class="h-10 px-1 max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"/>
						</div>
					</div>

					<div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
						<label for="insurer" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
							Insurer
						</label>
						<div class="mt-1 sm:mt-0 sm:col-span-2">
							<input
                                disabled	
								v-model="policy.insurer.name"
								type="text"
								name="premium"
								id="premium"
								autocomplete="premium"
								class="h-10 px-1 max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"/>
						</div>
					</div>

					<div
						class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
						<label or="ptype" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
							Policy Type
						</label>
						<div class="mt-1 sm:mt-0 sm:col-span-2">
								<input
                                disabled	
								v-model="policy.policyType.type"
								type="text"
								name="premium"
								id="premium"
								autocomplete="premium"
								class="h-10 px-1 max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"/>
						</div>
					</div>

					<div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
						<label for="premium" class="block text-sm font-medium text-gray-700 sm:mt-px  sm:pt-2">
							Premium
						</label>
						<div class="mt-1 sm:mt-0 sm:col-span-2">
							<input
								required
								v-model="policy.premium"
								type="text"
								name="premium"
								id="premium"
								autocomplete="premium"
								class="h-10 px-1 max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md"/>
						</div>
					</div>
				</div>
			</div>

			<div class="pt-5">
				<div class="flex justify-end">
					<button
						@click.stop.prevent="onFormSubmit()"
						:disabled="isLoading"
						type="submit"
						class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
						Edit Policy
					</button>
				</div>
			</div>
		</div>
	</form>

<!-- debug -->
	<!-- <div class="mt-6">
		<pre>{{ policy }}</pre>
	</div> -->
</template>

<script>
import axios from "axios";
import { ContentLoader } from "vue-content-loader";
import { ref } from "vue";

export default {
	setup() {
      // TODO: isplay message to user and redirect
		const policy = ref({});

		function onFormSubmit() {		
            try {
                 axios
				.put("http://localhost:8000/policy/"+this.policy.id, this.policy)
				.then(response => {
                    this.policy.id = response.data.id;
                    alert('Successfully updated the policy. Go to the policies page to see it.')});
            } catch (error) {
                console.log(error) //expert debugging
            }   
		}
		return {
			policy,
			onFormSubmit,
            
		};
	},
	data() {
		return {
			isLoading: true,
            policyId:this.$route.params.id
		};
	},
	async created() {
		try {
			const response = await axios.get("http://localhost:8000/policy/"+this.policyId);
			this.policy = response.data;
			this.isLoading = false;

		} catch (e) {
			// handle errors here
		}
	},
	components: {
		ContentLoader
	},
};
</script>
