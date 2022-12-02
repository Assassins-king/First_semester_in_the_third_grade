// 该文件专门用于创建整个应用的路由器
import VueRouter from 'vue-router'
//引入组件


import Pay from "@/components/Pay";
import Send from "@/components/Send";
import Receive from "@/components/Receive";

//创建并暴露一个路由器
export default new VueRouter({
	routes:[
		{
			path:'/pay',
			component:Pay,
		},
		{
			path:'/send',
			component:Send,
		},
		{
			path:'/receive',
			component:Receive,
		}
	]
})
