<template>
    <div>
        <h2>学生姓名：{{studentname}}</h2>
    <h2>学生年龄：{{age}}</h2>
        </div>
</template>

<script>
export default{
    name:'Student',
    data() {
        return {
            studentname:'333',
            age:'12'
        }
    },
}
</script>