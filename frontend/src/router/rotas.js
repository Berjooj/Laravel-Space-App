import VueRouter from "vue-router";
import Dashboard from "@/views/Dashboard";
import Astronautas from "@/views/Astronautas";
import Naves from "@/views/Naves";

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'Dashboard',
            component: Dashboard
        },
        {
            path: '/astronautas',
            name: 'Astronautas',
            component: Astronautas
        },
        {
            path: '/naves',
            name: 'Naves',
            component: Naves
        },
    ]
})