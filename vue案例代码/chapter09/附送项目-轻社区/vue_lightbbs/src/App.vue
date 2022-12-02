<template>
  <div id="app">
    <Header />
    <div class="container">
      <router-view />
    </div>
    <Footer />
  </div>
</template>

<script>
import Header from '@/components/Header'
import Footer from '@/components/Footer'

export default {
  name: 'App',
  components: { Header, Footer }
}
</script>

<style>
#app {
  font-family: 'Microsoft YaHei', 'Microsoft Sans Serif', 'Avenir', Helvetica, Arial, sans-serif;
}
.container {
  margin-top: 20px;
}
</style>
