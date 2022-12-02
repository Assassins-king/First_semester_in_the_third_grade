<template>
  <transition appear
              name="animate__animated animate__bounce"
              enter-active-class="animate__swing"
              leave-active-class="animate__backOutUp">
    <div class="pic">
      <img src="../assets/QRCode.png">
    </div>
  </transition>

</template>
<script>
export default {
  name: "Login_code"
}
</script>

<style scoped>

</style>