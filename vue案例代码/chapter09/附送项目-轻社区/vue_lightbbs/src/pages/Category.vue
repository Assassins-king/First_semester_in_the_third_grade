<template>
  <div class="cate">
    <!-- 添加分类 -->
    <div class="form-row cate-add">
      <input type="number" class="col-2" placeholder="排序" v-model="cate.sort" />
      <input type="text" class="col-4" placeholder="分类名称" v-model="cate.name" />
      <button type="submit" class="btn btn-primary" @click="add">添加</button>
    </div>
    <!-- 分类列表 -->
    <div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">排序</th>
            <th scope="col">分类名</th>
            <th scope="col">操作</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(cate,index) in cates" :key="index">
            <td>
              <input type="number" v-model="cate.sort" class="form-control" @focus="edit(cate.sort)"
                @blur="save(cate, 'sort', $event)" />
            </td>
            <td>
              <input type="text" v-model="cate.name" class="form-control" @focus="edit(cate.name)"
                @blur="save(cate, 'name', $event)" />
            </td>
            <td>
              <button class="btn btn-primary" @click="del(cate.id)">删除</button>
            </td>
          </tr>
          <tr v-if="!cates.length">
            <td colspan="3" class="text-center">列表为空</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      cate: {
        sort: '',
        name: ''
      },
      cates: [],
      before: ''
    }
  },
  created () {
    this.getCategory()
  },
  methods: {
    getCategory () {
      this.$http.get('category/index').then(res => {
        if (res.data.code === 1) {
          this.cates = res.data.data
        }
      }).catch(() => {
        this.$toastr.e('操作失败，服务器异常。')
      })
    },
    add () {
      this.$http.post('category/save', this.cate).then(res => {
        if (res.data.code === 0) {
          this.$toastr.e(res.data.msg)
        } else if (res.data.code === 1) {
          this.$toastr.s(res.data.msg)
          this.getCategory()
          this.cate.sort = ''
          this.cate.name = ''
        }
      }).catch(() => {
        this.$toastr.e('服务器异常。')
      })
    },
    edit (edit) {
      this.before = edit
    },
    save (cate, name, e) {
      if (cate[name] !== this.before) {
        var input = e.currentTarget.classList
        input.add('saving')
      }
      var data = { id: cate.id }
      data[name] = cate[name]
      this.$http.post('category/save', data).then(res => {
        if (res.data.code === 0) {
          this.$toastr.e(res.data.msg)
        } else if (res.data.code === 1) {
          this.$toastr.s(res.data.msg)
          input.remove('saving')
          this.getCategory()
        }
      }).catch(() => {
        this.$toastr.e('服务器异常。')
      })
    },
    del (id) {
      this.$http.post('category/del', { id: id }).then(res => {
        if (res.data.code === 0) {
          this.$toastr.e(res.data.msg)
        } else if (res.data.code === 1) {
          this.$toastr.s(res.data.msg)
          this.getCategory()
        }
      }).catch(() => {
        this.$toastr.e('服务器异常。')
      })
    }
  }
}
</script>

<style scoped>
.cate-add {
  margin-bottom: 10px;
}
.cate-add input {
  margin-right: 10px;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
}
.cate button {
  white-space: nowrap;
}
.cate input.saving {
  background-color: #dbedff;
  border-color: #8fc5ff;
}
</style>
