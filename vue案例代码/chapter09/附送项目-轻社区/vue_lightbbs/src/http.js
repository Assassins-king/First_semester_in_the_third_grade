import axios from 'axios'

import NProgress from 'nprogress'
import 'nprogress/nprogress.css'

var Loading = {
  reqNum: 0,
  start () {
    if (this.reqNum === 0) {
      NProgress.start()
    }
    this.reqNum++
  },
  end () {
    if (this.reqNum <= 0) {
      return
    }
    this.reqNum--
    if (this.reqNum === 0) {
      NProgress.done()
    }
  }
}

export default {
  install: function (vue) {
    var config = vue.prototype.$config
    var obj = axios.create({
      baseURL: config.baseURL
    })
    obj.interceptors.request.use(function (req) {
      Loading.start()
      req.headers.Authorization = config.getAuthorization()
      return req
    })
    obj.interceptors.response.use(function (res) {
      Loading.end()
      return res
    })
    vue.prototype.$http = obj
  }
}
