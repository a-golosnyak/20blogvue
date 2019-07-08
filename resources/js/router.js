import Vue from 'vue';
import axios from 'axios';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import HomePage from './components/HomePage.vue';
import ListingPage from './components/ListingPage.vue';
import SavedPage from './components/SavedPage.vue';
import LoginPage from './components/LoginPage.vue';

let router = new VueRouter({
  mode: 'history',
  routes: [
    { path: '/', component: HomePage, name: 'home' },
    { path: '/listing/:listing', component: ListingPage, name: 'listing' },
    { path: '/saved', component: SavedPage, name: 'saved' },
    { path: '/login', component: LoginPage, name: 'login' }
  ],
});

export default router;
