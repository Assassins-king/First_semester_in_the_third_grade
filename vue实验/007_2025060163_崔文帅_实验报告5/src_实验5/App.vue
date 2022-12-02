<template>
  <div>
  <div class="Navbar">
    <router-link class="left"  active-class="active" to="/pay">待支付</router-link>
    <router-link class="center"  active-class="active" to="/send">待发货</router-link>
    <router-link class="right"  active-class="active" to="/receive">待收货</router-link>
  </div>

    <div class="display">
          <router-view class="com"></router-view>
    </div>

  </div>


</template>

<script>

export default {
  name: "App",
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

.Navbar {
  display: flex;
  height: 44px;
  background-color:white;
  line-height: 44px;
  text-align: center;
}
.right:hover {
  background-color: deepskyblue;
}

.center:hover {
  background-color: deepskyblue;
}

.left:hover {
  background-color: deepskyblue;
}

.display{
  display: flex;
  height: 100px;
  background-color:pink;
  line-height: 100px;
  text-align: center;

}

</style>