<template>
  <div>
    <!-- 唯一的根容器 -->
    <div class="form-input">
      <input type="text" name="user" placeholder="请输入手机号/邮箱" class="form-input">
    </div>
    <div class="form-input">
      <input type="password" name="psd" placeholder="请输入密码" class="form-input">
    </div>
    <button type="button" class="primary-button"><span>登录</span></button>
  </div>

</template>

<script>

export default {
  name: 'Login',
  data () {
    return {

    }
  },


}
</script>

<style scoped>


</style>

