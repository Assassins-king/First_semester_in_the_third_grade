<template>
    <div>
        <schoolVue></schoolVue>
        <studentVue></studentVue>
    </div>
</template>

<script>
import schoolVue from './school.vue';
import studentVue from './student.vue';
export default{
    name:'App',
    components:{
        schoolVue,
        studentVue,
    }
}
</script>