<template>
    <div id="appCon">
        <ul>
            <li>
                <router-link to="/payment">待付款</router-link>
            </li>
            <li>
                <router-link to="/deliver">待发货</router-link>
            </li>
            <li>
                <router-link to="/receive">待收货</router-link>
            </li>
        </ul>
        <!-- 路由匹配到的组件将渲染在这里 -->
        <router-view></router-view>
    </div>
</template>
<script>
    export default {
    data () {
        return {
        
        }
    }
    }
</script>
<style lang="scss">
     *{
        margin: 0;
        padding: 0;
    }
    #appCon{
        width:100%;
    }
    #appCon ul{
        height: 30px;
        list-style: none;
        display: flex;
        flex-wrap: wrap;
        align-content: flex-center;
        align-items: center;
        justify-content: space-around;
        text-align: center;
        
    }
    #appCon>ul>li{
        border: 1px solid red;
        flex: 1;
    }
    li a{
        text-decoration: none;
        line-height: 30px;
        height: 30px;
        display: block;
    }
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