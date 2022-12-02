import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

import 'bootstrap'
import "bootstrap/dist/css/bootstrap.css"

import 'font-awesome/css/font-awesome.min.css'

import 'highlight.js/styles/paraiso-light.css'
import hljs from 'highlight.js'
Vue.directive('highlight',function (el) {
  let blocks = el.querySelectorAll('pre code');
  blocks.forEach((block)=>{
    hljs.highlightBlock(block)
  })
})

import animated from 'animate.css'
Vue.use(animated)

import config from './config.js'
Vue.use(config)

import http from './http.js'
Vue.use(http)

import toastr from 'vue-toastr'
Vue.use(toastr)

Vue.config.productionTip = false

new Vue({
  render: h => h(App),
  router,
  store
}).$mount('#app')
