
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
import App from './App.vue'
import VuePaginate from 'vue-paginate'
import VueResource from 'vue-resource'
import Article from './components/Article.vue'
import ArticleShow from './components/ArticleShow.vue'


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.use(VueResource)
 Vue.use(VueRouter)
 Vue.use(VuePaginate)
// Vue.component('example', require('./components/Example.vue'));
const routes = [
    { path: '/', component: Article },
     { path:'/article/:id',component:ArticleShow,name:'article'},
    // { path:'/discussion',component:Discussion},

    // { path:'/commenttotal',component:CommentTotal},
    // { path:'/userlove',component:UserLove},
    // { path:'/notification',component:Notification},
    // { path:'/editcomment/:id',component:EditComment,name:'editcomment'},
]
const router = new VueRouter({
    routes
})
const app = new Vue({
    el: '#app',
    template: '<App/>',
    components: {App},
    router,
});
