<template>
	<div id="root">
        <Test></Test>
    <Test2></Test2>
    <Test3></Test3>
  </div>
</template>

<script>
import Test from './components/Test'
import Test2 from './components/Test2'
import Test3 from './components/Test3'


	export default {
		name:'App',
		components:{Test,Test2,Test3},

	}
</script>

<style scoped>
	.app{
		background-color: gray;
		padding: 5px;
	}

  .come{
    animation: atguigu 1s;
  }

  .go{
    animation: atguigu 1s reverse;
  }

  @keyframes  {
    from{
      transform: translateX(-100px);
    }
    to{
      transform: translateX(0px);
    }
  }
</style>
