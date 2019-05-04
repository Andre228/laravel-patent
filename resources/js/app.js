import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './components/App'
import Hello from './components/ExampleComponent'
import post_component from './components/PostsComponents/post_component'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/posts',
            name: 'home',
            component: post_component
        },
        {
            path: '/example',
            name: 'hello',
            component: Hello,
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});