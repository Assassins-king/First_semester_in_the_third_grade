<template>
    <div>
        <h2>学生姓名：{{StudentName}}</h2>
    <h2>学生年龄：{{Age}}</h2>
        </div>
</template>

<script>
export default{
  // eslint-disable-next-line vue/multi-word-component-names
    name:"Student",
    data() {
        return {
            StudentName:'333',
            Age:'12'
        }
    },
}
</script>