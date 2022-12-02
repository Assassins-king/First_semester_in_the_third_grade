const data = [
  { 'id': 1, 'title': '电水壶', 'price': 50.01, src: '/static/1.jpg' },
  { 'id': 2, 'title': '电压力锅', 'price': 260.99, src: '/static/2.jpg' },
  { 'id': 3, 'title': '电饭煲', 'price': 200.99, src: '/static/3.jpg' },
  { 'id': 4, 'title': '电磁炉', 'price': 300.99, src: '/static/4.jpg' },
  { 'id': 5, 'title': '微波炉', 'price': 400.99, src: '/static/5.jpg' },
  { 'id': 6, 'title': '电饼铛', 'price': 200.99, src: '/static/6.jpg' },
  { 'id': 7, 'title': '豆浆机', 'price': 199.99, src: '/static/7.jpg' },
  { 'id': 8, 'title': '多用途锅', 'price': 510.99, src: '/static/8.jpg' }
]

export default {
  getGoodsList (callback) {
    setTimeout(() => callback(data), 100)
  }
}
