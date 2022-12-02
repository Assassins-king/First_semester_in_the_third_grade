
// ① 创建一个 Vue 实例
const Vue = require('vue')
const app = new Vue({
  template: '<div>SSR的简单使用</div>'
})

// ② 创建一个 renderer实例
const renderer = require('vue-server-renderer').createRenderer()

// ③ 将 Vue 实例渲染为 HTML
renderer.renderToString(app, (err, html) => {
  if (err) {
    throw err
  }
  console.log(html)
})
