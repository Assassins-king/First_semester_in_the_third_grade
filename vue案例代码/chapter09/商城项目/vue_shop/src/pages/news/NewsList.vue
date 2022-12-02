<template>
  <div>
    <ul class="mui-table-view">
      <li class="mui-table-view-cell mui-media" v-for="item in newslist" :key="item.id">
        <router-link :to="{ name: 'news_show', params: { id: item.id } }">
          <img class="mui-media-object mui-pull-left" :src="item.img_url">
          <div class="mui-media-body">
            <h1>{{item.title}}</h1>
            <p class='mui-ellipsis'>
              <span>发表时间：{{ item.add_time | dateFormat}}</span>
              <span>点击：{{ item.click }}次</span>
            </p>
          </div>
        </router-link>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data () {
    return {
      newslist: [], // 存放列表数据
    }
  },
  created () {
    // 调用方法
    this.getNewsList()
  },
  methods: {
    // 定义方法
    getNewsList () {
      this.$http.get('news/list').then(result => {
        if (result.data.status === 0) {
          this.newslist = result.data.message
        } else {
          this.$toast('加载失败')
        }
      })
    }
  }
}
</script>

<style lang="scss" scoped>
.mui-table-view {
  li {
    h1 {
      font-size: 14px;
      overflow: hidden;
      white-space: nowrap;
      text-overflow: ellipsis;
    }
    .mui-ellipsis {
      font-size: 12px;
      color: #26a2ff;
      /* 实现左右布局 */
      display: flex;
      justify-content: space-between;
    }
  }
}
</style>
