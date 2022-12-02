<template>
  <div id="app">
    <message>
    </message>
  </div>
</template>
<script>
import message from './components/Message.vue'
export default {
  // 注册子组件的节点
  components:{
    message
  },
}
</script>
<style lang="scss" scoped>
  .my-active{
 	  background: #007aff;
 	  font-weight: 800;
 	  color: #fff;
 	}
  .mui-input-group .mui-input-row{
    margin-bottom: 10px;
    background: #fff;
  }
  .mui-btn-block{
    padding: 10px 0;
  }
    .login-container{
    display: flex;
    justify-content: center;
    padding-top: 10px;
    span{
      padding: 5px 20px;
      border-radius: 5px;
      font-size: 16px;
    }
  }
</style>