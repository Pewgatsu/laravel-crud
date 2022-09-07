import { createRouter, createWebHistory } from 'vue-router';

import HomeComponent from '../components/HomeComponent.vue';
import ShowUsers from '../components/ShowUsers.vue';
import CreateUser from '../components/CreateUser.vue';
import EditUser from '../components/EditUser.vue';
import AddPost from '../components/AddPost.vue';
import Login from '../components/Login.vue';
import UserPosts from '../components/UserPosts.vue';



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
    },
   
    {
        path: '/user/AddPost',
        name: 'AddPost',
        component: AddPost
    },
    {
        path: '/login',
        name: 'Login',
        component: Login
    },
    {
        path: '/user/posts/:id?',
        name: 'UserPosts',
        component: UserPosts
    }
]


const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;