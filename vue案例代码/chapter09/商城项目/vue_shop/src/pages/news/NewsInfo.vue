<template>
  <div class="newsinfo-container">
    <!-- 大标题 -->
    <h1 class="title">{{ newsinfolist.title }}</h1>
    <!-- 子标题 -->
    <p class="newsinfo-nav">
      <span>发表时间：{{ newsinfolist.add_time | dateFormat }}</span>
      <span>点击：{{newsinfolist.click}}次</span>
    </p>
    <hr>
    <!-- 内容区域 -->
    <div class="content" v-html="newsinfolist.content">
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      newsinfolist: {},
      id: this.$route.params.id
    }
  },
  created () {
    // 调用方法
    this.getNewsInfo()
  },
  methods: {
    // 定义方法
    getNewsInfo () {
      // 获取新闻详情数据
      this.$http.get('news/show', { params: { id: this.id } }).then(result => {
        // 状态0：成功；1代表失败
        if (result.data.status === 0) {
          this.newsinfolist = result.data.message[0];
        } else {
          this.$toast('加载失败')
        }
      })
    }
  }
}
</script>

<style lang="scss">
.newsinfo-container {
  padding: 0 5px;
  .title {
    font-size: 16px;
    text-align: center;
    margin: 10px 0;
    color: orangered;
  }
  .newsinfo-nav {
    display: flex;
    justify-content: space-between;
    color: #26a2ff;
  }
  .content {
    img {
      width: 100%;
    }
  }
}
</style>
