import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import App from './components/App'
import Welcome from './components/Welcome'
import PostsComponent from "./components/PostsComponent";


window.vue = require('vue');

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/home',
            name: 'home',
            component: Welcome
        },
        {
            path: '/posts',
            name: 'posts',
            component: PostsComponent
        },
    ]
});


const app = new Vue({
    el: '#app',
    render: h => h(App),
    router,
});