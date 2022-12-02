<template>
  <div id="app">
    <div class="content">
      <router-view />
    </div>
    <div class="bottom">
      <router-link to="/" tag="div">商品列表</router-link>
      <router-link to="/shopcart" tag="div">购物车</router-link>
    </div>
  </div>
</template>

<script>
export default { name: 'App' }
</script>

<style>
html,
body {
  height: 100%;
}
body {
  margin: 0;
  font-size: 12px;
  box-sizing: border-box;
}
</style>

<style scoped>
#app {
  height: 100%;
  display: flex;
  flex-direction: column;
}
.content {
  flex: 1;
  overflow-y: scroll;
}
.bottom {
  height: 40px;
  display: flex;
  border-top: 1px solid #ccc;
}
.bottom > div {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  color:#444;
}
.bottom > div:not(:last-child) {
  border-right: 1px solid #ccc;
}
.bottom > div.router-link-exact-active {
  color:#F18741;
  font-weight:bold;
  background:#FEF5EF;
}
</style>
