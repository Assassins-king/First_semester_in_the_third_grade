<template>
  <div class="container">
    <mt-header fixed :title="$route.meta.title">
      <span slot="left" @click="goBack" v-show="showBack">
        <mt-button icon="back">返回</mt-button>
      </span>
    </mt-header>
    <transition name="fade">
      <router-view></router-view>
    </transition>
    <tabbar></tabbar>
  </div>
</template>

<script>
import tabbar from './components/tabbar.vue'

export default {
  data () {
    return {
      showBack: false
    }
  },
  created () {
    this.showBack = this.$route.path !== '/home'
    this.checkLogin()
  },
  watch: {
    '$route.path' (newVal) {
      this.showBack = newVal !== '/home'
    }
  },
  methods: {
    goBack () {
      this.$router.go(-1)
    },
    checkLogin () {
      this.$indicator.open({
        text: '加载中'
      })
      this.$http.get('user').then(res => {
        if (res.data.code === 1) {
          this.$store.commit('user/setUser', res.data.data)
        }
        this.$indicator.close()
      })
    }
  },
  components: {
    tabbar
  }
}
</script>

<style lang="scss" scoped>
#app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  box-sizing: border-box;
}

.container {
  padding-top: 40px;
  padding-bottom: 50px;
  overflow-x: hidden;
}

.fade-enter {
  opacity: 0;
  transform: translateX(100%);
}

.fade-leave-to {
  opacity: 0;
  transform: translateX(-100%);
  position: absolute;
}

.fade-enter-active,
.fade-leave-active {
  transition: all 0.5s ease;
}
</style>
