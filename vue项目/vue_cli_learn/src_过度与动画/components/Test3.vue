<template>
<div>
  <button @click="isShow= !isShow" >显示/隐藏</button>
  <transition-group
      name="animate__animated animate__bounce"
      :appear="true"
      enter-active-class="animate__flash"
      leave-active-class="animate__bounceOutUp"
  >
    <h1 v-show="isShow" key="1">1111111</h1>
    <h1 v-show="isShow" key="2">6666666</h1>
  </transition-group>

</div>
</template>

<script>
import 'animate.css'
export default {
  name: "Test",
  data(){
    return {
      isShow:true
    }
  },
}
</script>

<style scoped>
h1{
  background: orange;
  /*transition: 1s linear;*/
}

/*.hello-enter,.hello-leave-to{*/
/*  transform: translateX(-100%);*/
/*}*/
/*.hello-enter-active,.hello-leave-active{*/
/*  transition: 1s linear;*/
/*}*/
/*.hello-enter-to,.hello-leave{*/
/*  transform: translateX(0);*/
/*}*/


/*.hello-leave{*/
/*  transform: translateX(0);*/
/*}*/
/*.hello-leave-to{*/
/*  transform: translateX(-100%);*/
/*}*/

/*.hello-leave-active{*/
/*  animation: atguigu 1s reverse;*/
/*}*/

/*@keyframes atguigu {*/
/*  from{*/
/*    transform: translateX(-100%);*/
/*  }*/
/*  to{*/
/*    transform: translateX(0px);*/
/*  }*/
/*}*/
</style>

<!--过渡-->