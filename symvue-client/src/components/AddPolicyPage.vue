<template>



    <form class="space-y-8 divide-y divide-gray-200">
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">

            <div>
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Add a new policy</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Enter all the data...</p>
                </div>
            </div>

  <content-loader v-if="isLoading" :speed="2" :animate="true">
  </content-loader>

<div v-else class="my-real-content">
            <div class="space-y-6 sm:space-y-5">

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="country" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Customer
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <select id="country" name="country" autocomplete="country-name"
                            class="h-10 px-1  max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                           <option v-for="c in this.customers" :key="c.id">{{c.name}}</option>
                        </select>
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="country" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Insurer
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <select id="country" name="country" autocomplete="country-name"
                            class="h-10 px-1  max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                <option v-for="i in this.insurers" :key="i.id">{{i.name}}</option>
                        </select>
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="country" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Policy Type
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <select id="country" name="country" autocomplete="country-name"
                            class="h-10 px-1  max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                            <option v-for="pType in this.policyTypes" :key="pType.id">{{pType.type}}</option>
                        </select>
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="first-name" class="block text-sm font-medium text-gray-700 sm:mt-px  sm:pt-2"> Premium
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="text" name="first-name" id="first-name" autocomplete="given-name"
                            class="h-10 px-1 max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md" />
                    </div>
                </div>

            </div>
        </div>

        <div class="pt-5">
            <div class="flex justify-end">
                <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm 
                font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none 
                focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Add Policy
                </button>
            </div>
        </div>
     </div>
    </form>

   

</template>

<script >
    import axios from 'axios'
    import { ContentLoader} from 'vue-content-loader';

    export default {
        components: {
            ContentLoader
        },
        data() {
            return {
                customers: {},
                insurers: {},
                policyTypes: {},  
                isLoading: true,
            }
        },
            async created() {
            try {
                const response2 = await axios.get('http://localhost:8000/customer')
                const response = await axios.get('http://localhost:8000/insurer')
                const response3 = await axios.get('http://localhost:8000/policyType')
                
                this.customers = response2.data
                this.insurers = response.data
                this.policyTypes = response3.data

                this.isLoading = false
            } catch (e) {
                // handle authentication error here
            }

        },
    } 
    </script>