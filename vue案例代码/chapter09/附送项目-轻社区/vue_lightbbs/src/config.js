export default {
  install: function (vue) {
    vue.prototype.$config = {
      name: '轻社区',
      baseURL: 'http://lightbbs.test/api/',
      setTitle (title) {
        document.title = title + ' - ' + this.name
      },
      getAuthorization () {
        return localStorage.getItem('Authorization');
      },
      setAuthorization (Authorization) {
        localStorage.setItem('Authorization', Authorization);
      }
    }
  }
}
