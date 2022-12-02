<template>
  <div class="bg-light px-3">
    <h5 class="pt-3 pb-2 text-muted text-center"><i class="fa fa-paint-brush mr-2"></i>编辑主题</h5>
    <div class="form-group">
      <input type="text" v-model="form.title" class="form-control" placeholder="标题">
    </div>
    <div class="form-group">
      <label>选择分类</label>
      <select class="form-control" v-model="form.category_id">
        <option value="0">未选择</option>
        <option v-for="(cate,index) in cates" :key="index" :value="cate.id" name="category_id">{{ cate.name }}
        </option>
      </select>
    </div>
    <div class="form-group">
      <textarea ref="editor"></textarea>
    </div>
    <div class="text-center pb-4">
      <input type="button" class="btn btn-primary" @click="save" value="提交话题">
    </div>
  </div>
</template>

<script>
import 'simplemde/debug/simplemde.css'
import SimpleMDE from 'simplemde'

export default {
  data () {
    return {
      form: {
        id: this.$route.params.id || 0,
        title: '',
        content: '',
        category_id: 0
      },
      cates: []
    }
  },
  mounted () {
    const simplemde = new SimpleMDE({
      element: this.$refs.editor,
      placeholder: '请使用 Markdown 格式书写 ;-)，代码片段粘贴时请注意使用高亮语法。',
      spellChecker: false,
      autoDownloadFontAwesome: false,
      autosave: {
        enabled: false,
        uniqueId: 'content'
      },
      showIcons: ['code'],
      autofocus: true,
      renderingConfig: {
        codeSyntaxHighlighting: true
      }
    })
    simplemde.codemirror.on('change', () => {
      // 将改变后的值赋给文章内容
      this.form.content = simplemde.value()
    })
    this.simplemde = simplemde
  },
  created () {
    this.getCategory()
    if (this.form.id) {
      this.getTopic()
    }
  },
  methods: {
    getCategory () {
      this.$http.get('category/index').then(res => {
        if (res.data.code === 1) {
          this.cates = res.data.data
        }
      }).catch(() => {
        this.$toastr.e('操作失败，服务器异常。')
      })
    },
    save () {
      this.$http.post('topic/save', this.form).then(res => {
        if (res.data.code === 0) {
          this.$toastr.e(res.data.msg)
        } else if (res.data.code === 1) {
          this.$toastr.s('操作成功。')
          this.$router.push({ name: 'topic_show', params: { id: res.data.data.id } })
        }
      }).catch(() => {
        this.$toastr.e('操作失败，服务器异常。')
      })
    },
    getTopic () {
      this.$http.get('topic/show', { params: { id: this.form.id } }).then(res => {
        if (res.data.code === 1) {
          this.form.title = res.data.data.title
          this.form.category_id = res.data.data.category_id
          this.form.content = res.data.data.content
          this.simplemde.value(this.form.content)
        }
      }).catch(() => {
        this.$toastr.e('加载失败，服务器异常。')
      })
    }
  }
}
</script>
