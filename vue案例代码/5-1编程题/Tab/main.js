import Vue from 'vue'  //引入vue.js，因为在webpack.config中进行配置地址了
import app from './App.vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import router from './router.js'
// 导入mui样式
import './lib/mui/css/mui.css'
new Vue({
    el: '#app',
    render: c =>  c(app),
    router
})