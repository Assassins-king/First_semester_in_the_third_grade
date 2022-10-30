import VueRouter from 'vue-router'

// 导入登录和注册对应的路由组件
import Login from './components/Login.vue'
import Register from './components/Register.vue'

var router = new VueRouter({	              // 创建路由对象
  mode: 'history',                        	// 使用history模式
  linkActiveClass: 'my-active',				      // router-link-active
  linkExactActiveClass: 'my-exact-active',	// router-link-exact-active
  routes: [						                      // 配置路由规则
    { path: '/', redirect: '/login' },
    { path: '/login', component: Login, meta: { title: '登录' } },
    { path: '/register', component: Register, meta: { title: '注册' } }
  ]
})

router.beforeEach((to, from, next) => {
  // 路由发生改变修改页面title
  if (to.meta.title) {
    document.title = to.meta.title
  }
  next()
})

export default router
