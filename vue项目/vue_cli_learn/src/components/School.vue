<template>
    <div class="demo">
        <h2>学校名称：{{SchoolName}}</h2>
        <h2>学校地址：{{Address}} </h2>
    </div>
</template>

<script>
export default{
  // eslint-disable-next-line vue/multi-word-component-names
    name:'School',
    data() {
        return {
            SchoolName:'111',
            Address:'222',
           
        }
    },
}

</script>


<style>

    .demo{
        background-color: aqua;

}
</style>



