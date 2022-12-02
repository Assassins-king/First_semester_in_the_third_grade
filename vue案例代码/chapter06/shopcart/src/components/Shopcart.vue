<template>
  <div class="list">
    <div class="item" v-for="item in items" :key="item.id">
      <div class="item-l">
        <img class="item-img" :src="item.src">
      </div>
      <div class="item-r">
        <div class="item-title">
          {{ item.title }}
          <small>x {{ item.num }}</small>
        </div>
        <div class="item-price">{{ item.price | currency }}</div>
        <div class="item-opt">
          <button @click="del(item.id)">删除</button>
        </div>
      </div>
    </div>
    <div class="item-total" v-if="items.length">商品总价：{{ total | currency }}</div>
    <div class="item-empty" v-else>购物车中暂无商品</div>
  </div>
</template>

<script>
import { mapGetters, mapState, mapActions } from 'vuex'

export default {
  computed: {
    ...mapState({
      items: state => state.shopcart.items
    }),
    ...mapGetters('shopcart', { total: 'totalPrice' })
  },
  methods: mapActions('shopcart', ['del']),
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
.item-title > small {
  color: #888;
  font-size: 12px;
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
}
.item-total {
  margin: 10px;
  font-size: 15px;
}
.item-empty {
  text-align: center;
  margin-top: 20px;
  font-size: 15px;
}
</style>
