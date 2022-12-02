<template>
  <div id="app">
    <div class="wrapper">
      <!-- 搜索信息 -->
      <div class="message">
        <div class="info">
          <input class="value" type="text" v-model="value" placeholder="请输入内容">
        </div>
        <div class="btn">
          <span @click="add">添加</span>
          <span @click="find">查找</span>
        </div>
      </div>
      <!-- 表格信息 -->
      <ul>
        <li>
        </li>
        <li v-for="(item,key) in list" :id="key" @click="" v-if="item.isFind">
          <div class="info">
            {{item.info}}
            <input class="newValue" type="text" v-model="newValue" v-if="item.isShow" @blur="blur(key)">
          </div>
          <div class="btn">
            <span @click="del(key)">刪除</span>
            <span @click="edit(key)">编辑</span>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>


export default {
  name: "search",
  data() {
    return {
      list: [],
      value: '',
      newValue: '',
      isShow: false,
    }
  },
  created() {
    this.list = this.$store.state.list
  },
  methods: {
    add() {
      if (this.value) {
        this.$store.dispatch('add', this.value)
      }
    },
    del(key) {
      this.$store.dispatch('del', key)
    },
    edit(key) {
      for (let i = 0; i < this.list.length; i++) {
        if (i === key) {
          this.list[key].isShow = true
        } else {
          this.list[i].isShow = false
        }
      }
    },
    find() {
      if (!this.value) {
        alert('输入内容不能为空')
      } else {
        for (let j = 0; j < this.list.length; j++) {
          if (this.value !== this.list[j].info) {
            this.list[j].isFind = false
          }
        }
      }
    },
    blur(key) {
      this.$store.dispatch({
        type: 'edit',
        value: {
          id: key,
          info: this.newValue,
          isShow: false,
          isFind: true
        },
        key: key
      })
    }
  },
}
</script>

<style>
.wrapper {
  margin: 0 auto;
  width: 400px;
  border: 1px solid red;
  padding: 10px;
}

ul {
  list-style: none;
  padding: 0;
  width: 400px;
  margin-top: 20px;

}

.message {
  width: 400px;
  border-bottom: 1px solid pink;
  padding-bottom: 10px;

}

.message .info {
  display: inline-block;
  position: relative;
  border: 1px solid pink;
}

.message .btn {
  float: right;

}

.message .btn span {
  border: 1px solid pink;
  background-color: pink;
  border-radius: 5px;
  margin-right: 8px;
}

ul>li {
  margin-top: 10px;
}

ul>li .btn {
  float: right;
}

ul>li .btn span {
  border: 1px solid pink;
  background-color: pink;
  border-radius: 5px;
  margin-right: 8px;
}

.info {
  width: 50%;
  display: inline-block;
  position: relative;
  border: 1px solid pink;
}

.value {
  border: none;
}

.newValue {

  position: absolute;
  left: 0;
  width: 100%;
}
</style>