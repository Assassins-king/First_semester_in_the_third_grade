<template>
  <div>
    <transition appear appear-active-class="animated fadeIn">
      <div class="card border-secondary">
        <div class="card-header">修改头像</div>
        <div class="card-body text-secondary">
          <div class="mb-2">
            <div class="col-12 col-md-7 text-center avatar">
              <div>
                <img v-if="user.img_url" :src="user.img_url" alt="头像" class="img-thumbnail" />
              </div>
            </div>
          </div>
          <div>
            <div class="form-group">
              <label>请选择图片：</label>
              <input type="file" ref="avatar" class="form-control-file" />
            </div>
            <input @click="submit" type="button" class="btn btn-primary" value="上传头像" />
          </div>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
export default {
  data () {
    return {
      user: {}
    }
  },
  created () {
    this.getProfile()
  },
  methods: {
    getProfile () {
      this.$http.get('user/profile').then(res => {
        if (res.data.code === 1) {
          this.user = res.data.data
        }
      }).catch(() => {
        this.$toastr.e('操作失败，服务器异常。')
      })
    },
    submit () {
      var file = this.$refs.avatar.files[0]
      if (!file) {
        this.$toastr.e('请选择一个文件！')
        return
      }
      var formData = new FormData()
      formData.append('image', file)
      this.$http.post('user/updateAvatar', formData).then(res => {
        if (res.data.code === 0) {
          this.$toastr.e(res.data.msg)
        } else if (res.data.code === 1) {
          this.user.img_url = res.data.data.img_url
          this.$toastr.s(res.data.msg)
        }
      }).catch(() => {
        this.$toastr.e('操作失败，服务器异常。')
      })
    }
  }
}
</script>

<style scoped>
.avatar {
  height: 130px;
}
.avatar > div {
  display: inline-block;
  width: 130px;
  height: 130px;
  background: #eee;
  border-radius: 0.25rem;
}
</style>
