//该文件用于创建Vuex中最为核心的store
import Vue from 'vue'
//引入Vuex
import Vuex from 'vuex'
//应用Vuex插件
Vue.use(Vuex)

//准备actions——用于响应组件中的动作
const actions = {
	add(context, payload) {
		context.commit('add', payload)
	},
	del(context, payload) {
		context.commit('del', payload)
	},
	edit(context, payload) {
		console.log(payload)
		context.commit('edit', payload)
	},
}
//准备mutations——用于操作数据（state）
const mutations = {
	add(state, payload) {
		state.list.push({
			id: state.list.length,
			info: payload,
			isShow: false,
			isFind: true
		})
	},
	del(state, payload) {
		state.list.splice(payload, 1)
	},
	edit(state, payload) {
		state.list.splice(payload.key, 1, payload.value)
	}

}
//准备state——用于存储数据
const state = {
	list: [{
		id: 0,
		info: '列表0',
		isShow: false,
		isFind: true
	}, {
		id: 1,
		info: '列表0',
		isShow: false,
		isFind: true
	}, {
		id: 2,
		info: '列表0',
		isShow: false,
		isFind: true
	}, {
		id: 3,
		info: '列表3',
		isShow: false,
		isFind: true
	}, {
		id: 4,
		info: '列表4',
		isShow: false,
		isFind: true
	}, {
		id: 5,
		info: '列表0',
		isShow: false,
		isFind: true
	}, {
		id: 6,
		info: '列表6',
		isShow: false,
		isFind: true
	}, {
		id: 7,
		info: '列表0',
		isShow: false,
		isFind: true
	}, {
		id: 8,
		info: '列表8',
		isShow: false,
		isFind: true
	}, {
		id: 9,
		info: '列表9',
		isShow: false,
		isFind: true
	}],
	newList: []
}

//创建并暴露store
export default new Vuex.Store({
	actions,
	mutations,
	state,
})