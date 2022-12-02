<template>
<div>
  <Banner>
    <template v-slot:left>
      <a href="https://www.baidu.com" class='left' >百度</a>
    </template>

    <template v-slot:center>
      <a href="http://taobao.com" class='center'>淘宝</a>
    </template>



    <template v-slot:right>
      <a href="https://www.firefox.com.cn/" class='right'>火狐</a>
    </template>
  </Banner>
</div>


</template>

<script>

import Banner from "@/components/Banner";

export default {
  name: "App",
  components: {Banner},
  component:{Banner},
}
</script>

<style>
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