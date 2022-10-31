<template>
    <div>
      <img src="./assets/logo.png">
        <schoolVue></schoolVue>
        <studentVue></studentVue>
    </div>
</template>

<script>
import SchoolVue from '@/components/School.vue';
import StudentVue from '@/components/Student.vue';
export default{
    name:'App',
    components:{
        SchoolVue,
        StudentVue,
    }
}
</script>