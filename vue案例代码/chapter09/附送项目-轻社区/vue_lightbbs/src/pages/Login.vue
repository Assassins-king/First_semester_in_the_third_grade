<template>
  <div class="login">
    <div class="row">
      <div class="col login-logo">
        <h2>LightBBS</h2>
      </div>
      <div class="col login-title">用户登录</div>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" placeholder="用户名" v-model="form.name" />
    </div>
    <div class="form-group">
      <input type="password" class="form-control" placeholder="密码" v-model="form.password" />
    </div>
    <div class="form-group">
      <button class="btn btn-success login-submit" @click="login">登录</button>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      form: {
        name: '',
        password: '',
      }
    }
  },
  methods: {
    login () {
      this.$http.post('user/login', this.form).then(res => {
        if (res.data.code === 0) {
          this.$toastr.e(res.data.msg)
        } else if (res.data.code === 1) {
          this.$store.commit('setUser', res.data.data)
          this.$config.setAuthorization(res.data.data.session_id)
          if (res.data.data.is_active) {
            this.$router.replace({ name: 'home' })
          } else {
            this.$router.replace({ name: 'user/send_activate_email' })
          }
        }
      }).catch(() => {
        this.$toastr.e('登录失败，服务器异常。')
      })
    }
  }
}
</script>

<style scoped>
.login {
  margin-top: 20px;
  padding-top: 30px;
  padding-left: 15px;
  padding-right: 15px;
  border-radius: 0px;
  border: 1px solid #dde2e8;
  background: #ffffff;
}
.login-logo {
  text-align: left;
  color: #fd7e14;
}
.login-title {
  text-align: right;
  font-size: 16px;
  line-height: 60px;
}
.login-submit {
  width: 100%;
}
</style>
