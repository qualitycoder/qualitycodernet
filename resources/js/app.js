import ProjectDetail from "./components/ProjectDetail";
import Projects from "./components/Projects";
import Home from "./components/Home";
import About from "./components/About";

require('./bootstrap');

window.Vue = require('vue');
window.VueRouter = require('vue-router');

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home.vue
        },
        {
            path: '/about',
            name: 'about',
            component: About.vue,
        },
        {
            path: '/projects',
            name: 'projects',
            component: Projects.vue,
        },
        {
            path: '/projects/{id}',
            name: 'projectDetail',
            component: ProjectDetail.vue,
        },
    ],
});

const app = new Vue({
    el: '#app',
    router: router
});
