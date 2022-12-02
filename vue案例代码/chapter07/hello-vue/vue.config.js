// 导入goods.json文件
const goods = require('./data/goods.json')

module.exports = {
  devServer: {
    port: 8081,		// 修改端口号
    open: true,		// 自动启动浏览器
    before: app => {
      // 请求接口地址http://localhost:8081/api/goods
      app.get('/api/goods', (req, res) => {
        res.json(goods)
      })
    }
  }
}
