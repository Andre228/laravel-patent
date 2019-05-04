import VueRouter from 'vue-router';
import post_component from '../components/PostsComponents/post_component';
import example_component from '../components/ExampleComponent';
import Vue from 'vue'

Vue.use(VueRouter);

 const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/posts',
            component: require('../components/PostsComponents/post_component.vue')
        },
        {
            path: '/example',
            component: require('../components/ExampleComponent.vue'),
        },
    ],
});

 export default router;