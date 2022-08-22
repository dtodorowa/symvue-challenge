import { createApp } from 'vue'
import {createRouter, createWebHistory} from 'vue-router'

import IndexDashboard from './components/IndexDashboard.vue'
import PolicyTablePage from './components/PolicyTablePage.vue'
import InfoPage from './components/InfoPage.vue'
import AddPolicyPage from './components/AddPolicyPage.vue'
import EditPolicyPage from './components/EditPolicyPage.vue'
import './index.css'




const router = createRouter({
    history: createWebHistory(),
    routes: [{
            path: '/implicit/callback',
            component: IndexDashboard
        },
        {
            path: '/policies',
            component: PolicyTablePage
        },
        {
            path: '/',
            component: InfoPage
        },
        {
            path: '/add-policy',
            component: AddPolicyPage
        },
        {
            path: '/edit-policy/:id',
            component: EditPolicyPage
        },
    ]
})

const app = createApp(IndexDashboard)
    .use(router)
    .mount('#app');

app.component('IndexDashboard', IndexDashboard);
