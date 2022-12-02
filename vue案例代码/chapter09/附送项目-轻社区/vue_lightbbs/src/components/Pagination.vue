<template>
  <ul class="pagination justify-content-center" v-if="max > 1">
    <li v-on:click.stop.prevent="pageChange(current == 1 ? 1 : current - 1)" class="page-item d-none d-md-block"
      :class="{disabled: current === 1}">
      <span class="page-link">上一页</span>
    </li>
    <li @click.stop.prevent="pageChange(1)" class="page-item" :class="{active: current === 1}"
      v-if="{false: current === 1}">
      <span class="page-link">1</span>
    </li>
    <li @click.stop.prevent="pageChange(current - display)" class="page-item" v-if="showJumpPrev">
      <span class="page-link">&laquo;</span>
    </li>
    <li v-for="(page,index) in pagingCounts" :key="index" @click.stop.prevent="pageChange(page)" class="page-item"
      :class="{active: current === page}">
      <span class="page-link">{{page}}</span>
    </li>
    <li @click.stop.prevent="pageChange(current + display)" class="page-item" v-if="showJumpNext">
      <span class="page-link">&raquo;</span>
    </li>
    <li @click.stop.prevent="pageChange(max)" class="page-item" :class="{active: current === max}">
      <span class="page-link">{{max}}</span>
    </li>
    <li v-on:click.stop.prevent="pageChange(current == max ? max: current + 1)" class="page-item"
      :class="{disabled:current===max}">
      <span class="page-link d-none d-md-block">下一页</span>
    </li>
  </ul>
</template>

<script>
export default {
  data: function () {
    return {
      max: 0,             // 总页数
      page: this.current  // 当前页数
    }
  },
  props: {
    // 最多显示的页码链接个数
    display: {
      type: Number,
      default: 5,
      required: false
    },
    // 当前是第几页
    current: {
      type: Number,
      default: 1,
      required: false
    },
    // 总记录数
    total: {
      type: Number,
      default: 1
    },
    // 每页显示的条数
    size: {
      type: Number,
      default: 10,
      required: false
    }
  },
  created () {
    this.max = Math.ceil(this.total / this.size)
  },
  computed: {
    numOffset () {
      return Math.floor((this.display + 2) / 2) - 1
    },
    showJumpPrev () {
      if (this.total > this.display + 2) {
        if (this.page > this.display) {
          return true
        }
      }
      return false
    },
    showJumpNext () {
      if (this.max > this.display + 2) {
        if (this.page <= this.max - this.display) {
          return true
        }
      }
      return false
    },
    // 当前要显示的数字按钮集合
    pagingCounts () {
      let that = this,
        startNum,
        result = [],
        showJumpPrev = that.showJumpPrev,
        showJumpNext = that.showJumpNext;
      if (showJumpPrev && !showJumpNext) {
        startNum = that.max - that.display;
        for (let i = startNum; i < that.max; i++) {
          result.push(i)
        }
      } else if (!showJumpPrev && showJumpNext) {
        for (let i = 2; i < that.display + 2; i++) {
          result.push(i)
        }
      } else if (showJumpPrev && showJumpNext) {
        for (let i = that.current - that.numOffset; i <= that.current + that.numOffset; i++) {
          result.push(i)
        }
      } else {
        for (let i = 2; i < that.max; i++) {
          result.push(i)
        }
      }
      return result
    }
  },
  methods: {
    pageChange: function (page) {
      if (this.page === page) {
        return
      }
      this.page = page
      this.$emit('change', this.page)
    }
  },
  watch: {
    total: {
      handler: function () {
        let that = this
        this.max = Math.ceil(that.total / that.size)
      }
    }
  }
}
</script>

<style scoped>
.page-link {
  cursor: pointer;
}
</style>
