const Koa = require('koa')
const app = new Koa()
const bundle = require('./dist/vue-ssr-server-bundle.json')

const { createBundleRenderer } = require('vue-server-renderer')

const renderer = createBundleRenderer(bundle, {
  template: require('fs').readFileSync('./template.html', 'utf-8'),
})

function renderToString (context) {
  return new Promise((resolve, reject) => {
    renderer.renderToString(context, (err, html) => {
      err ? reject(err) : resolve(html)
    })
  })
}

app.use(async (ctx, next) => {
  const context = {
    title: 'ssr project',
    url: ctx.url
  }
  const html = await renderToString(context)
  ctx.body = html
})

app.listen(8080, function() {
  console.log('server started at localhost:8080')
})
