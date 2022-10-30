import Vue from 'vue'
import app from './App.vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import router from './router.js'	// 将路由放到单独的文件中
import './lib/mui/css/mui.css'

new Vue({
  el: '#app',
  render: c => c(app),
  router
})
