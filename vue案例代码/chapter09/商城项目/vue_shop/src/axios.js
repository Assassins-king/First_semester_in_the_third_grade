import axios from 'axios'
import config from './config.js'

export default {
  install: function (vue) {
    var auth = vue.prototype.$auth
    var obj = axios.create({
      baseURL: config.baseURL
    })
    obj.interceptors.request.use(function (conf) {
      conf.headers.Authorization = auth.getAuthorization()
      return conf
    })
    vue.prototype.$http = obj
  }
}
