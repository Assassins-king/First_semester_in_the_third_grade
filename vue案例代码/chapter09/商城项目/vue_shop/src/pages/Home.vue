<template>
  <div>
    <swiper :imgList="imgList"></swiper>
    <ul class="mui-table-view mui-grid-view mui-grid-9">
      <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
        <router-link :to="{ name: 'news_list' }" class="title">
          <img src="../assets/images/menu1.png" />
          <div class="mui-media-body">新闻资讯</div>
        </router-link>
      </li>
      <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
        <router-link :to="{ name: 'photo_list' }" class="title">
          <img src="../assets/images/menu2.png" />
          <div class="mui-media-body">图片分享</div>
        </router-link>
      </li>
      <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
        <router-link :to="{ name: 'category' }" class="title">
          <img src="../assets/images/menu3.png" />
          <div class="mui-media-body">商品购买</div>
        </router-link>
      </li>
      <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
        <img src="../assets/images/menu4.png" />
        <div class="mui-media-body">留言反馈</div>
      </li>
      <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
        <img src="../assets/images/menu5.png" />
        <div class="mui-media-body">视频专区</div>
      </li>
      <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
        <img src="../assets/images/menu6.png" />
        <div class="mui-media-body">联系我们</div>
      </li>
    </ul>
  </div>
</template>

<script>
import swiper from '../components/swiper.vue'
export default {
  data () {
    return {
      imgList: []
    }
  },
  created () {
    this.getImgList()
  },
  methods: {
    getImgList () {
      this.$indicator.open({
        text: '加载中'
      })
      this.$http.get('imglist').then(res => {
        this.$indicator.close()
        if (res.data.code === 0) {
          this.$toast('加载轮播图失败')
        } else {
          this.imgList = res.data.data
        }
      })
    }
  },
  components: {
    swiper
  }
}
</script>

<style lang="scss" scoped>
.mui-grid-view.mui-grid-9 {
  background-color: #fff;
  border: none;
  img {
    width: 60px;
    height: 60px;
  }
}
.mui-table-view-cell > a.title {
  display: inline;
}
.mui-grid-view.mui-grid-9 .mui-table-view-cell {
  border: 0;
}
.mui-media-body {
  font-size: 14px;
}
</style>
