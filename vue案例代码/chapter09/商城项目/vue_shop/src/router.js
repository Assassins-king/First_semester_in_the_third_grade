import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Home from './pages/Home.vue'
import Category from './pages/Category.vue'
import Shopcart from './pages/Shopcart.vue'
import User from './pages/User.vue'
import Login from './pages/user/Login.vue'
import Register from './pages/user/Register.vue'
import GoodsList from './pages/goods/GoodsList.vue'
import GoodsInfo from './pages/goods/GoodsInfo.vue'
import Address from './pages/user/Address.vue'
import AddressEdit from './pages/user/AddressEdit.vue'
import OrderCreate from './pages/order/OrderCreate.vue'
import OrderList from './pages/order/OrderList.vue'
import OrderShow from './pages/order/OrderShow.vue'
import NewsList from './pages/news/NewsList.vue'
import NewsInfo from './pages/news/NewsInfo.vue'
import PhotoList from './pages/photo/PhotoList.vue'
import PhotoInfo from './pages/photo/PhotoInfo.vue'

var router = new VueRouter({
  routes: [
    { path: '/', redirect: '/home', meta: { title: '首页' } },
    { path: '/home', component: Home, name: 'home', meta: { title: '首页' } },
    { path: '/category', component: Category, name: 'category', meta: { title: '分类' } },
    { path: '/shopcart', component: Shopcart, name: 'shopcart', meta: { title: '购物车' } },
    { path: '/user', component: User, name: 'user', meta: { title: '我的' } },
    { path: '/user/login', component: Login, name: 'login', meta: { title: '登录' } },
    { path: '/user/register', component: Register, name: 'register', meta: { title: '注册' } },
    { path: '/goodslist/:category_id', component: GoodsList, props: true, name: 'goods_list', meta: { title: '商品列表' } },
    { path: '/goodsinfo/:id', component: GoodsInfo, props: true, name: 'goods_info', meta: { title: '商品信息' } },
    { path: '/user/address', component: Address, name: 'address', meta: { title: '收货地址' } },
    { path: '/user/address/add', component: AddressEdit, name: 'address_add', meta: { title: '新增收货地址' } },
    { path: '/user/address/edit/:id', component: AddressEdit, props: true, name: 'address_edit', meta: { title: '编辑收货地址' } },
    { path: '/order/create', component: OrderCreate, name: 'order_create', meta: { title: '下订单' } },
    { path: '/user/address/select', component: Address, name: 'address_select', meta: { title: '选择收货地址' } },
    { path: '/order/list', component: OrderList, name: 'order_list', meta: { title: '我的订单' } },
    { path: '/order/show/:id', component: OrderShow, props: true, name: 'order_show', meta: { title: '查看订单' } },
    { path: '/news/list', component: NewsList, name: 'news_list', meta: { title: '新闻资讯列表' } },
    { path: '/news/show/:id', component: NewsInfo, props: true, name: 'news_show', meta: { title: '查看新闻资讯' } },
    { path: '/photo/list', component: PhotoList, name: 'photo_list', meta: { title: '图片分享列表' } },
    { path: '/photo/show/:id', component: PhotoInfo, props: true, name: 'photo_show', meta: { title: '查看图片' } }
  ],
  linkActiveClass: 'mui-active'
})

router.beforeEach((to, from, next) => {
  if (to.meta.title) {
    document.title = to.meta.title
  }
  next()
})

export default router
