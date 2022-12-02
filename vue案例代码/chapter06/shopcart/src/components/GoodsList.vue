<template>
  <div class="list">
    <div class="item" v-for="goods in goodslist" :key="goods.id">
      <div class="item-l">
        <img class="item-img" :src="goods.src">
      </div>
      <div class="item-r">
        <div class="item-title">{{ goods.title }}</div>
        <div class="item-price">{{ goods.price | currency }}</div>
        <div class="item-opt">
          <button @click="add(goods)">加入购物车</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState, mapActions } from 'vuex'

export default {
  computed: mapState({
    goodslist: state => state.goods.list
  }),
  methods: mapActions('shopcart', ['add']),
  created () {
    this.$store.dispatch('goods/getList')
  },
  filters: {
    currency (value) {
      return '¥ ' + value
    }
  }
}
</script>

<style>
.item {
  border-bottom: 1px dashed #ccc;
  padding: 10px;
}
.item::after {
  content: "";
  display: block;
  clear: both;
}
.item-l {
  float: left;
  font-size: 0;
}
.item-r {
  float: left;
  padding-left: 20px;
}
.item-img {
  width: 100px;
  height: 100px;
  border: 1px solid #ccc;
}
.item-title {
  font-size: 14px;
  margin-top: 10px;
}
.item-price {
  margin-top: 10px;
  color: #f00;
  font-size: 15px;
}
.item-opt {
  margin-top: 10px;
}
.item-opt button {
  border: 0;
  background: coral;
  color: #fff;
  padding: 4px 5px;
  cursor: pointer;
}
</style>
