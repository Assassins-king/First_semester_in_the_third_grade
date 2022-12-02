<template>
  <div>
    <div v-if="success">
      <p class="text-success">{{ msg }}</p>
      <router-link :to="{ name: 'home' }">返回首页</router-link>
    </div>
    <p v-else>正在激活您的账号……</p>
  </div>
</template>

<script>
export default {
  data () {
    return {
      msg: '',
      success: false
    }
  },
  created () {
    var key = this.$route.query.key
    if (key) {
      var data = { key: key }
      this.$http.post('user/activateAccount', data).then(res => {
        if (res.data.code === 0) {
          this.$toastr.e(res.data.msg)
        } else if (res.data.code === 1) {
          this.msg = res.data.msg
          this.success = true
          if (this.$store.state.isLogin) {
            this.$store.commit('setUserActive', true)
          }
        }
      }).catch(() => {
        this.$toastr.e('操作失败，服务器异常。')
      })
    }
  }
}
</script>

<style scoped>
.link {
  margin-top: 10px;
  color: #007bff;
  text-decoration: underline;
  cursor: pointer;
}
</style>
