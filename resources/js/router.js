import { createRouter, createWebHistory } from 'vue-router'
import App from './components/App.vue'
import Forums from './components/sections/Forums.vue'
import Forum from './components/singles/Forum.vue'

const routes = [
    {
        path: "/",
        name: "forums",
        component: Forums
    },

    {
        path: "/forums/:slug",
        name: "forum",
        component: Forum
    }
]

const routerHistory = createWebHistory();

const router = createRouter({
    history: routerHistory,
    routes
})

export default router;