<template>
  <div>
    <div class="mb-2">
      <UserInfo />
    </div>
    <div class="mb-2">
      <BestTopic />
    </div>
    <div>
      <NewTopic />
    </div>
  </div>
</template>

<script>
import UserInfo from '@/components/sidebar/UserInfo'
import BestTopic from '@/components/sidebar/BestTopic'
import NewTopic from '@/components/sidebar/NewTopic'

export default {
  components: { UserInfo, NewTopic, BestTopic }
}
</script>
