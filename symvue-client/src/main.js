import { createApp } from 'vue'
import {createRouter, createWebHistory} from 'vue-router'

import IndexDashboard from './components/IndexDashboard.vue'
import PolicyPage from './components/PolicyPage.vue'
import InfoPage from './components/InfoPage.vue'
import AddPolicyPage from './components/AddPolicyPage.vue'
import './index.css'

const router = createRouter({
    history: createWebHistory(),
    routes: [{
            path: '/implicit/callback',
            component: IndexDashboard
        },
        {
            path: '/policies',
            component: PolicyPage
        },
        {
            path: '/',
            component: InfoPage
        },
        {
            path: '/add-policy',
            component: AddPolicyPage
        },
    ]
})

const app = createApp(IndexDashboard)
    .use(router)
    .mount('#app');

app.component('IndexDashboard', IndexDashboard);