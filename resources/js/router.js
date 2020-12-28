import { createRouter, createWebHistory } from 'vue-router'
import App from './components/App.vue'

const routes = [
    {
        path: "/",
        name: "App",
        component: App
    }
]

const routerHistory = createWebHistory();

const router = createRouter({
    history: routerHistory,
    routes
})

export default router;