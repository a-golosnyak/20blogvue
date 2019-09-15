import Vue from 'vue';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import HomePage from './components/HomePage.vue';
import PostIndex from './components/PostIndex.vue';
import PostCreateUpdate from './components/PostCreateUpdate.vue';
import LoginPage from './components/LoginPage.vue';

let router = new VueRouter({
  mode: 'history',
  routes: [
    {
        path: '/',
        component: HomePage,
        name: 'home'
    },
    {
        path: '/post/create',
        component: PostCreateUpdate,
        name: 'post.create',
        props: true,
    },
    {
        path: '/post/:id/edit',
        component: PostCreateUpdate,
        name: 'post.edit',
        props: true,
    },
    {
        path: '/post/:id',
        component: PostIndex,
        name: 'post.show',
        props: true,
    },
    {
        path: '/login',
        component: LoginPage,
        name: 'login'
    }

  ],
});

export default router;
