<template>
  <div id="app">
    <p>{{name}}</p>
  </div>
</template>

<script>
import {mapState} from 'vuex'

export default {
  name: 'App',
  computed: mapState({
    name: state => state.name
  })
}
</script>
