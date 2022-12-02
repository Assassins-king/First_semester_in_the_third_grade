<template>
  <nav class="mui-bar mui-bar-tab">
    <router-link class="mui-tab-item-lib" :to="{name: 'home'}">
      <span class="mui-icon mui-icon-home"></span>
      <span class="mui-tab-label">首页</span>
    </router-link>
    <router-link class="mui-tab-item-lib" :to="{name: 'category'}">
      <span class="mui-icon mui-icon-personadd"></span>
      <span class="mui-tab-label">分类</span>
    </router-link>
    <router-link class="mui-tab-item-lib" :to="{name: 'shopcart'}">
      <span class="mui-icon mui-icon-extra mui-icon-extra-cart">
        <span class="mui-badge" id="badge">{{ $store.getters['shopcart/getSelectedCount'] }}</span>
      </span>
      <span class="mui-tab-label">购物车</span>
    </router-link>
    <router-link class="mui-tab-item-lib" :to="{name: 'user'}">
      <span class="mui-icon mui-icon-gear"></span>
      <span class="mui-tab-label">我的</span>
    </router-link>
  </nav>
</template>

<style scoped>
.mui-bar-tab .mui-tab-item-lib.mui-active {
  color: #007aff;
}

.mui-bar-tab .mui-tab-item-lib {
  display: table-cell;
  overflow: hidden;
  width: 1%;
  height: 50px;
  text-align: center;
  vertical-align: middle;
  white-space: nowrap;
  text-overflow: ellipsis;
  color: #929292;
}

.mui-bar-tab .mui-tab-item-lib .mui-icon {
  top: 3px;
  width: 24px;
  height: 24px;
  padding-top: 0;
  padding-bottom: 0;
}

.mui-bar-tab .mui-tab-item-lib .mui-icon ~ .mui-tab-label {
  font-size: 11px;
  display: block;
  overflow: hidden;
  text-overflow: ellipsis;
}
</style>
