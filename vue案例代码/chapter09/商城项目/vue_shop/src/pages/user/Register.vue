<template>
  <div>
    <div class="mui-content">
      <form class="mui-input-group">
        <div class="mui-input-row">
          <label>账号</label>
          <input v-model="regForm.username" type="text" class="mui-input-clear mui-input" placeholder="请输入账号" />
        </div>
        <div class="mui-input-row">
          <label>密码</label>
          <input v-model="regForm.password" type="password" class="mui-input-clear mui-input" placeholder="请输入密码" />
        </div>
        <div class="mui-input-row">
          <label>确认</label>
          <input type="password" ref="pwdConfirm" class="mui-input-clear mui-input" placeholder="请确认密码" />
        </div>
        <div class="mui-input-row">
          <label>邮箱</label>
          <input v-model="regForm.email" type="email" class="mui-input-clear mui-input" placeholder="请输入邮箱" />
        </div>
      </form>
      <div class="mui-content-padded">
        <button @click="register" class="mui-btn mui-btn-block mui-btn-primary">注册</button>
      </div>
      <div class="mui-content-padded">
        <p>注册成功后的用户可用于登录</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      regForm: {
        username: '',
        password: '',
        email: ''
      }
    }
  },
  methods: {
    register: function () {
      var pwdConfirm = this.$refs.pwdConfirm.value
      if (this.regForm.username === '') {
        this.$toast('账号不能为空')
        return
      } else if (this.regForm.password === '') {
        this.$toast('密码不能为空')
        return
      } else if (this.regForm.password != pwdConfirm) {
        this.$toast('密码两次输入不一致')
        return
      } else if (this.regForm.email === '') {
        this.$toast('邮箱不能为空')
        return
      }
      this.$indicator.open({
        text: '注册中'
      })
      this.$http.post('register', this.regForm).then(res => {
        this.$indicator.close()
        if (res.data.code === 0) {
          this.$toast(res.data.msg)
        } else {
          this.$store.commit('user/setUser', res.data.data)
          this.$auth.setAuthorization(res.data.data.session_id)
          this.$toast(res.data.msg)
          this.$router.replace({ name: 'user' })
        }
      }).catch(() => {
        this.$toast('注册失败')
      })
    }
  }
}
</script>

<style lang="scss" scoped>
.mui-input-group {
  margin-top: 10px;
  background-color: transparent;
}
.mui-input-group label {
  width: 22%;
}
.mui-input-row:last-child {
  background: #fff;
}
.mui-input-row {
  margin-top: 20px;
  background: #fff;
}
.mui-input-row label ~ input,
.mui-input-row label ~ select,
.mui-input-row label ~ textarea {
  width: 78%;
}
.link-area {
  display: block;
  margin-top: 25px;
  text-align: center;
}
.mui-content-padded {
  margin-top: 30px;
}
</style>

