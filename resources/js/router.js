import { createRouter, createWebHistory } from 'vue-router'
import App from './components/App.vue'
import Forums from './components/sections/Forums.vue'
import Forum from './components/sections/Forum.vue'
import Topic from './components/sections/Topic.vue'

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
    },
    {
        // takes thread id
        path: "/topics/:slug",
        name: "topic",
        component: Topic
    }
]

const routerHistory = createWebHistory();

const router = createRouter({
    history: routerHistory,
    routes
})

export default router;