<template>
  <div class="photoinfo-container">
    <h3>{{ photoinfo.title }}</h3>
    <p class="subtitle">
      <span>发表时间：{{ photoinfo.add_time }}</span>
      <span>点击：{{ photoinfo.click }}次</span>
    </p>
    <hr>
    <!-- 缩略图区域 -->
    <div class="thumbs">
      <!-- <img class="preview-img" v-for="(item, index) in list" :src="item.src" height="100" @click="$preview.open(index, list)" :key="item.src"> -->
      <vue-preview :slides="list" @close="handleClose"></vue-preview>
    </div>
    <!-- 图片内容区域 -->
    <div class="content" v-html="photoinfo.content"></div>
  </div>
</template>

<script>
// npm install vue-preview@1.1.3 --save

// import VuePreview from 'vue-preview';
// Vue.use(VuePreview);

export default {
  data () {
    return {
      id: this.$route.params.id, // 从路由中获取到的片Id
      photoinfo: {}, // 图片详情
      list: [] // 缩略图的数组
    }
  },
  created () {
    this.getPhotoInfo()
    this.handleClose()
  },
  methods: {
    getPhotoInfo () {
      // 获取图片的详情
      this.$http.get('photo/getimageInfo', { params: { id: this.id } }).then(result => {
        if (result.data.status === 0) {
          this.photoinfo = result.data.message[0]
        }
      })
    },
    // 图片懒加载
    handleClose () {
      // 获取缩略图
      this.$http.get('photo/getthumimages', { params: { id: this.id } }).then(result => {
        if (result.data.status === 0) {
          // 循环每个图片数据，补全图片的宽和高
          result.data.message.forEach(item => {
            item.w = 600
            item.h = 400
            item.msrc = item.src
          });
          // 把完整的数据保存到 list 中
          this.list = result.data.message
        }
      })
    }
  }
}
</script>

<style lang="scss">
.photoinfo-container {
  padding: 3px;
  h3 {
    color: #26a2ff;
    font-size: 15px;
    text-align: center;
    margin: 15px 0;
  }
  .subtitle {
    display: flex;
    justify-content: space-between;
    font-size: 13px;
  }
  .content {
    font-size: 13px;
    line-height: 30px;
  }
  .thumbs {
    .my-gallery {
      width: 100%;
      display: flex;
      flex-flow: row wrap;
    }
    figure {
      margin: 0.2em;
    }
    img {
      width: 5.6em;
      box-shadow: 0 0 8px #999;
    }
  }
}
</style>
