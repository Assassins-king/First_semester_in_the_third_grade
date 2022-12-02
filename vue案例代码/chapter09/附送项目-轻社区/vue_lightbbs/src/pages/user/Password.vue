<template>
  <div>
    <transition appear appear-active-class="animated fadeIn">
      <div class="card border-secondary">
        <div class="card-header">修改密码</div>
        <div class="card-body">
          <div class="form-group">
            <label>输入原密码：</label>
            <input type="password" class="form-control-file" v-model="form.old_password" />
            <small class="text-secondary">为了确保安全，必须输入原密码。</small>
          </div>
          <div class="form-group">
            <label>输入新密码：</label>
            <input type="password" class="form-control-file" v-model="form.password" />
          </div>
          <div class="form-group">
            <label>再次输入新密码：</label>
            <input type="password" class="form-control-file" v-model="repassword" />
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
        old_password: '',
        password: ''
      },
      repassword: ''
    }
  },
  methods: {
    submit () {
      if (this.password && this.form.password !== this.repassword) {
        this.$toastr.e('两次输入密码不一致')
        return
      }
      this.$http.post('user/updatePassword', this.form).then(res => {
        if (res.data.code === 0) {
          this.$toastr.e(res.data.msg)
        } else if (res.data.code === 1) {
          this.$toastr.s(res.data.msg)
          this.form.old_password = ''
          this.form.password = ''
          this.repassword = ''
        }
      }).catch(() => {
        this.$toastr.e('操作失败，服务器异常。')
      })
    }
  }
}
</script>
