import VueRouter from 'vue-router'
// 导入tabbar对应的路由组件
import Message from './components/Message.vue'
import Payment from './components/sub/Payment.vue'
import Deliver from './components/sub/Deliver.vue'
import Receive from './components/sub/Receive.vue'
// 创建路由对象
var router = new VueRouter({
  routes:[// 配置路由规则
    { path: '/', redirect: '/payment'},
    { path: '/message', component: Message},
    { path: '/payment', component: Payment},
    { path: '/deliver', component: Deliver},
    { path: '/receive', component: Receive}
  ],
  linkActiveClass:'my-active'
})
export default router