<template>
<Banner>
  <template id="left">
    <div class='left'>百度</div>
  </template>

  <template id="center">
    <div class='center'>淘宝</div>
  </template>

  <template id="right">
    <div class='right'>火狐</div>
  </template>
</Banner>
</template>

<script>
import Banner from "./Banner";

export default {
  name: "App",
  component:{Banner}
}
</script>

<style scoped>
.left,
.right {
  width: 33%;
}

.center {
  flex: 1;
}

.right:hover {
  background-color: rgb(255, 208, 0);
}

.center:hover {
  background-color: rgb(255, 208, 0);
}

.left:hover {
  background-color: rgb(255, 208, 0);
}
</style>