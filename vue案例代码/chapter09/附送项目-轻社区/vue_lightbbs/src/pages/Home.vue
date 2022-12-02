<template>
  <div class="row">
    <div class="col-lg-8">
      <List />
    </div>
    <div class="col-lg-4">
      <Sidebar />
    </div>
  </div>
</template>

<script>
import List from '@/components/topic/List'
import Sidebar from '@/components/Sidebar'

export default {
  components: { List, Sidebar }
}
</script>
