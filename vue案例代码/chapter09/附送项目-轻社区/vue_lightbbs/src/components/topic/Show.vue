<template>
  <div class="topic">
    <div class="panel bg-light">
      <div class="panel-heading row">
        <div>
          <img :src="topic.user.img_url" class="rounded-circle topic-img">
        </div>
        <div>
          <h5>{{topic.title}}</h5>
          <span class="small text-muted">作者 {{ topic.user.name }} / 阅读数 {{ topic.hits }} / 点赞数
            {{ topic.likenum }}</span>
          <span v-if="isLike !== null">
            <button v-if="isLike" type="button" class="btn btn-link opt" @click="likeTopic(false)">
              <i class="fa fa-thumbs-up"></i> 取消点赞
            </button>
            <button v-else type="button" class="btn btn-link opt" @click="likeTopic(true)">
              <i class="fa fa-thumbs-up"></i> 点赞
            </button>
          </span>
        </div>
      </div>
      <div class="panel-body">
        <div class="markdown-body" v-highlight v-html="showdown(topic.content)"></div>
        <div class="topic-info">
          <span class="small text-muted">创建时间 {{ topic.create_time }} / 更新时间 {{ topic.update_time }}</span>
          <router-link v-if="user.role === 'admin' || topic.user_id === user.id"
            :to="{ name: 'edit', params: { id: id } }" tag="button" class="btn btn-link opt">编辑</router-link>
          <button v-if="user.role === 'admin'" class="btn btn-link opt" @click="delTopic(topic.id)">删除</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'

import showdown from 'showdown'
const converter = new showdown.Converter()

export default {
  data () {
    return {
      id: this.$route.params.id,
      topic: {
        user: {}
      },
      isLike: null
    }
  },
  watch: {
    '$route' () {
      this.id = parseInt(this.$route.params.id) || 0
      this.getTopic()
      this.getLike()
    }
  },
  computed: {
    ...mapState(['user'])
  },
  created () {
    this.getTopic()
    this.getLike()
  },
  methods: {
    getTopic () {
      this.$http.get('topic/show', { params: { id: this.id } }).then(res => {
        if (res.data.code === 1) {
          this.topic = res.data.data
        }
      }).catch(() => {
        this.$toastr.e('加载失败，服务器异常。')
      })
    },
    showdown (content) {
      return converter.makeHtml(content)
    },
    delTopic () {
      if (!window.confirm('是否确认删除？')) {
        return
      }
      var data = { id: this.id }
      this.$http.post('topic/del', data).then(res => {
        if (res.data.code === 1) {
          this.$router.push({ name: 'topic_list', params: { id: 0, page: 1 } })
          this.$toastr.s('删除话题成功。')
        }
      }).catch(() => {
        this.$toastr.e('加载失败，服务器异常。')
      })
    },
    getLike () {
      this.$http.get('like/isLike', { params: { id: this.id } }).then(res => {
        if (res.data.code === 1) {
          this.isLike = res.data.data.isLike
        }
      }).catch(() => {
        this.$toastr.e('加载失败，服务器异常。')
      })
    },
    likeTopic (isLike) {
      var data = { id: this.id, isLike: isLike }
      this.$http.post('like/setLike', data).then(res => {
        if (res.data.code === 1) {
          this.isLike = res.data.data.isLike
          if (isLike) {
            this.topic.likenum++
            this.$toastr.s('点赞成功。')
          } else {
            this.topic.likenum--
            this.$toastr.s('取消点赞成功。')
          }
        }
      }).catch(() => {
        this.$toastr.e('加载失败，服务器异常。')
      })
    }
  }
}
</script>

<style scoped>
.panel-heading {
  padding: 10px;
}
.panel-heading h5 {
  margin: 0.2rem 0;
}
.panel-body {
  border-top: 1px solid #d9dadb;
}
.markdown-body {
  padding: 20px 10px;
}
.topic-info {
  border-top: 1px solid #d9dadb;
  padding: 10px;
}
.topic-img {
  width: 44px;
  height: 44px;
  margin: 5px 10px 0 15px;
}
.opt {
  color: #adadad;
  font-size: 12px;
  position: relative;
  top: -1px;
}
.opt:hover {
  text-decoration: none;
  color: #666;
}
</style>
