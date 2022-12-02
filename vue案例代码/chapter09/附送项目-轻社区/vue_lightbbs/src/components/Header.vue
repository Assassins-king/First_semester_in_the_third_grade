<template>
  <div>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
      <div class="navbar-brand header-logo">
        <h4>
          <router-link :to="{ name: 'home' }">LightBBS</router-link>
        </h4>
      </div>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-between" id="collapsibleNavbar">
        <div>
          <input class="form-control" type="text" placeholder="Search" />
        </div>
        <ul class="navbar-nav header-nav" v-if="isLogin">
          <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'user' }">
              <i class="fa fa-user"></i>
              {{ user.name }}
              <span class="small text-danger" v-show="!user.is_active">(待验证)</span>
            </router-link>
          </li>
          <li class="nav-item" v-show="user.role === 'admin'">
            <router-link class="nav-link" :to="{ name: 'post' }">
              <i class="fa fa-paint-brush"></i>发布主题
            </router-link>
          </li>
          <li class="nav-item" v-show="user.role === 'admin'">
            <router-link class="nav-link" :to="{ name: 'category' }">
              <i class="fa fa-list"></i>分类管理
            </router-link>
          </li>
          <li class="nav-item">
            <div @click="logout" class="nav-link logout">
              <i class="fa fa-sign-out"></i>退出
            </div>
          </li>
        </ul>
        <ul class="navbar-nav header-nav" v-if="isLogin === false">
          <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'login' }">
              <i class="fa fa-sign-in"></i>登录
            </router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'register' }">
              <i class="fa fa-user-plus"></i>注册
            </router-link>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</template>

<script>
import { mapState } from 'vuex'

export default {
  computed: {
    ...mapState(['user', 'isLogin'])
  },
  created () {
    this.getLoginUser()
  },
  methods: {
    getLoginUser () {
      this.$http.get('user/userinfo').then(res => {
        if (res.data.code === 0) {
          this.$store.commit('setUser', false)
        } else if (res.data.code === 1) {
          this.$store.commit('setUser', res.data.data)
        }
      }).catch(() => {
        this.$toastr.e('获取用户信息失败。')
      })
    },
    logout () {
      this.$http.post('user/logout').then(() => {
        this.$store.commit('logout')
        this.$config.setAuthorization('')
      }).catch(() => {
        this.$toastr.e('操作失败，服务器异常。')
      })
    }
  }
}
</script>

<style lang="scss" scoped>
.header-logo {
  margin-top: 5px;
  margin-right: 20px;
  a {
    color: #007bff;
  }
}
.header-nav {
  a {
    color: #777;
  }
  .fa-sign-in {
    margin-left: 2px;
    margin-right: 11px;
  }
  .fa-user-plus {
    margin-right: 8px;
  }
  .fa-user {
    margin-left: 2px;
    margin-right: 5px;
  }
  .fa-sign-out {
    margin-right: 5px;
  }
  .logout {
    cursor: pointer;
  }
  .fa-list {
    margin-right: 6px;
  }
  .fa-paint-brush {
    margin-right: 6px;
  }
}
</style>
