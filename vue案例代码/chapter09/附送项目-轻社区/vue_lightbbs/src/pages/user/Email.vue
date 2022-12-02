<template>
  <div>
    <transition appear appear-active-class="animated fadeIn">
      <div class="card border-secondary">
        <div class="card-header">修改邮箱</div>
        <div class="card-body">
          <div class="form-group">
            <label>输入原密码：</label>
            <input type="password" class="form-control-file" v-model="form.password" />
            <small class="text-secondary">为了确保安全，必须输入原密码。</small>
          </div>
          <div class="form-group">
            <label>输入新邮箱：</label>
            <input type="text" class="form-control-file" v-model="form.email" />
          </div>
          <input @click="submit" type="button" class="btn btn-primary" value="提交修改" />
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
export default {
  data () {
    return {
      form: {
        password: '',
        email: ''
      }
    }
  },
  methods: {
    submit () {
      var data = this.form
      this.$http.post('user/updateEmail', data).then(res => {
        if (res.data.code === 0) {
          this.$toastr.e(res.data.msg)
        } else if (res.data.code === 1) {
          this.$toastr.s(res.data.msg)
          this.$router.push({ name: 'user/send_activate_email' })
        }
      }).catch(() => {
        this.$toastr.e('服务器异常。')
      })
    }
  }
}
</script>
