<template>
	<ul>
		<li>消息编号：{{$route.params.id}}</li>
		<li>消息标题：{{$route.params.title}}</li>
	</ul>
</template>

<script>
	export default {
		name:'Detail',
    // computed:{
    //   id(){ return this.$route.params.id},
    //
    //
    // },
   props:['a','b'],
		mounted() {
			console.log(this.$route)
		},
	}
</script>