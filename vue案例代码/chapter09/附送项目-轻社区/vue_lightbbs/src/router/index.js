import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

var router = new Router({
  routes: [
    { path: '/', name: 'home', component: resolve => require(['@/pages/Home.vue'], resolve), meta: { title: '首页' } },
    { path: '/register', name: 'register', component: resolve => require(['@/pages/Register.vue'], resolve), meta: { title: '用户注册' } },
    { path: '/login', name: 'login', component: resolve => require(['@/pages/Login.vue'], resolve), meta: { title: '用户登录' } },
    {
      path: '/user', name: 'user', redirect: '/user/profile', component: resolve => require(['@/pages/User.vue'], resolve),
      children: [
        { path: 'profile', name: 'user/profile', component: resolve => require(['@/pages/user/Profile.vue'], resolve), meta: { title: '个人信息' } },
        { path: 'avatar', name: 'user/avatar', component: resolve => require(['@/pages/user/Avatar.vue'], resolve), meta: { title: '修改头像' } },
        { path: 'email', name: 'user/email', component: resolve => require(['@/pages/user/Email.vue'], resolve), meta: { title: '修改邮箱' } },
        { path: 'password', name: 'user/password', component: resolve => require(['@/pages/user/Password.vue'], resolve), meta: { title: '修改密码' } },
        { path: 'send_activate_email', name: 'user/send_activate_email', component: resolve => require(['@/pages/user/SendActivateEmail.vue'], resolve), meta: { title: '发送激活邮件' } }
      ]
    },
    { path: '/activate_account', name: 'activate_account', component: resolve => require(['@/pages/ActivateAccount.vue'], resolve), meta: { title: '激活账号' } },
    { path: '/category', name: 'category', component: resolve => require(['@/pages/Category.vue'], resolve), meta: { title: '分类管理' } },
    { path: '/post', name: 'post', component: resolve => require(['@/pages/TopicEdit.vue'], resolve), meta: { title: '发布主题' } },
    { path: '/show/:id', name: 'topic_show', component: resolve => require(['@/pages/TopicShow.vue'], resolve), meta: { title: '查看话题' } },
    { path: '/cate/:cate/page/:page', name: 'topic_list', component: resolve => require(['@/pages/Home.vue'], resolve), meta: { title: '话题列表' } },
    { path: '/edit/:id', name: 'edit', component: resolve => require(['@/pages/TopicEdit.vue'], resolve), meta: { title: '编辑话题' } },
  ],
  linkActiveClass: 'active',
  mode: 'history'
})

router.beforeEach((to, from, next) => {
  if (to.meta.title) {
    document.title = to.meta.title + ' - 轻社区'
  }
  next()
})

export default router
