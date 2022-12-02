<template>
  <div>
    <button @click="cancel">{{msg}}</button>
    <transition-group
        appear
        name="animate__animated animate__bounce"
        enter-active-class="animate__backInUp"
        leave-active-class="animate__backOutUp"
    >
     <div class="box" v-show="show" key="1"></div>

    </transition-group>
  </div>
</template>

<script>
import 'animate.css'
export default {
  name: "App",

  data() {
    return {
      show: true,
      msg: '收起'
    }
  },
  methods: {
    cancel() {
      this.show = !this.show;
      if (this.show == false) {
        this.msg = '展开';
      } else if (this.show == true) {
        this.msg = '收起';
      }
    }
  },
}
</script>

<style>
.box{
  margin: 20px;
  width: 150px;
  height: 200px;
  background-color: red;
  text-align: center;
  line-height: 200px;
}
button{
  margin-left: 20px;
}
</style>