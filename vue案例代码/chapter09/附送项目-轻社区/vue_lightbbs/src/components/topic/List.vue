<template>
  <div>
    <div class="bg-light">
      <ul class="nav nav-pills">
        <li class="nav-item bbs-cate-item">
          <router-link class="nav-link" :to="{ name: 'topic_list', params: { cate: 0, page: 1 } }">全部</router-link>
        </li>
        <li class="nav-item bbs-cate-item" v-for="(cate, index) in cates" :key="index">
          <router-link class="nav-link" :to="{ name: 'topic_list', params: { cate: cate.id, page: 1 } }">{{ cate.name }}
          </router-link>
        </li>
      </ul>
      <ul class="list-group list-group-flush">
        <li class="list-group-item" v-for="(topic,index) in topics" :key="index">
          <div class="row">
            <div>
              <router-link :to="{ name: 'topic_show', params: { id: topic.id } }">
                <img :src="topic.user.img_url" class="rounded-circle topic-img">
              </router-link>
            </div>
            <div>
              <div class="row">
                <h5 class="card-title topic-title" style="font-size: 16px;">
                  <router-link :to="{ name: 'topic_show', params: { id: topic.id } }">{{ topic.title }}</router-link>
                </h5>
              </div>
              <div class="row">
                <span class="small text-muted">
                  <strong>{{ topic.user.name }}</strong>&nbsp;•&nbsp;
                  <span class="d-none d-md-inline">{{ topic.update_time }} &nbsp;•&nbsp;</span>
                  点赞数 <strong>{{ topic.likenum }}</strong>&nbsp;•&nbsp;
                  点击数 <strong>{{ topic.hits }}</strong>
                </span>
              </div>
            </div>
          </div>
        </li>
        <li class="list-group-item" v-if="empty !== false">{{ empty }}</li>
      </ul>
    </div>
    <div class="mt-3">
      <Pagination :current="page.current" :total="page.total" :size="page.size" @change="pageChange"></Pagination>
    </div>
  </div>
</template>

<script>
import Pagination from '../../components/Pagination'

export default {
  data () {
    return {
      topics: [],
      empty: false,
      cates: [],
      cate_active: parseInt(this.$route.params.cate) || 0,
      page: {
        current: parseInt(this.$route.params.page) || 1,
        total: 0,
        size: 7
      }
    }
  },
  watch: {
    '$route' () {
      this.cate_active = parseInt(this.$route.params.cate) || 0
      this.page.current = parseInt(this.$route.params.page) || 1
      this.getTopicList()
    }
  },
  created () {
    this.getCategory()
    this.getTopicList()
  },
  methods: {
    getTopicList () {
      var params = { page: this.page.current, size: this.page.size, category_id: this.cate_active }
      this.$http.get('topic/list', { params: params }).then(res => {
        if (res.data.code === 1) {
          this.topics = res.data.data.data
          this.page.current = res.data.data.page
          this.page.total = res.data.data.total
          this.empty = this.topics.length ? false : '当前列表为空'
        }
      }).catch(() => {
        this.$toastr.e('操作失败，服务器异常。')
      })
    },
    getCategory () {
      this.$http.get('category/index').then(res => {
        if (res.data.code === 1) {
          this.cates = res.data.data
        }
      }).catch(() => {
        this.$toastr.e('操作失败，服务器异常。')
      })
    },
    pageChange (page) {
      this.$router.push({ name: 'topic_list', params: { cate: this.cate_active, page: page } })
    }
  },
  components: { Pagination }
}
</script>

<style scoped>
.topic-img {
  width: 44px;
  height: 44px;
  margin-right: 25px;
}
.topic-title {
  margin-top: 3px;
  margin-bottom: 5px;
}
.topic-title a {
  color: #444;
}
</style>
