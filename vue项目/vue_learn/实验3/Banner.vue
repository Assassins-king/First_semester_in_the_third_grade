<template>
  <div class='Navbar'>
    <slot name="left"></slot>
    <slot name='center'></slot>
    <slot name='right'></slot>
  </div>
</template>

<script>
export default {
  name: "Banner"
}
</script>

<style scoped>
.Navbar {
  display: flex;
  height: 44px;
  background-color: skyblue;
  line-height: 44px;
  text-align: center;
}
</style>