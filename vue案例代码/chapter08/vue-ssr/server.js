
// ① 创建Vue实例
const Vue = require('vue')
const server = require('express')()

// ② 读取模板
const renderer = require('vue-server-renderer').createRenderer({
  template: require('fs').readFileSync('./template.html', 'utf-8')
})

// ③ 处理GET方式请求
server.get('*', (req, res) => {
  res.set({'Content-Type': 'text/html; charset=utf-8'})
  const vm = new Vue({
    data: {
      title: '当前位置',
      url: req.url
    },
    template: '<div>{{title}}：{{url}}</div>',
  })
  // ④ 将Vue实例渲染为HTML后输出
  renderer.renderToString(vm, (err, html) => {
    if (err) {
      res.status(500).end('err: ' + err)
      return
    }
    res.end(html)
  })
})
server.listen(8080, function () {
  console.log('server started at localhost:8080')
})
