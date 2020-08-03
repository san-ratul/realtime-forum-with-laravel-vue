import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Login from '../components/Auth/Login.vue'
import Logout from '../components/Auth/Logout.vue'
import Signup from '../components/Auth/Signup.vue'
import Forum from '../components/Forum/Forum.vue'
import Read from '../components/Forum/Read.vue'
import Create from '../components/Forum/Create.vue'
const routes = [
    { path: '/login', component: Login },
    { path: '/logout', component: Logout },
    { path: '/signup', component: Signup },
    { path: '/forum', component: Forum, name: 'forum' },
    { path: '/ask', component: Create, name: 'ask' },
    { path: '/question/:slug', component: Read, name: 'read' },
]

const router = new VueRouter({
    routes, // short for `routes: routes`
    hashbang: false,
    mode: 'history',
})

export default router