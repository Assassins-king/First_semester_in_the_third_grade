<template>
  <div>
    <div class="row" v-show="isLogin">
      <div class="col-sm-4">
        <div class="list-group text-center mb-2">
          <router-link :to="{ name: 'user/profile' }" class="list-group-item list-group-item-action p-2" title="个人信息">
            <i class="fa fa-list"></i><span>个人信息</span>
          </router-link>
          <router-link :to="{ name: 'user/avatar' }" class="list-group-item list-group-item-action p-2" title="修改头像">
            <i class="fa fa-picture-o"></i><span>修改头像</span>
          </router-link>
          <router-link :to="{ name: 'user/email' }" class="list-group-item list-group-item-action p-2" title="修改邮箱">
            <i class="fa fa-envelope"></i><span>修改邮箱</span>
          </router-link>
          <router-link :to="{ name: 'user/password' }" class="list-group-item list-group-item-action p-2" title="修改密码">
            <i class="fa fa-lock"></i><span>修改密码</span>
          </router-link>
        </div>
      </div>
      <div class="col-sm-8">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'

export default {
  computed: {
    ...mapState(['isLogin'])
  },
  watch: {
    isLogin (val) {
      if (val === false) {
        this.$router.replace({ name: 'login' })
      }
    }
  }
}
</script>

<style scoped>
  .fa-list {
    margin-right: 10px;
  }
  .fa-picture-o, .fa-envelope, .fa-lock {
    margin-right: 10px;
  }
</style>
