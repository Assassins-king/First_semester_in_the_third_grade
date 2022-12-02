<template>
  <div>
    <button @click="jumpTo">跳转到test</button>
    <div>sub/test</div>
  </div>
</template>

<script>
export default {
  methods: {
    jumpTo () {
      this.$router.push('/test')
    }
  }
}
</script>
