<template>
  <div class="mui-numbox" data-numbox-min="1" :data-numbox-max="max" :style="myStyle">
    <button class="mui-btn mui-btn-numbox-minus" type="button">-</button>
    <input class="mui-input-numbox" type="number" :value="initcount" @change="countChanged" ref="num" />
    <button class="mui-btn mui-btn-numbox-plus" type="button">+</button>
  </div>
</template>

<script>
import mui from '../lib/mui/js/mui.min.js'
export default {
  data () {
    return {
      myStyle: {}
    }
  },
  mounted () {
    mui('.mui-numbox').numbox()
    if (this.$props.size === 'min') {
      this.myStyle = { height: '25px', margin: '0 10px 0px 10px' }
    }
  },
  methods: {
    countChanged () {
      var count = parseInt(this.$refs.num.value)
      this.$emit('count', { id: this.goodsid, count: count })
    }
  },
  props: ['initcount', 'max', 'goodsid', 'size'],
  watch: {
    'max' (newVal) {
      mui('.mui-numbox').numbox().setOption('max', newVal)
    }
  }
}
</script>
