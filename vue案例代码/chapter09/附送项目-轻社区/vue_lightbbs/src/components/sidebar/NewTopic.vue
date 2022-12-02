<template>
  <div class="model bg-light">
    <div class="modal-header">
      <h5 class="modal-title small">最新发布的话题</h5>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item bg-light small" v-for="topic in topics" :key="topic.id">
        <router-link :to="{ name: 'topic_show', params: { id: topic.id } }">{{ topic.title }}</router-link>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data () {
    return {
      topics: [],
      size: 5
    }
  },
  created () {
    this.getBestTopic()
  },
  methods: {
    getBestTopic () {
      this.$http.get('topic/new', { params: { size: this.size } }).then(res => {
        if (res.data.code === 1) {
          this.topics = res.data.data
        }
      }).catch(() => {
        this.$toastr.e('操作失败，服务器异常。')
      })
    }
  }
}
</script>

<style scoped>
.modal-header {
  padding: 0.65rem 1rem;
  border-bottom: 1px solid rgba(0, 0, 0, 0.125);
}
.list-group-item {
  padding: 0.4rem 1.25rem;
  border: 0;
}
.list-group-item a {
  color: #666;
}
</style>
