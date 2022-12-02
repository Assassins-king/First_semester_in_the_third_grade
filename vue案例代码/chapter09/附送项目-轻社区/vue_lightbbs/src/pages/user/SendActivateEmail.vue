<template>
  <div>
    <div>
      <p>您的邮箱需要激活，才能继续使用。</p>
      <p><span @click="active" class="link">发送激活邮件</span></p>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      wait: false
    }
  },
  methods: {
    active () {
      if (this.wait) {
        return
      }
      this.wait = true
      this.$http.post('user/sendActivateEmail').then(res => {
        this.wait = false
        if (res.data.code === 0) {
          this.$toastr.e(res.data.msg)
        } else if (res.data.code === 1) {
          this.$toastr.s(res.data.msg)
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
  color: #007BFF;
  text-decoration: underline;
  cursor: pointer;
}
</style>
