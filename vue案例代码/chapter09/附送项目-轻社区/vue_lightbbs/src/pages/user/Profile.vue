<template>
  <div class="profile">
    <transition appear appear-active-class="animated fadeIn">
      <div class="card border-secondary">
        <div class="card-header">个人信息</div>
        <div class="card-body text-secondary">
          <div class="mb-2">
          <div class="col-12 col-md-7 text-center avatar">
            <div>
              <img v-if="user.img_url" :src="user.img_url" alt="头像" class="img-thumbnail">
            </div>
          </div>
        </div>
          <table>
            <tbody>
              <tr>
                <td class="text-right">用户名：</td>
                <td>{{ user.name }}</td>
              </tr>
              <tr>
                <td class="text-right">邮 箱：</td>
                <td>{{ user.email }}</td>
              </tr>
              <tr>
                <td class="text-right">注册时间：</td>
                <td>{{ user.create_time }}</td>
              </tr>
              <tr>
                <td class="text-right">最后修改时间：</td>
                <td>
                  <span v-if="user.update_time !== undefined">{{ user.update_time || '无' }}</span>
                </td>
              </tr>
              <tr>
                <td class="text-right">是否激活：</td>
                <td>
                  <span v-if="user.is_active !== undefined">
                    <span v-if="user.is_active" class="text-success">已激活</span>
                    <span v-else>
                      未激活
                      <router-link :to="{ name: 'user/send_activate_email' }">立即激活</router-link>
                    </span>
                  </span>
                </td>
              </tr>
            </tbody>
          </table>
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
    }
  }
}
</script>

<style scoped>
.profile {
  line-height: 1.5em;
}
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
