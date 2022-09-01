import { createRouter, createWebHistory } from 'vue-router';

import HomeComponent from '../components/HomeComponent.vue';
import ShowUsers from '../components/ShowUsers.vue';
import CreateUser from '../components/CreateUser.vue';
import EditUser from '../components/EditUser.vue';


const routes = [
    {
        path: '/',
        name: 'Home',
        component: HomeComponent
    },
    {
        path: '/users',
        name: 'Users',
        component: ShowUsers
    },
    {
        path: '/create',
        name: 'Create',
        component: CreateUser
    },
    {
        path: '/edit/user/:id?',
        name: 'Edit',
        component: EditUser
    }
]


const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;