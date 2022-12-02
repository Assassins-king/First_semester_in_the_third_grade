<template>
  <div class="address-container">
    <div>
      <div class="mui-card" v-for="item in addressList" :key="item.id">
        <ul class="selected">
          <li class="title" @click="select(item.id)">
            <strong>{{ item.name }}</strong>&nbsp;
            <strong>{{ item.tel }}</strong>
          </li>
          <li @click="select(item.id)">{{ item.area }} {{ item.detail }}</li>
          <li>
            <router-link class="edit" :to="{name: 'address_edit', params: {id: item.id}}">编辑</router-link>
          </li>
        </ul>
      </div>
    </div>
    <div v-show="showAdd" class="mod_btns fixed">
      <router-link :to="{ name: 'address_add' }" class="mod_btn">新增收货地址</router-link>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      addressList: [],
      showAdd: false
    }
  },
  created () {
    this.getAddressList()
  },
  methods: {
    getAddressList () {
      this.$indicator.open({
        text: '加载中'
      })
      this.$http.get('address').then(res => {
        this.$indicator.close()
        this.showAdd = true
        if (res.data.code === 1) {
          this.addressList = res.data.data
        } else if (res.data.code === 2) {
          this.$router.push({ name: 'login' })
        }
      })
    },
    select (id) {
      if (this.$route.name !== 'address_select') {
        return
      }
      this.$router.replace({ name: 'order_create', params: { id: id } })
    }
  }
}
</script>

<style lang="scss" scoped>
.address-container {
  background: #eee;
  overflow: hidden;
  .mod_btn {
    font-size: 16px;
    line-height: 46px;
    height: 46px;
    text-align: center;
    background: #3884ff;
    flex: 1;
    display: block;
    color: #fff;
  }
  .mod_btns .fixed {
    display: flex;
    overflow: hidden;
  }
  .mui-card {
    padding: 7px 40px;
    position: relative;
    overflow: hidden;
    padding: 15px;
    color: #666;
    .selected {
      margin: 0;
      padding: 0;
      list-style: none;
      padding-right: 50px;
      .title {
        font-size: 16px;
      }
      .edit {
        color: #e93b3d;
        width: 50px;
        position: absolute;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
      }
    }
  }
}
</style>
