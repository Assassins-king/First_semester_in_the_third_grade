<template>
  <Login>

      <template v-slot:left>
        <a href="http://localhost:8080"  class='center' >登录</a>
      </template>

      <template v-slot:center>
      <a  class='center' >注册</a>
      </template>

  </Login>

</template>

<script>



import Login from "@/components/Login";
export default {
  name: "App",
  components: {Login},
}
</script>

<style>
.left
 {
  width: 50%;
}

.center {
  flex: 1;
}



.center:hover {
  background-color: rgb(255, 208, 0);
}

.left:hover {
  background-color: rgb(255, 208, 0);
}
</style>