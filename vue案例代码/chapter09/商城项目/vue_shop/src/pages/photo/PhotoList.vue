<template>
  <div class="photo-con">
    <!-- 顶部滑动条区域 -->
    <div id="slider" class="mui-slider">
      <div id="sliderSegmentedControl"
        class="mui-scroll-wrapper mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
        <div class="mui-scroll">
          <a :class="['mui-control-item', cateId == item.id ? 'mui-active': '']" v-for="item in cates" :key="item.id"
            @tap="getPhotoListByCateId(item.id)">
            {{item.title}}
          </a>
          <!-- 在这里使用tap（只有mui组件才可以使用） -->
        </div>
      </div>
    </div>
    <!-- 图片列表区域 -->
    <ul class="photo-list">
      <router-link v-for="item in list" :key="item.id" :to="{ name: 'photo_show', params: { id: item.id }}" tag="li">
        <img v-lazy="item.img_url"> <!-- 使用图片懒加载 -->
        <div class="info">
          <h1 class="info-title">{{ item.title }}</h1>
          <div class="info-body">{{ item.zhaiyao }}</div>
        </div>
      </router-link>
    </ul>
  </div>
</template>

<script>
// 导入mui的js文件
import mui from '../../lib/mui/js/mui.min.js'
export default {
  data () {
    return {
      cates: [],// 所有分类的列表数组
      list: [], // 图片列表的数组
      cateId: 0
    }
  },
  // data 和 message创建好了
  created () {
    // 调用方法
    this.getAllCategory();
    this.getPhotoListByCateId(0)
  },
  // 当组件中的dom结构被渲染好，并放入页面中后执行
  mounted () {
    // 初始化scroll滑动控件
    mui('.mui-scroll-wrapper').scroll({
      deceleration: 0.0005 //flick 减速系数，系数越大，滚动速度越慢，滚动距离越小，默认值0.0006
    });
  },
  methods: {
    // 获取图片的分类
    getAllCategory () {
      this.$http.get('photo/getimgcategory').then(result => {
        if (result.data.status === 0) {
          // 手动拼接出一个最完整的分类列表
          // unshift()方法可向数组的开头添加一个或更多元素，并返回新的长度
          result.data.message.unshift({ title: '全部', id: 0 });
          this.cates = result.data.message
        } else {
          this.$toast('加载失败')
        }
      })
    },
    getPhotoListByCateId (cateId) {
      this.cateId = cateId
      // 根据分类Id,获取图片列表
      this.$http.get('photo/getimages/', { params: {id: cateId} }).then(result => {
        if (result.data.status === 0) {
          this.list = result.data.message
        }
      })
    }
  }
}
</script>

<style lang="scss">
* {
  touch-action: pan-y; /*去除警告*/
}
.photo-list {
  list-style: none;
  margin: 0;
  padding: 10px;
  padding-bottom: 0;
  li {
    background-color: #ccc;
    text-align: center;
    margin-bottom: 5px;
    box-shadow: 0 0 9px #999;
    position: relative;
    img {
      width: 100%;
      vertical-align: middle;
    }
    img[lazy="loading"] {
      width: 40px;
      height: 300px;
      margin: auto;
    }
    .info {
      color: white;
      text-align: left;
      position: absolute;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.4);
      max-height: 84px;
      .info-title {
        font-size: 14px;
      }
      .info-body {
        font-size: 13px;
      }
    }
  }
}
</style>

