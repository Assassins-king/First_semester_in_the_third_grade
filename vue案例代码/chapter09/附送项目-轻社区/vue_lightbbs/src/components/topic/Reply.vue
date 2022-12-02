<template>
  <div class="reply">
    <ul class="list-group list-group-flush mb-4">
      <li class="list-group-item bg-light" v-for="(reply,index) in replies" :key="index">
        <div class="row">
          <div clas="col">
            <img :src="reply.user.img_url" class="rounded-circle reply-img">
          </div>
          <div clas="col">
            <div class="row">
              <span>
                <strong>{{ reply.user.name }}</strong>
                <span class="small text-muted">
                  <span class="d-none d-md-inline"> 创建于 {{ reply.create_time }} </span>
                  <span>更新于 {{ reply.update_time }}</span>
                </span>
                <span v-if="user.role === 'admin' || user.id == reply.user_id">
                  <button class="btn btn-link opt" @click="editReply(reply)">编辑</button>
                  <button class="btn btn-link opt" @click="delReply(index, reply.id)">删除</button>
                </span>
              </span>
            </div>
            <div class="row card-text">{{ reply.content }}</div>
          </div>
        </div>
      </li>
    </ul>
    <Pagination :current="page.current" :total="page.total" :size="page.size" @change="pageChange"></Pagination>
    <div class="add-reply mt-4">
      <div class="row mb-1">
        <div class="col-md-8">
          <textarea ref="reply" maxlength="10000" v-model="reply.content"></textarea>
        </div>
      </div>
      <input type="button" class="btn btn-primary" @click="sendReply" :value="reply.id ? '修改评论' : '发布评论'" />
      <input type="button" v-if="reply.id" class="btn btn-default ml-1" @click="resetReply" value="取消" />
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
import Pagination from '../../components/Pagination'

export default {
  data () {
    return {
      topic_id: this.$route.params.id,
      reply: {
        id: 0,
        content: ''
      },
      replies: [],
      page: {
        current: parseInt(this.$route.params.page) || 1,
        total: 0,
        size: 7
      }
    }
  },
  computed: {
    ...mapState(['user'])
  },
  created () {
    this.getReply()
  },
  methods: {
    getReply () {
      var params = { topic_id: this.topic_id, page: this.page.current, size: this.page.size }
      this.$http.get('reply/index', { params: params }).then(res => {
        if (res.data.code === 1) {
          this.replies = res.data.data.data
          this.page.current = res.data.data.page
          this.page.total = res.data.data.total
        }
      }).catch(() => {
        this.$toastr.e('加载失败，服务器异常。')
      })
    },
    pageChange (page) {
      this.page.current = page
      this.getReply()
    },
    sendReply () {
      var data = { topic_id: this.topic_id, content: this.reply.content, id: this.reply.id }
      this.$http.post('reply/save', data).then(res => {
        if (res.data.code === 0) {
          this.$toastr.e(res.data.msg)
        } else if (res.data.code === 1) {
          this.$toastr.s(res.data.msg)
          this.resetReply()
          this.getReply()
        }
      }).catch(() => {
        this.$toastr.e('服务器异常。')
      })
    },
    resetReply () {
      this.reply.id = 0
      this.reply.content = ''
    },
    editReply (reply) {
      this.reply.id = reply.id
      this.reply.content = reply.content
      this.$refs.reply.focus()
    },
    delReply (index, id) {
      this.replies.splice(index, 1)
      this.$http.post('reply/del', { id: id }).then(res => {
        if (res.data.code === 0) {
          this.$toastr.e(res.data.msg)
        } else if (res.data.code === 1) {
          this.$toastr.s(res.data.msg)
        }
      })
    }
  },
  components: { Pagination }
}
</script>

<style scoped>
.add-reply textarea {
  width: 100%;
  height: 80px;
  border-radius: 3px;
  padding: 5px;
  font-size: 14px;
  border: 1px solid #ccc;
}
.add-reply button {
  margin-top: 10px;
}
.reply {
  font-size: 14px;
  margin-top: 20px;
  margin-bottom: 20px;
}
.reply span {
  color: #385f8a;
}
.reply-img {
  width: 44px;
  height: 44px;
  margin-right: 25px;
}
.opt {
  color: #adadad;
  font-size: 12px;
}
.opt:hover {
  text-decoration: none;
  color: #666;
}
</style>
