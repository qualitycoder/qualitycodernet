import Vue from 'vue';
import VueRouter from "vue-router";
import Routes from './routes';
import App from './views/App';

let app = new Vue({
    el:'#app',
    router: new VueRouter(Routes),
    render: h => h(App)
});
