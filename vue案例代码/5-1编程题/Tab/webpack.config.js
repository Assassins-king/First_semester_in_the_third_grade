
// 由于 webpack 是基于Node进行构建的，所有，webpack的配置文件中，任何合法的Node代码都是支持的
// var path = require('path')
const htmlWebpackPlugin = require('html-webpack-plugin')
// vue-loader 15版本需要新增
const VueLoaderPlugin = require('vue-loader/lib/plugin')
module.exports = {
  entry: './main.js', // 配置入口文件
  output: { // 配置输出文件
    path: __dirname, // 表示输出文件的路径,当前路径下
    filename: 'bundle.js',// 指定输出文件的名称
  },
  resolve: { //其他的配置选项
    alias: {
      'vue': 'vue/dist/vue.js'//vue文件地址配置
    }
  },
  module: {
    rules: [
      { // 处理CSS文件的loader
        test: /\.css$/, 
        use: ['style-loader', 'css-loader'] 
      }, 
      { // 处理less文件的loader
        test: /\.less$/, 
        use: ['style-loader', 'css-loader', 'less-loader'] 
      }, 
      { // 处理scss文件的loader 
        test: /\.scss$/, 
        use: ['style-loader', 'css-loader', 'sass-loader'] 
      },   
      {
        test: /\.vue$/,
        loader: 'vue-loader'
      },
      { // 处理图片路径的loader
        test: /\.(jpg|png|bmp|jpeg|gif)$/,
        use: 'url-loader?limit=7633&name=[hash:8]-[name].[ext]'
      },
      { // 处理字体文件的loader
        test: /\.(ttf|eot|svg|woff|woff2)$/,
        use: 'url-loader'
      },
  
    ]
  },
  plugins: [
    new htmlWebpackPlugin({
      template: 'index.html' //模板
    }),
    new VueLoaderPlugin() // vue-loader 15版本需要新增
  ]
}