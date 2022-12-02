<template>
  <div class="register">
    <div class="row">
      <div class="col register-logo">
        <h2>LightBBS</h2>
      </div>
      <div class="col register-title">用户注册</div>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" placeholder="用户名" v-model="form.name" />
    </div>
    <div class="form-group">
      <input type="email" class="form-control" placeholder="邮箱" v-model="form.email" />
    </div>
    <div class="form-group">
      <input type="password" class="form-control" placeholder="密码" v-model="form.password" />
    </div>
    <div class="form-group">
      <input type="password" class="form-control" placeholder="确认密码" v-model="repassword" />
    </div>
    <div class="form-group">
      <button class="btn btn-success register-submit" @click="register">注册</button>
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
        email: ''
      },
      repassword: ''
    }
  },
  methods: {
    register () {
      if (this.form.password && this.form.password !== this.repassword) {
        this.$toastr.e('两次输入密码不一致')
        return
      }
      this.$http.post('user/register', this.form).then(res => {
        if (res.data.code === 0) {
          this.$toastr.e(res.data.msg)
        } else if (res.data.code === 1) {
          this.$toastr.s(res.data.msg)
          this.$store.commit('setUser', res.data.data)
          this.$config.setAuthorization(res.data.data.session_id)
          this.$router.replace({ name: 'user/send_activate_email' })
        }
      }).catch(() => {
        this.$toastr.e('操作失败，服务器异常。')
      })
    }
  }
}
</script>

<style scoped>
.register {
  margin-top: 20px;
  padding-top: 30px;
  padding-left: 15px;
  padding-right: 15px;
  border-radius: 0px;
  border: 1px solid #dde2e8;
  background: #ffffff;
}
.register-logo {
  text-align: left;
  color: #fd7e14;
}
.register-title {
  text-align: right;
  font-size: 16px;
  line-height: 60px;
}
.register-submit {
  width: 100%;
}
</style>
