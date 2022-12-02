<template>
  <div id="content">
    <div class="title">
      <router-link  active-class="active" to="/loginpwd">账号登录</router-link>
      <router-link active-class="active" to="/logincode">二维码登录</router-link>
    </div>
    <transition appear
                name="animate__animated animate__bounce"
                enter-active-class="animate__bounceInUp"
                leave-active-class="animate__backOutUp">
      <router-view></router-view>
    </transition>
  </div>
</template>

<script>
import Login_code from "./components/Login_code";
import Login_pwd from "./components/Login_pwd";
import 'animate.css'
export default {
  name: "App",
  components: {Login_code,Login_pwd},

}
</script>

<style>
#content{
  width: 400px;;
  margin: 60px auto;
}
.title{
  height: 50px;
  border-bottom: 1px solid #e1e7ec;
  text-align: center;
}
#content a{
  text-decoration: none;
  color: black;
  font-size: 16px;
  background: #f1f1f1;
  padding: 5px 10px;
  margin: 0 10px;
  border-radius: 5px;
}
.form-input{
  height: 46px;
  line-height: 46px;
  margin-top: 10px;;
}
input{
  box-sizing: border-box;
  padding: 0 25px;
  background: #eef3f5;
  border-radius: 8px;
  width: 100%;
  height: 100%;
  border: 0;
  outline: 0;
  font-size: 14px;
}
#content .active{
  background-color: #09f;
  color: #fff;
}
.primary-button{
  background: linear-gradient(325deg,#4aa4ff,#1058fa);
  width: 100%;
  height: 42px;
  border-radius: 23px;
  border: 0;
  outline: none;
  color: #fff;
  letter-spacing: 10px;
  font-weight: 500;
  font-size: 16px;
  cursor: pointer;
  margin-top: 30px;
}
.pic{
  width: 200px;
  height: 200px;
  margin: 0 auto;
}
.pic img{
  width: 100%;
  height: 100%;
}




</style>