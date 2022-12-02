
// ① 创建vue实例
const Vue = require('vue')
const Koa = require('koa')
const app = new Koa()

// ② 读取模板
const renderer = require('vue-server-renderer').createRenderer({
  template: require('fs').readFileSync('./template.html', 'utf-8')
})

// ③ 添加一个中间件来处理所有请求
app.use(async (ctx, next) => {
  const vm = new Vue({
    data: {
      title: '当前位置',
      url: ctx.url   // 这里的ctx.url相当于ctx.request.url
    },
    template: '<div>{{title}}：{{url}}</div>'
  })
  // ④ 将Vue实例渲染为HTML后输出
  renderer.renderToString(vm, (err, html) => {
    if (err) {
      ctx.res.status(500).end('err: ' + err)
      return
    }
    ctx.body = html
  })
})
app.listen(8081, function () {
  console.log('server started at localhost:8081')
})
