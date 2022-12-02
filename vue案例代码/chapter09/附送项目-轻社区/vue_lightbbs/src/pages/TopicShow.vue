<template>
  <div class="row">
    <div class="col-lg-8">
      <Show />
      <Reply />
    </div>
    <div class="col-lg-4">
      <Sidebar />
    </div>
  </div>
</template>

<script>
import Show from '@/components/topic/Show'
import Reply from '@/components/topic/Reply'
import Sidebar from '@/components/Sidebar'

export default {
  components: { Show, Reply, Sidebar }
}
</script>
