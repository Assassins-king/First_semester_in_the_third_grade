<template>
  <div class="model bg-light">
    <div class="modal-header">
      <h5 class="modal-title small">LightBBS</h5>
    </div>
    <div class="modal-body row" v-if="isLogin">
      <div class="col-3">
        <router-link :to="{ name: 'user' }">
          <img class="rounded" style="width:65px" :src="user.img_url">
        </router-link>
      </div>
      <div class="col-9">
        <div class="mb-2">
          <router-link class="username" :to="{ name: 'user' }">{{ user.name }}</router-link>
        </div>
        <div>
          <router-link :to="{ name: 'post' }" tag="button" class="btn btn-outline-primary btn-sm">发布主题</router-link>
        </div>
      </div>
    </div>
    <div class="modal-body text-center" v-if="isLogin === false">
      <div class="mb-2">
        <router-link :to="{ name: 'register' }" tag="button" class="btn btn-outline-secondary">现在注册</router-link>
      </div>
      <div class="small">
        已注册用户请
        <router-link :to="{ name: 'login' }">登录</router-link>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'

export default {
  computed: {
    ...mapState(['isLogin'])
  },
  data () {
    return {
      user: {}
    }
  },
  created () {
    this.getProfile()
  },
  methods: {
    getProfile () {
      this.$http.get('user/profile').then(res => {
        if (res.data.code === 1) {
          this.user = res.data.data
        }
      }).catch(() => {
        this.$toastr.e('操作失败，服务器异常。')
      })
    }
  }
}
</script>

<style scoped>
.modal-header {
  padding: 0.65rem 1rem;
  border-bottom: 1px solid rgba(0, 0, 0, 0.125);
}
.username {
  color: #666;
}
.username:hover {
  color: #444;
  text-decoration: none;
}
</style>
