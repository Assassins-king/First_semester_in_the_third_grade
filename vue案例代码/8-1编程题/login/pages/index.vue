<template>
  <div id="app">
   <Login/>
  </div>
</template>
<script>
import Login from '@/components/Login'
export default {
  // 注册子组件的节点
  components:{
      Login
  },
}
</script>
<style lang="scss" scoped>
     body,html{
        background:black;
        height: 100%;
        width:100%;
        position: relative;
        top: 0;
        left: 0;  
    }
</style>