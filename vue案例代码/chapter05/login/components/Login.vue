<template>
  <div class="login">
    <div class="content">
      <form class="mui-input-group login-form">
        <div class="mui-input-row">
          <label>账号</label>
          <input type="text" class="mui-input-clear mui-input" placeholder="请输入账号">
        </div>
        <div class="mui-input-row">
          <label>密码</label>
          <input type="password" class="mui-input-clear mui-input" placeholder="请输入密码">
        </div>
      </form>
      <div class="mui-content-padded">
        <button type="button" class="mui-btn mui-btn-block mui-btn-primary">登录</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {}
  }
}
</script>

<style scoped>
  .login-form {
    margin: 30px 0;
    background-color: transparent;
  }
  .mui-input-group .mui-input-row {
    margin-bottom:10px;
    background:#fff;
  }
  .mui-btn-block {
    padding: 10px 0;
  }
</style>
