
module.exports = {
  pages: {
    index: {
      entry: 'src/index/main.js',    // 页面的入口文件
      template: 'public/index.html', // 页面的模板文件
      filename: 'index.html'         // build 生成的文件名称  例：dist/index.html
    },
    // 输出文件名会默认的输出为subpage.html
    subpage: 'src/subpage/main.js'
  }
}
