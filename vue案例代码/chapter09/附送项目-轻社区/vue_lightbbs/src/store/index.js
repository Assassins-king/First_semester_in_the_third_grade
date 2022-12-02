import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const state = {
  user: {
    id: 0,
    name: '',
    is_active: false,
    role: 'user'
  },
  isLogin: null // null：未知，true：已登录，false：未登录
}

const getters = {}

const actions = {}

const mutations = {
  setUser (state, user) {
    if (user) {
      state.user.id = user.id
      state.user.name = user.name
      state.user.is_active = user.is_active
      state.user.role = user.role
      state.isLogin = true
    } else {
      state.isLogin = false
    }
  },
  logout (state) {
    state.user = {
      id: 0,
      name: '',
      is_active: false,
      role: 'user'
    }
    state.isLogin = false
  },
  setUserActive (state, is_active = true) {
    state.user.is_active = is_active
  }
}

export default new Vuex.Store({
  state,
  getters,
  actions,
  mutations
})
