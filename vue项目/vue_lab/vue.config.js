const { defineConfig } = require('@vue/cli-service')
module.exports = defineConfig({
  transpileDependencies: true,
  pages: {
    index: {
      // page 的入口
      entry: 'src/main.js',
    },
  },
  //关闭语法检查
  lintOnSave:false
})
