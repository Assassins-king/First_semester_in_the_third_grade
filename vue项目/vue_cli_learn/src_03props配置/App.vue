<template>
	<div class="app">
    <h1>{{msg}}</h1>
    <School></School>
		<Student/>
	</div>
</template>

<script>
	import Student from './components/Student'
  import School from "../src_02ref属性/components/School";

	export default {
		name:'App',
		components:{School, Student}
	}
</script>

<style>
.app{
  background: aqua;
}
</style>