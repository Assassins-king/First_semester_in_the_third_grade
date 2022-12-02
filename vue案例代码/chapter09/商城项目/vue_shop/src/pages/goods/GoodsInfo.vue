<template>
  <div class="goods-info">
    <!-- 商品展示图 -->
    <div class="mui-card">
      <div class="mui-card-content">
        <div class="mui-card-content-inner">
          <swiper :imgList="goodsinfo.album"></swiper>
        </div>
      </div>
    </div>
    <!-- 购物车小球动画 -->
    <transition @before-enter="beforeEnter" @enter="enter" @after-enter="afterEnter">
      <div class="ball" v-show="ballFlag" ref="ball"></div>
    </transition>
    <!-- 商品购买区域 -->
    <div class="mui-card">
      <div class="mui-card-header">{{ goodsinfo.name }}</div>
      <div class="mui-card-content">
        <div class="mui-card-content-inner">
          <p class="price">
            定价：
            <span>¥{{ goodsinfo.price }}</span>
          </p>
          <div v-if="goodsinfo.num">
            <p class="go-num">
              购买数量
              <numbox @count="countChange" :max="goodsinfo.num" initcount="1" :goodsid="goodsinfo.id"></numbox>
            </p>
            <p class="go-buy">
              <mt-button type="primary" size="small" @click="buy">立即购买</mt-button>
              <mt-button type="danger" size="small" @click="addShopcart">加入购物车</mt-button>
            </p>
          </div>
          <div v-else>该商品暂时无货</div>
        </div>
      </div>
    </div>
    <!-- 商品参数区域 -->
    <div class="mui-card">
      <div class="mui-card-header">商品参数</div>
      <div class="mui-card-content">
        <div class="mui-card-content-inner">
          <p>商品卖点：{{ goodsinfo.sell_point }}</p>
          <p>库存情况：{{ goodsinfo.num }}件</p>
          <p>上架时间：{{ goodsinfo.create_time }}</p>
        </div>
      </div>
      <div class="mui-card-header">商品详情</div>
      <div class="good-desc">
        <div class="content" v-html="goodsinfo.content"></div>
      </div>
    </div>
  </div>
</template>

<script>
import swiper from '../../components/swiper.vue'
import numbox from '../../components/numbox.vue'

export default {
  data () {
    return {
      goodsinfo: {},     // 获取到的商品信息
      selectedCount: 1,  // 保存商品数量，默认是1
      ballFlag: false,   // 控制小球的显示和隐藏
    }
  },
  props: ['id'],
  created () {
    this.getGoodsInfo()
  },
  methods: {
    getGoodsInfo () {
      this.$indicator.open({
        text: '加载中'
      })
      let params = { id: this.id }
      this.$http.get('goodsinfo', { params: params }).then(res => {
        this.$indicator.close()
        if (res.data.code === 0) {
          this.$toast(res.data.msg)
        } else if (res.data.code === 1) {
          if (res.data.data) {
            this.goodsinfo = res.data.data
          } else {
            this.$messagebox.alert('商品不存在').then(() => {
              this.$router.go(-1)
            })
          }
        } else {
          this.$toast('加载失败，服务器异常')
        }
      })
    },
    countChange (goodsinfo) {
      this.selectedCount = goodsinfo.count
    },
    addShopcart () {
      this.ballFlag = !this.ballFlag
      this.$store.commit('shopcart/addCar', {
        id: this.id,
        count: this.selectedCount,
        selected: true
      })
    },
    // 小球动画-进入前
    beforeEnter (el) {
      el.style.transform = 'translate(0,0)'
    },
    // 小球动画-进入
    enter (el, done) {
      el.offsetWidth // 必须加上此行代码，否则没有动画效果
      // 获取小球在页面中的位置
      const ballPosition = this.$refs.ball.getBoundingClientRect();
      // 获取徽标在页面中的位置
      const badgePosition = document.getElementById('badge').getBoundingClientRect()
      const xDist = badgePosition.left - ballPosition.left
      const yDist = badgePosition.top - ballPosition.top
      el.style.transform = `translate(${xDist}px,${yDist}px)`;
      el.style.transition = 'all .5s cubic-bezier(.4, -0.3, 1, .68)'
      done()
    },
    // 小球动画-进入后
    afterEnter () {
      this.ballFlag = !this.ballFlag
    },
    buy () {
      this.$store.commit('shopcart/setBuy', { id: this.$props.id, count: this.selectedCount })
      this.$router.push({ name: 'order_create' })
    }
  },
  components: {
    swiper,
    numbox
  }
}
</script>

<style lang="scss" scoped>
.goods-info {
  background: #f1f1ff;
  overflow: hidden;
  .price {
    span {
      color: red;
      font-size: 14px;
      font-weight: bold;
    }
  }
  .go-buy {
    display: flex;
    margin: 10px 0 0px;
    justify-content: center;
    button {
      margin: 0 5px;
    }
  }
  .good-desc {
    background: #fff;
    padding: 5px;
    h3 {
      font-size: 16px;
      color: #226aff;
      text-align: center;
      margin: 15px 0;
    }
    .content {
      font-size: 14px;
      line-height: 28px;
      img {
        width: 100%;
      }
    }
  }
  .go-num {
    div {
      margin-left: 10px;
    }
  }
  .ball {
    width: 15px;
    height: 15px;
    border-radius: 50%;
    position: absolute;
    background: red;
    z-index: 99;
    left: 132px;
    top: 390px;
    transform: translate(93px, 230px);
  }
}
</style>
