<template>
  <div class="shopcar-container">
    <div class="goods-list">
      <div class="mui-card">
        <div class="mui-card-content" v-for="(item, i) in goodslist" :key="item.id">
          <div class="mui-card-content-inner flex">
            <!-- 复选框 -->
            <div class="mui-input-row mui-checkbox mui-left">
              <label>&nbsp;</label>
              <input type="checkbox" v-model="getGoodsSelected[item.id]"
                @change="selectedChange(item.id, getGoodsSelected[item.id])" :disabled="item.num == 0" />
            </div>
            <!-- 中间商品图片 -->
            <img :src="item.image" />
            <!-- 右侧部分 -->
            <div class="info">
              <h1>{{ item.name }}</h1>
              <p class="flex">
                <span class="price">¥{{ item.price }}</span>
                <numbox v-if="item.num" @count="countChange" :initcount="getGoodsCount[item.id]" :max="item.num"
                  :goodsid="item.id" size="min"></numbox>
                <span v-else style="margin-right:20px;">该商品暂时无货</span>
                <a href="#" @click.prevent="remove(item.id, i)">删除</a>
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- 商品结算区域 -->
      <div class="mui-card">
        <div class="mui-card-content">
          <div class="mui-card-content-inner balance">
            <div class="left">
              <p>总计不含运费</p>
              <p>
                已勾选商品
                <span class="red">{{ getSelectedCount }}</span> 件，总价
                <span class="red">¥{{ getSelectedAmount }}</span>
              </p>
            </div>
            <mt-button type="primary" @click="createOrder">去结算</mt-button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapState } from 'vuex'
import numbox from '../components/numbox.vue'

export default {
  data () {
    return {
      goodslist: []
    }
  },
  computed: {
    ...mapState('shopcart', ['car']),
    ...mapGetters('shopcart', ['getGoodsCount', 'getGoodsSelected', 'getSelectedCount', 'getSelectedGoods']),
    getSelectedAmount () {
      var goods = this.getSelectedGoods
      var amount = 0
      this.goodslist.forEach(item => {
        if (goods[item.id]) {
          amount += item.price * goods[item.id].count
        }
      })
      return amount
    }
  },
  created () {
    this.getGoodsList()
  },
  methods: {
    getGoodsList () {
      var idArr = []
      this.car.forEach(item => idArr.push(item.id))
      if (idArr.length <= 0) {
        return
      }
      this.$indicator.open({
        text: '加载中'
      })
      var params = { ids: idArr }
      this.$http.get('shopcart', { params: params }).then(res => {
        this.$indicator.close()
        if (res.data.code === 1) {
          this.goodslist = res.data.data
          this.goodslist.forEach(item => {
            if (item.num == 0) {
              this.selectedChange(item.id, false)
            }
          })
        }
      })
    },
    countChange (goodsinfo) {
      this.$store.commit('shopcart/updateGoodsInfo', goodsinfo)
    },
    selectedChange (id, val) {
      this.$store.commit('shopcart/updateGoodsSelected', { id: id, selected: val })
    },
    remove (id, index) {
      this.goodslist.splice(index, 1)
      this.$store.commit('shopcart/removeCar', id)
    },
    createOrder () {
      if (this.goodslist.length === 0) {
        this.$toast('您的购物车为空')
        return
      }
      this.$store.commit('shopcart/setBuy')
      this.$router.push({ name: 'order_create' })
    }
  },
  components: {
    numbox
  }
}
</script>

<style lang="scss" scoped>
.flex {
  display: flex;
}
.shopcar-container {
  background: #eee;
  overflow: hidden;
  .goods-list {
    .mui-card-content-inner {
      align-items: center;
      padding: 10px;
      .mui-checkbox.mui-left input[type="checkbox"] {
        left: 0px;
      }
      .mui-radio.mui-left label,
      .mui-checkbox.mui-left label {
        padding-left: 20px;
        padding-right: 35px;
        padding-bottom: 22px;
      }
    }
    img {
      width: 60px;
    }
    .info {
      margin-left: 10px;
      width: 100%;
      overflow: hidden;
      box-sizing: border-box;
      h1 {
        font-size: 13px;
        font-weight: bold;
        line-height: 20px;
        padding-top: 10px;
      }
      p {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        .price {
          text-align: left;
          font-size: 16px;
          font-weight: 700;
          color: red;
          flex: 1;
        }
        a {
          line-height: 25px;
        }
      }
    }
  }
  .balance {
    display: flex;
    justify-content: space-between;
    align-items: center;
    .red {
      color: red;
      font-weight: bold;
      font-size: 16px;
    }
  }
}
</style>
