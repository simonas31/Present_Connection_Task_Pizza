import { createRouter, createWebHashHistory, createWebHistory } from 'vue-router'

import PizzasIndex from '/resources/js/components/PizzaFormComponent.vue'
import OrdersComponent from '/resources/js/components/OrdersComponent.vue'
/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const routes = [
    {
        path: '/',
        component: PizzasIndex
    },
    {
        path: '/orders',
        component: OrdersComponent
    }
]

export default createRouter({
    history: createWebHashHistory(),
    routes
})