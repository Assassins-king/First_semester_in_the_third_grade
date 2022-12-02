<template>
  <div>
    <slot name="left"></slot>
    <slot name='center'></slot>
    <header>
      <h1><span>登录</span></h1>
    </header>
    <div>
      <div>
        <form>
          <input type="text" placeholder="用户名" />
          <input type="password" placeholder="密码"/>
          <button>登录</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: 'Login',
}
</script>

<style scoped>

</style>

