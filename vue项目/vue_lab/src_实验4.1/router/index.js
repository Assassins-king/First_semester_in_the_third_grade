// 该文件专门用于创建整个应用的路由器
import VueRouter from 'vue-router'
//引入组件

import Login_pwd from "@/components/Login_pwd";
import Login_code from "@/components/Login_code";

//创建并暴露一个路由器
export default new VueRouter({
	routes:[
		{
			path:'/loginpwd',
			component:Login_pwd
		},
		{
			path:'/logincode',
			component:Login_code
		}
	]
})
