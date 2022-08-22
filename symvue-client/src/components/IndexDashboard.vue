<template>
    <body class="flex flex-col min-h-screen ">
        <header class=" bg-indigo-600  f;">
            <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" aria-label="Top">
                <div class="w-full py-6 flex items-center justify-between border-b border-indigo-500 lg:border-none">
                    <div class="flex items-center">
                        <a href="/">
          
                  <img class="h-10 w-auto" src="logo.png" alt="" />
                </a>
                        <div class="hidden ml-10 space-x-8 lg:block">
                            <router-link v-for="link in navigation" :key="link.name" :to="link.href" class="text-base font-medium text-white hover:text-indigo-50">
                                {{ link.name }}
                            </router-link>
                        </div>
                    </div>
    
                </div>
            </nav>
        </header>
    
    
        <main class="flex-grow">
            <div class="py-1">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <!-- Replace with your content -->
                    <div class="px-4 py-8 sm:px-0">
                        <router-view></router-view>
                    </div>
                    <!-- /End replace -->
                </div>
    
            </div>
        </main>
    
        <footer class="bg-white ">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 md:flex md:items-center md:justify-between lg:px-8">
                <div class="flex justify-center space-x-6 md:order-2">
                    <a v-for="item in footerNavigation" :key="item.name" :href="item.href" class="text-gray-400 hover:text-gray-500">
                <span class="sr-only">{{ item.name }}</span>
                <component :is="item.icon" class="h-6 w-6" aria-hidden="true" />
              </a>
                </div>
                <div class="mt-8 md:mt-0 md:order-1">
                    <p class="text-center text-base text-gray-400">&copy; 2022 by Daniela Todorova</p>
                </div>
            </div>
        </footer>
    </body>
</template>

<script setup>
import {
    defineComponent,
    h
} from 'vue'


const navigation = [{
        name: 'Home',
        href: '/'
    },
    {
        name: 'Policies',
        href: '/policies'
    },
    {
        name: 'Add Policy',
        href: '/add-policy'
    },
]

const footerNavigation = [{
        name: 'GitHub',
        href: 'https://github.com/dtodorowa',
        icon: defineComponent({
            render: () =>
                h('svg', {
                    fill: 'currentColor',
                    viewBox: '0 0 24 24'
                }, [
                    h('path', {
                        'fill-rule': 'evenodd',
                        d: 'M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z',
                        'clip-rule': 'evenodd',
                    }),
                ]),
        }),
    },

]
</script>