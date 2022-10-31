<template>
    <div class="demo">
        <h2>学校名称：{{schoolname}}</h2>
        <h2>学校地址：{{address}} </h2>
    </div>
</template>

<script>
export default{
    name:'School',
    data() {
        return {
            schoolname:'111',
            address:'222',
           
        }
    },
}

</script>


<style>

    .demo{
        background-color: aqua;

}
</style>



