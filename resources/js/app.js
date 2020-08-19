require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import 'bootstrap/dist/css/bootstrap.min.css'

import Homepage from "./layouts/Homepage";
import Index from "./views/Index";
import Create from "./views/Create";
import Update from "./views/Update";

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/home/',
            name: 'index',
            component: Index,
            props: true,

        },
        {
            path: '/home/create',
            name: 'create',
            component: Create,
            props: true,

        },
        {
            path: '/home/update/:id',
            name: 'update',
            component: Update,
            props: (route) => {
                const id = Number.parseInt(route.params.id, 10)
                if (Number.isNaN(id)) {
                    return 0
                }
                return { id }
            }

        },
    ]
})
const app = new Vue({
    el: '#app',
    router,
    components: {Homepage}
});
