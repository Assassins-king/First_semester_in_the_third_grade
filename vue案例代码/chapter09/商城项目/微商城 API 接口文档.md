# 1. 微商城 API 接口文档

## 1.1. API V1 接口说明

- 接口基准地址：`http://tpadmin.test/api/`
- 服务端已开启 CORS 跨域支持
- 使用 HTTP Status Code 标识状态
- 数据返回格式统一使用 JSON

### 1.1.1. 支持的请求方法

- GET（SELECT）：从服务器取出资源（一项或多项）。
- POST（CREATE）：在服务器新建一个资源。
- PUT（UPDATE）：在服务器更新资源（客户端提供改变后的完整资源）。
- PATCH（UPDATE）：在服务器更新资源（客户端提供改变的属性）。
- DELETE（DELETE）：从服务器删除资源。
- HEAD：获取资源的元数据。
- OPTIONS：获取信息，关于资源的哪些属性是客户端可以改变的。

### 1.1.2. 返回状态码code说明

| *状态码* | *含义*                | *说明*                                              |
| -------- | --------------------- | --------------------------------------------------- |
| 1        | OK                    | 请求成功                                            |
| 2        | CREATED               | 没有登录                                            |
| 204      | DELETED               | 删除成功                                            |
| 400      | BAD REQUEST           | 请求的地址不存在或者包含不支持的参数                |
| 401      | UNAUTHORIZED          | 未授权                                              |
| 403      | FORBIDDEN             | 被禁止访问                                          |
| 404      | NOT FOUND             | 请求的资源不存在                                    |
| 422      | Unprocesable entity   | [POST/PUT/PATCH] 当创建一个对象时，发生一个验证错误 |
| 500      | INTERNAL SERVER ERROR | 内部错误                                            |
|          |                       |                                                     |

------

## 1.2. 登录

### 1.2.1. 登录验证接口

- 请求路径：user
- 请求方法：get
- 请求参数

| 参数名 | 参数说明 | 备注 |
| ------ | -------- | ---- |
| 无参数 |          |      |

- 响应参数

| 参数名 | 参数说明     | 备注               |
| ------ | ------------ | ------------------ |
| code   | 状态码       | 1登录成功  2未登录 |
| msg    | 提示信息     |                    |
| url    |              |                    |
| data   | 登录人员信息 |                    |

- 响应数据

```json
{
    "code": 1,
    "msg": "",
    "data": {
        "id": 1,
        "username": "test"
    },
    "url": "http://localhost:8080/",
    "wait": 3
}
```

### 1.2.2. 登录接口

- 请求路径：login
- 请求方法：post
- 请求参数

| 参数名   | 参数说明 | 备注 |
| -------- | -------- | ---- |
| username | 用户名   |      |
| password | 密码     |      |

- 响应参数

| 参数名 | 参数说明     | 备注                 |
| ------ | ------------ | -------------------- |
| code   | 状态码       | 1登录成功  0登录失败 |
| msg    | 提示信息     |                      |
| url    |              |                      |
| data   | 登录人员信息 |                      |

- 响应数据

```json
{
  "code": 1,
  "msg": "登录成功",
  "data": {
    "session_id": "akemvcqn21dscu5bupg5sn5p7t", //注意，登录时将会额外得到一个session_id的数据
    "id": 1,
    "username": "test"
  },
  "url": "http://localhost:10086/",
  "wait": 3
}
```

### 1.2.3. 退出接口

- 请求路径：logout
- 请求方法：get
- 请求参数

| 参数名   | 参数说明 | 备注 |
| -------- | -------- | ---- |
| 无参数   |          |      |

- 响应参数

| 参数名 | 参数说明     | 备注                 |
| ------ | ------------ | -------------------- |
| code   | 状态码       | 2没有登录 1登录成功  0登录失败 |
| msg    | 提示信息     |                      |
| time   | 时间戳       |                      |
| data   | 登录人员信息 |                      |

- 响应数据

```json
{
  "code": 2,
  "msg": "您还没有登录。",
  "time": 1589960319,
  "data": ""
}
```

### 1.2.4. 注册接口

- 请求路径：register
- 请求方法：post
- 请求参数

| 参数名   | 参数说明 | 备注 |
| -------- | -------- | ---- |
| username   |  用户名  |      |
| password   |  密码     |      |
| email   |  邮箱    |      |

- 响应参数

| 参数名 | 参数说明     | 备注                 |
| ------ | ------------ | -------------------- |
| code   | 状态码       | 1注册成功  0注册失败 |
| msg    | 提示信息     |                      |
| url    | 请求源       |                      |
| data   | 登录人员信息 |                      |

- 响应数据

```json
{
  "code": 1,
  "msg": "注册成功",
  "data": {
    "session_id": "lcccc49jgi6sslk8c0a6vfaf1u",
    "id": "2",
    "username": "a"
  },
  "url": "http://localhost:10086/",
  "wait": 3
}
```

## 1.3. 首页轮播图

### 1.3.1. 获取轮播图接口

- 请求路径：imglist
- 请求方法：get
- 请求参数

| 参数名 | 参数说明 | 备注 |
| ------ | -------- | ---- |
| 无参数 |          |      |

- 响应参数

| 参数名 | 参数说明       | 备注                   |
| ------ | -------------- | ---------------------- |
| code   | 状态码         | 0加载轮播图失败  1成功 |
| msg    | 提示信息       |                        |
| url    | 请求源地址     |                        |
| data   | 轮播图信息数组 |                        |

- 响应数据

```json
{
  "code": 1,
  "msg": "",
  "data": [
    {
      "id": 73,
      "img": "http://tpadmin.test/static/uploads/goods/swiper/2019/09/17/e21a4de87360bc2f354529920444a0f0.jpg"
    },
    {
      "id": 72,
      "img": "http://tpadmin.test/static/uploads/goods/swiper/2019/09/17/51a9f9975be5cc0e99e52ba8e055c6d0.jpg"
    },
    {
      "id": 71,
      "img": "http://tpadmin.test/static/uploads/goods/swiper/2019/09/17/eef7e476a7422fecd637217d85d77f68.jpg"
    }
  ],
  "url": "http://localhost:10086/",
  "wait": 3
}
```

## 1.4. 分类功能

### 1.4.1. 获取分类信息接口

- 请求路径：category
- 请求方法：get
- 请求参数

| 参数名 | 参数说明 | 备注 |
| ------ | -------- | ---- |
| 无参数 |          |      |

- 响应参数

| 参数名 | 参数说明       | 备注                   |
| ------ | -------------- | ---------------------- |
| code   | 状态码         | 0加载轮播图失败  1成功 |
| msg    | 提示信息       |                        |
| url    | 请求源地址     |                        |
| data   | 分类信息数组 |                        |

- 响应数据

```json
{
  "code": 1,
  "msg": "",
  "data": [
    {
      "id": 1,
      "image": "http://tpadmin.test/static/api/goods/img/noimg.png",
      "name":"手机数码",
      "pid":0,
      "sub":[.....]
    },
    {
      "id": 10,
      "img": "http://tpadmin.test/static/api/goods/img/noimg.png",
      "name":"家用电器",
      "pid":0,
      "sub":[.....]
    },
    ......
  ],
  "url": "http://localhost:10086/",
  "wait": 3
}
```

## 1.5. 商品功能

### 1.5.1. 根据分类编号获取对应的商品列表

- 请求路径：goodslist
- 请求方法：get
- 请求参数

| 参数名 | 参数说明 | 备注 |
| ------ | -------- | ---- |
| category_id |  分类编号      |      |
| last_id | 最后一个商品的编号，默认为0 | |

- 响应参数

| 参数名 | 参数说明       | 备注                   |
| ------ | -------------- | ---------------------- |
| code   | 状态码         | 0失败  1成功 |
| msg    | 提示信息       |                        |
| url    | 请求源地址     |                        |
| data   | 商品列表数组 |                        |

- 响应数据

```json
{
  "code": 1,
  "msg": "",
  "data": [
    {
      "id": 100,
      "goods_category_id": 2,
      "name": "商品100",
      "sell_point": "",
      "price": "998.00",
      "num": 200,
      "image": "http://tpadmin.test/static/uploads/goods/goods_image/2020/05/16/d4ad9d92f2962c5f697aa5638c23b5e7.jpg",
      "status": 1,
      "content": "",
      "album": "goods/goods_album/2020/05/16/a585ad1816bbb06db574206b86994469.jpg",
      "delete_time": null,
      "create_time": "2020-05-16 16:43:14",
      "update_time": "2020-05-16 16:46:00"
    },
    ......
  ],
  "url": "http://localhost:10086/",
  "wait": 3
}
```

### 1.5.2. 根据商品编号获取对应的商品详情

- 请求路径：goodsinfo
- 请求方法：get
- 请求参数

| 参数名 | 参数说明 | 备注 |
| ------ | -------- | ---- |
| id |  商品编号      |      |

- 响应参数

| 参数名 | 参数说明       | 备注                   |
| ------ | -------------- | ---------------------- |
| code   | 状态码         | 0失败  1成功 |
| msg    | 提示信息       |                        |
| url    | 请求源地址     |                        |
| data   | 商品详情       |                        |

- 响应数据

```json
{
  "code": 1,
  "msg": "",
  "data": {
    "id": 107,
    "goods_category_id": 4,
    "name": "iphone xs max",
    "sell_point": "史上最贵，装X必备",
    "price": "5000.00",
    "num": 2000,
    "image": "goods/goods_image/2020/05/23/9ceb72fbaa68c34c76ba9c492dd5b782.jpg",
    "status": 1,
    "content": "<p>iPhone XS Max配置6.5英寸显示屏，<a target="_blank" href="https://baike.baidu.com/item/%E5%88%86%E8%BE%A8%E7%8E%87/213523" style="color: rgb(19, 110, 194); text-decoration-line: none;">分辨率</a>为2688×1242，458 ppi。iPhone XS Max屏幕空间比“Plus”手机更大。iPhone XS Max显示屏支持横向显示双列应用程序。苹果<a target="_blank" href="https://baike.baidu.com/item/3D%20Touch/18605463" style="color: rgb(19, 110, 194); text-decoration-line: none;">3D Touch</a>依然适用于iPhone XS和iPhone XS Max。升级的扬声器系统还<span class="sup--normal" style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em; margin-left: 2px; color: rgb(51, 102, 204); cursor: pointer; padding: 0px 2px;">&nbsp;[7]</span><a class="sup-anchor" style="color: rgb(19, 110, 194); position: relative; top: -50px; font-size: 0px; line-height: 0;">&nbsp;</a>&nbsp;包括立体声声音。iPhone XS Max的边框宽度为4.0mm。<span class="sup--normal" style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em; margin-left: 2px; color: rgb(51, 102, 204); cursor: pointer; padding: 0px 2px;">&nbsp;[6]</span><a class="sup-anchor" style="color: rgb(19, 110, 194); position: relative; top: -50px; font-size: 0px; line-height: 0;">&nbsp;</a></p><p>iPhone XS Max可提供高达512GB的存储空间，还提供64GB、256GB选项。<span class="sup--normal" style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em; margin-left: 2px; color: rgb(51, 102, 204); cursor: pointer; padding: 0px 2px;">&nbsp;[2]</span><a class="sup-anchor" style="color: rgb(19, 110, 194); position: relative; top: -50px; font-size: 0px; line-height: 0;">&nbsp;</a></p><p>iPhone XS Max的宽度：77.4 毫米(3.05 英寸) ,高度：157.5 毫米(6.20 英寸) ,厚度：7.7 毫米(0.30 英寸)<span class="sup--normal" style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em; margin-left: 2px; color: rgb(51, 102, 204); cursor: pointer; padding: 0px 2px;">&nbsp;[8]</span><a class="sup-anchor" style="color: rgb(19, 110, 194); position: relative; top: -50px; font-size: 0px; line-height: 0;">&nbsp;</a></p><p><a class="lemma-anchor para-title" style="color: rgb(19, 110, 194); position: absolute; top: -50px;"></a><a class="lemma-anchor " style="color: rgb(19, 110, 194); position: absolute; top: -50px;"></a><a class="lemma-anchor " style="color: rgb(19, 110, 194); position: absolute; top: -50px;"></a></p><h2 class="title-text" style="margin: 0px; padding: 0px 8px 0px 18px; font-size: 22px; color: rgb(0, 0, 0); float: left; line-height: 24px; font-weight: 400; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">产品配置</h2><p><a class="edit-icon j-edit-link" style="color: rgb(136, 136, 136); display: block; float: right; height: 22px; line-height: 22px; padding-left: 24px; font-size: 12px; font-family: SimSun; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span class="cmn-icon wiki-lemma-icons wiki-lemma-icons_edit-lemma" style="font-family: baikeFont_layout; -webkit-font-smoothing: antialiased; speak: none; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 1; outline: 0px; margin: 0px 3px 0px 0px; vertical-align: text-bottom; color: rgb(170, 170, 170);"></span>编辑</a></p><p>iPhone XS Max搭载A12仿生芯片，比A11快50%，拥有690万个二极管设置，性能提高了很多，能耗减少了40%，速度提高了50%，神经网络引擎登场，2018年提升很大，2018年是一个8核设计，是一个智能计算机系统。A11神经发动机每秒运行6000亿次，A12每秒可以运行5万亿次，均为苹果研发独立设计，内部存储空间提高到了512GB。</p><p>镜头方面，苹果<a target="_blank" href="https://baike.baidu.com/item/iPhone/238239" style="color: rgb(19, 110, 194); text-decoration-line: none;">iPhone</a>一直都是全球最受欢迎且流行的照相机，1200万像素广角摄像头+120</p><p><a class="image-link" href="https://baike.baidu.com/pic/iPhone%20Xs%20Max/22860388/0/aa18972bd40735fa8de012f690510fb30f240868?fr=lemma&ct=single" target="_blank" title="" style="color: rgb(19, 110, 194); text-decoration-line: none; display: block; width: 220px; height: 159px;"><img class="" src="https://bkimg.cdn.bcebos.com/pic/aa18972bd40735fa8de012f690510fb30f240868?x-bce-process=image/resize,m_lfit,w_220,h_220,limit_1" alt=""/></a></p><p>0万像素镜头的设置，<a target="_blank" href="https://baike.baidu.com/item/%E5%B9%BF%E8%A7%92%E9%95%9C%E5%A4%B4/278835" style="color: rgb(19, 110, 194); text-decoration-line: none;">广角镜头</a>为F1.8大光圈，另一个镜头则是F2.4光圈，前置摄像头采用700万像素摄像头；苹果的摄像头Smart HDR功能进一步得到优化，就是为了让普通的用户都能拍出专业的水准，另外全新的景深调节功能深受用户好评；关于摄像，基于A12芯片，iPhone XS拥有四麦克风设计，支持4K拍摄。</p><p>续航方面，iPhone XS Max比<a target="_blank" href="https://baike.baidu.com/item/iPhone%20X/22117423" style="color: rgb(19, 110, 194); text-decoration-line: none;">iPhone X</a>提高1.5小时。</p><p><br/></p>",
    "album": [
      {
        "id": 0,
        "img": "http://tpadmin.test/static/uploads/goods/goods_album/2020/05/23/c2a54987f506a38324db5e5765aefacc.jpg"
      },
      {
        "id": 1,
        "img": "http://tpadmin.test/static/uploads/goods/goods_album/2020/05/23/411e420d6e841901acf863f58e643c92.jpg"
      },
      {
        "id": 2,
        "img": "http://tpadmin.test/static/uploads/goods/goods_album/2020/05/23/cafdd63154d8c02051513b801cea84c9.jpg"
      },
      {
        "id": 3,
        "img": "http://tpadmin.test/static/uploads/goods/goods_album/2020/05/23/b036a8543786785368f724629866c025.jpg"
      },
      {
        "id": 4,
        "img": "http://tpadmin.test/static/uploads/goods/goods_album/2020/05/23/94d8a6dd1ddbd418c66d948b4b82cf51.jpg"
      }
    ],
    "delete_time": null,
    "create_time": "2020-05-23 17:31:50",
    "update_time": "2020-05-23 17:43:02"
  },
  "url": "http://localhost:10086/",
  "wait": 3
}
```

### 1.5.3. 根据多个商品编号获取对应的商品详情

- 请求路径：shopcart
- 请求方法：get
- 请求参数

| 参数名 | 参数说明 | 备注 |
| ------ | -------- | ---- |
| ids |  商品编号数组  |  [107]    |

- 响应参数

| 参数名 | 参数说明       | 备注                   |
| ------ | -------------- | ---------------------- |
| code   | 状态码         | 0失败  1成功 |
| msg    | 提示信息       |                        |
| url    | 请求源地址     |                        |
| data   | 商品详情       |                        |

- 响应数据

```json
{
  "code": 1,
  "msg": "",
  "data": [
    {
      "id": 107,
      "goods_category_id": 4,
      "name": "iphone xs max",
      "sell_point": "史上最贵，装X必备",
      "price": "5000.00",
      "num": 2000,
      "image": "http://tpadmin.test/static/uploads/goods/goods_image/2020/05/23/9ceb72fbaa68c34c76ba9c492dd5b782.jpg",
      "status": 1,
      "content": "<p>iPhone XS Max配置6.5英寸显示屏，<a target="_blank" href="https://baike.baidu.com/item/%E5%88%86%E8%BE%A8%E7%8E%87/213523" style="color: rgb(19, 110, 194); text-decoration-line: none;">分辨率</a>为2688×1242，458 ppi。iPhone XS Max屏幕空间比“Plus”手机更大。iPhone XS Max显示屏支持横向显示双列应用程序。苹果<a target="_blank" href="https://baike.baidu.com/item/3D%20Touch/18605463" style="color: rgb(19, 110, 194); text-decoration-line: none;">3D Touch</a>依然适用于iPhone XS和iPhone XS Max。升级的扬声器系统还<span class="sup--normal" style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em; margin-left: 2px; color: rgb(51, 102, 204); cursor: pointer; padding: 0px 2px;">&nbsp;[7]</span><a class="sup-anchor" style="color: rgb(19, 110, 194); position: relative; top: -50px; font-size: 0px; line-height: 0;">&nbsp;</a>&nbsp;包括立体声声音。iPhone XS Max的边框宽度为4.0mm。<span class="sup--normal" style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em; margin-left: 2px; color: rgb(51, 102, 204); cursor: pointer; padding: 0px 2px;">&nbsp;[6]</span><a class="sup-anchor" style="color: rgb(19, 110, 194); position: relative; top: -50px; font-size: 0px; line-height: 0;">&nbsp;</a></p><p>iPhone XS Max可提供高达512GB的存储空间，还提供64GB、256GB选项。<span class="sup--normal" style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em; margin-left: 2px; color: rgb(51, 102, 204); cursor: pointer; padding: 0px 2px;">&nbsp;[2]</span><a class="sup-anchor" style="color: rgb(19, 110, 194); position: relative; top: -50px; font-size: 0px; line-height: 0;">&nbsp;</a></p><p>iPhone XS Max的宽度：77.4 毫米(3.05 英寸) ,高度：157.5 毫米(6.20 英寸) ,厚度：7.7 毫米(0.30 英寸)<span class="sup--normal" style="font-size: 12px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em; margin-left: 2px; color: rgb(51, 102, 204); cursor: pointer; padding: 0px 2px;">&nbsp;[8]</span><a class="sup-anchor" style="color: rgb(19, 110, 194); position: relative; top: -50px; font-size: 0px; line-height: 0;">&nbsp;</a></p><p><a class="lemma-anchor para-title" style="color: rgb(19, 110, 194); position: absolute; top: -50px;"></a><a class="lemma-anchor " style="color: rgb(19, 110, 194); position: absolute; top: -50px;"></a><a class="lemma-anchor " style="color: rgb(19, 110, 194); position: absolute; top: -50px;"></a></p><h2 class="title-text" style="margin: 0px; padding: 0px 8px 0px 18px; font-size: 22px; color: rgb(0, 0, 0); float: left; line-height: 24px; font-weight: 400; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">产品配置</h2><p><a class="edit-icon j-edit-link" style="color: rgb(136, 136, 136); display: block; float: right; height: 22px; line-height: 22px; padding-left: 24px; font-size: 12px; font-family: SimSun; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><span class="cmn-icon wiki-lemma-icons wiki-lemma-icons_edit-lemma" style="font-family: baikeFont_layout; -webkit-font-smoothing: antialiased; speak: none; font-variant-numeric: normal; font-variant-east-asian: normal; line-height: 1; outline: 0px; margin: 0px 3px 0px 0px; vertical-align: text-bottom; color: rgb(170, 170, 170);"></span>编辑</a></p><p>iPhone XS Max搭载A12仿生芯片，比A11快50%，拥有690万个二极管设置，性能提高了很多，能耗减少了40%，速度提高了50%，神经网络引擎登场，2018年提升很大，2018年是一个8核设计，是一个智能计算机系统。A11神经发动机每秒运行6000亿次，A12每秒可以运行5万亿次，均为苹果研发独立设计，内部存储空间提高到了512GB。</p><p>镜头方面，苹果<a target="_blank" href="https://baike.baidu.com/item/iPhone/238239" style="color: rgb(19, 110, 194); text-decoration-line: none;">iPhone</a>一直都是全球最受欢迎且流行的照相机，1200万像素广角摄像头+120</p><p><a class="image-link" href="https://baike.baidu.com/pic/iPhone%20Xs%20Max/22860388/0/aa18972bd40735fa8de012f690510fb30f240868?fr=lemma&ct=single" target="_blank" title="" style="color: rgb(19, 110, 194); text-decoration-line: none; display: block; width: 220px; height: 159px;"><img class="" src="https://bkimg.cdn.bcebos.com/pic/aa18972bd40735fa8de012f690510fb30f240868?x-bce-process=image/resize,m_lfit,w_220,h_220,limit_1" alt=""/></a></p><p>0万像素镜头的设置，<a target="_blank" href="https://baike.baidu.com/item/%E5%B9%BF%E8%A7%92%E9%95%9C%E5%A4%B4/278835" style="color: rgb(19, 110, 194); text-decoration-line: none;">广角镜头</a>为F1.8大光圈，另一个镜头则是F2.4光圈，前置摄像头采用700万像素摄像头；苹果的摄像头Smart HDR功能进一步得到优化，就是为了让普通的用户都能拍出专业的水准，另外全新的景深调节功能深受用户好评；关于摄像，基于A12芯片，iPhone XS拥有四麦克风设计，支持4K拍摄。</p><p>续航方面，iPhone XS Max比<a target="_blank" href="https://baike.baidu.com/item/iPhone%20X/22117423" style="color: rgb(19, 110, 194); text-decoration-line: none;">iPhone X</a>提高1.5小时。</p><p><br/></p>",
      "album": "goods/goods_album/2020/05/23/c2a54987f506a38324db5e5765aefacc.jpg|goods/goods_album/2020/05/23/411e420d6e841901acf863f58e643c92.jpg|goods/goods_album/2020/05/23/cafdd63154d8c02051513b801cea84c9.jpg|goods/goods_album/2020/05/23/b036a8543786785368f724629866c025.jpg|goods/goods_album/2020/05/23/94d8a6dd1ddbd418c66d948b4b82cf51.jpg",
      "delete_time": null,
      "create_time": "2020-05-23 17:31:50",
      "update_time": "2020-05-23 17:43:02"
    }
  ],
  "url": "http://localhost:10086/",
  "wait": 3
}
```

## 1.6. 收货地址管理

### 1.6.1 保存收货地址

- 请求路径：address/save
- 请求方法：post
- 请求参数

| 参数名   | 参数说明 | 备注 |
| -------- | -------- | ---- |
| name   | 收货人姓名  |      |
| tel   |  手机号码     |      |
| area   |  收货地址    |      |
| detail   |  详细地址    |      |
| id | 可选参数，如果有id表示做编辑操作，如果没有id参数表示做新增操作 | |

- 响应参数

| 参数名 | 参数说明     | 备注                 |
| ------ | ------------ | -------------------- |
| code   | 状态码       | 2未登录  1保存成功  0保存失败 |
| msg    | 提示信息     |                      |
| url    | 请求源       |                      |
| data   | 收货地址信息 |                      |

- 响应数据

```json
{
  "code": 1,
  "msg": "添加成功",
  "data": {
    "id": "2"
  },
  "url": "http://localhost:10086/",
  "wait": 3
}
```

### 1.6.2 查询收货地址列表

- 请求路径：address
- 请求方法：get
- 请求参数

| 参数名   | 参数说明 | 备注 |
| -------- | -------- | ---- |
| 无参数   |   |      |


- 响应参数

| 参数名 | 参数说明     | 备注                 |
| ------ | ------------ | -------------------- |
| code   | 状态码       | 2未登录  1查询成功  0查询失败 |
| msg    | 提示信息     |                      |
| url    | 请求源       |                      |
| data   | 收货地址列表 |                      |

- 响应数据

```json
{
  "code": 1,
  "msg": "",
  "data": [
    {
      "id": 2,
      "user_user_id": 1,
      "name": "张三",
      "tel": "13111111111",
      "area": "北京市-北京城区-东城区",
      "detail": "订单",
      "create_time": "2020-05-26 17:54:55",
      "update_time": null
    },
    {
      "id": 3,
      "user_user_id": 1,
      "name": "李四",
      "tel": "13222222222",
      "area": "山西省-太原市-小店区",
      "detail": "小店",
      "create_time": "2020-05-26 18:03:07",
      "update_time": null
    }
  ],
  "url": "http://localhost:10086/",
  "wait": 3
}
```

### 1.6.3 查询需要修改的收货地址信息

- 请求路径：address/edit
- 请求方法：get
- 请求参数

| 参数名   | 参数说明 | 备注 |
| -------- | -------- | ---- |
| id   | 收货地址id  |      |


- 响应参数

| 参数名 | 参数说明     | 备注                 |
| ------ | ------------ | -------------------- |
| code   | 状态码       | 2未登录  1查询成功  0查询失败 |
| msg    | 提示信息     |                      |
| url    | 请求源       |                      |
| data   | 收货地址信息 |                      |

- 响应数据

```json
{
  "code": 1,
  "msg": "",
  "data": {
    "id": 2,
    "user_user_id": 1,
    "name": "张三",
    "tel": "13111111111",
    "area": "北京市-北京城区-东城区",
    "detail": "东城一小区",
    "create_time": "2020-05-26 17:54:55",
    "update_time": null
  },
  "url": "http://localhost:9999/",
  "wait": 3
}
```

### 1.6.4 根据id删除收货地址

- 请求路径：address/del
- 请求方法：post
- 请求参数

| 参数名   | 参数说明 | 备注 |
| -------- | -------- | ---- |
| id | 收货地址id | |

- 响应参数

| 参数名 | 参数说明     | 备注                 |
| ------ | ------------ | -------------------- |
| code   | 状态码       | 2未登录  1删除成功  0删除失败 |
| msg    | 提示信息     |                      |
| url    | 请求源       |                      |
| data   |  |                      |

- 响应数据

```json
{
  "code": 1,
  "msg": "删除成功",
  "data": "",
  "url": "http://localhost:10086/",
  "wait": 3
}
```

### 1.6.5 获取默认的收货地址

- 请求路径：address/def
- 请求方法：get
- 请求参数

| 参数名   | 参数说明 | 备注 |
| -------- | -------- | ---- |
| id | 可选参数，如果传递了id就获取id对应的收货地址，如果没有传递id就获取默认的收货地址 | |

- 响应参数

| 参数名 | 参数说明     | 备注                 |
| ------ | ------------ | -------------------- |
| code   | 状态码       | 2未登录  1获取成功  0获取失败 |
| msg    | 提示信息     |                      |
| url    | 请求源       |                      |
| data   | 默认地址信息 |                      |

- 响应数据

```json
{
  "code": 1,
  "msg": "",
  "data": {
    "id": 3,
    "user_user_id": 1,
    "name": "李四有",
    "tel": "13212345678",
    "area": "山西省-太原市-小店区",
    "detail": "小店左边500米",
    "create_time": "2020-05-26 18:03:07",
    "update_time": null
  },
  "url": "http://localhost:10086/",
  "wait": 3
}
```

## 1.6. 订单管理

### 1.6.1 创建订单

- 请求路径：order/create
- 请求方法：post
- 请求参数

| 参数名   | 参数说明 | 备注 |
| -------- | -------- | ---- |
| address   | 收货地址id |      |
| note   |  备注信息     |      |
| goods   |  购买商品信息数组  |  [{"id":"109","count":5,"selected":true},{"id":"111","count":23,"selected":true}]    |

- 响应参数

| 参数名 | 参数说明     | 备注                 |
| ------ | ------------ | -------------------- |
| code   | 状态码       | 2未登录  1创建成功  0创建失败 |
| msg    | 提示信息     |                      |
| url    | 请求源       |                      |
| data   |  |                      |

- 响应数据

```json
{
  "code": 1,
  "msg": "订单创建成功",
  "data": "",
  "url": "http://localhost:10086/",
  "wait": 3
}
```

### 1.6.2 查询订单列表

- 请求路径：order/list
- 请求方法：get
- 请求参数

| 参数名   | 参数说明 | 备注 |
| -------- | -------- | ---- |
| 无参数   |  |      |

- 响应参数

| 参数名 | 参数说明     | 备注                 |
| ------ | ------------ | -------------------- |
| code   | 状态码       | 2未登录  1查询成功  0查询失败 |
| msg    | 提示信息     |                      |
| url    | 请求源       |                      |
| data   | 订单列表信息 |                      |

- 响应数据

```json
{
  "code": 1,
  "msg": "",
  "data": [
    {
      "id": 3,
      "user_user_id": 1,
      "price": "8170.00",
      "address_name": "张三",
      "address_tel": "13111111111",
      "address_area": "内蒙古自治区-乌海市-乌达区",
      "address_detail": "那里",
      "note": "",
      "is_pay": 0,
      "is_cancel": 0,
      "create_time": "2020-05-28 15:53:50",
      "update_time": null,
      "user_order_goods": [
        {
          "id": 4,
          "user_order_id": 3,
          "goods_goods_id": 108,
          "count": 2,
          "price": "4000.00",
          "create_time": "2020-05-28 15:53:50",
          "update_time": null,
          "goods_goods": {
            "id": 108,
            "image": "http://tpadmin.test/static/uploads/goods/goods_image/2020/05/23/2243cf92f5302ed459c6010525ee9c6f.jpg"
          }
        },
        {
          "id": 5,
          "user_order_id": 3,
          "goods_goods_id": 111,
          "count": 17,
          "price": "10.00",
          "create_time": "2020-05-28 15:53:50",
          "update_time": null,
          "goods_goods": {
            "id": 111,
            "image": "http://tpadmin.test/static/uploads/goods/goods_image/2020/05/23/2243cf92f5302ed459c6010525ee9c6f.jpg"
          }
        }
      ]
    }
  ],
  "url": "http://localhost:10086/",
  "wait": 3
}
```

### 1.6.3 查询订单详情

- 请求路径：order/show
- 请求方法：get
- 请求参数

| 参数名   | 参数说明 | 备注 |
| -------- | -------- | ---- |
| id   | 订单id |      |

- 响应参数

| 参数名 | 参数说明     | 备注                 |
| ------ | ------------ | -------------------- |
| code   | 状态码       | 2未登录  1查询成功  0查询失败 |
| msg    | 提示信息     |                      |
| url    | 请求源       |                      |
| data   | 订单详情信息 |                      |

- 响应数据

```json
{
  "code": 1,
  "msg": "",
  "data": {
    "id": 3,
    "user_user_id": 1,
    "price": "8170.00",
    "address_name": "张三",
    "address_tel": "13111111111",
    "address_area": "内蒙古自治区-乌海市-乌达区",
    "address_detail": "那里",
    "note": "",
    "is_pay": 0,
    "is_cancel": 0,
    "create_time": "2020-05-28 15:53:50",
    "update_time": null,
    "user_order_goods": [
      {
        "id": 4,
        "user_order_id": 3,
        "goods_goods_id": 108,
        "count": 2,
        "price": "4000.00",
        "create_time": "2020-05-28 15:53:50",
        "update_time": null,
        "goods_goods": {
          "id": 108,
          "name": "iphone xs max 二手",
          "image": "http://tpadmin.test/static/uploads/goods/goods_image/2020/05/23/2243cf92f5302ed459c6010525ee9c6f.jpg"
        }
      },
      {
        "id": 5,
        "user_order_id": 3,
        "goods_goods_id": 111,
        "count": 17,
        "price": "10.00",
        "create_time": "2020-05-28 15:53:50",
        "update_time": null,
        "goods_goods": {
          "id": 111,
          "name": "iphonexsmax手机膜",
          "image": "http://tpadmin.test/static/uploads/goods/goods_image/2020/05/23/2243cf92f5302ed459c6010525ee9c6f.jpg"
        }
      }
    ]
  },
  "url": "http://localhost:10086/",
  "wait": 3
}
```

### 1.6.4 取消订单

- 请求路径：order/cancel
- 请求方法：post
- 请求参数

| 参数名   | 参数说明 | 备注 |
| -------- | -------- | ---- |
| id   | 订单id |      |

- 响应参数

| 参数名 | 参数说明     | 备注                 |
| ------ | ------------ | -------------------- |
| code   | 状态码       | 2未登录  1取消成功  0取消失败 |
| msg    | 提示信息     |                      |
| url    | 请求源       |                      |
| data   | 订单详情信息 |                      |

- 响应数据

```json
{
  "code": 1,
  "msg": "取消成功",
  "data": "",
  "url": "http://localhost:10086/",
  "wait": 3
}
```

## 1.7. 新闻资讯

### 1.7.1 查询新闻资讯列表

- 请求路径：news/list
- 请求方法：get
- 请求参数

| 参数名   | 参数说明 | 备注 |
| -------- | -------- | ---- |
| 无参数   |  |      |

- 响应参数

| 参数名 | 参数说明     | 备注                 |
| ------ | ------------ | -------------------- |
| status   | 状态码       | 1查询失败  0查询成功 |
| message    | 新闻资讯列表     |                      |

- 响应数据

```json
{
  "status": 0,
  "message": [
    {
      "id": 13,
      "title": "1季度多家房企利润跌幅超50% 去库存促销战打响",
      "add_time": "2015-04-16 03:50:28",
      "zhaiyao": "房企一季度销售业绩已经陆续公布，克而瑞研究中心统计",
      "click": 1,
      "img_url": "http://tpadmin.test/static/api/goods/news/201504161149414479.jpg"
    },
    {
      "id": 14,
      "title": "买房还是炒股，2015年买房无法拒绝的5大理由",
      "add_time": "2015-04-16 04:05:34",
      "zhaiyao": "转眼间2015年已经过去了4个月，在这短短的四个月",
      "click": 2,
      "img_url": "http://tpadmin.test/static/api/goods/news/201504161205596364.jpg"
    }
  ]
}
```

### 1.7.2 根据id查询新闻详情

- 请求路径：news/show
- 请求方法：get
- 请求参数

| 参数名   | 参数说明 | 备注 |
| -------- | -------- | ---- |
| id   | 新闻id |      |

- 响应参数

| 参数名 | 参数说明     | 备注                 |
| ------ | ------------ | -------------------- |
| status   | 状态码       | 1查询失败  0查询成功 |
| message    | 新闻资讯详情     |                      |

- 响应数据

```json
{
  "status": 0,
  "message": [
    {
      "id": 13,
      "title": "1季度多家房企利润跌幅超50% 去库存促销战打响",
      "click": 1,
      "add_time": "2015-04-16 03:50:28",
      "content": "<p>\r\n\t房企一季度销售业绩已经陆续公布，克而瑞研究中心统计数据显示，今年一季度，TOP20的房企仅6家实现业绩同比增长。\r\n<\/p>\r\n<p>\r\n\t<b>多家企业销售下滑<\/b> \r\n<\/p>\r\n<p>\r\n\t记者了解到，虽然恒大、融创一季度交出了不错的答卷，但是，万科等排名靠前的房企均出现销售下滑。其中万科公布前三个月销售金额为460.6亿元，同比去年的542.3亿元减少15%，而碧桂园公布，截至2015年3月31日止三个月，集团共实现合同销售金额约177.3亿元，同比下跌44.32%。\r\n<\/p>\r\n<p>\r\n\t<b>此外，一季度多家企业的利润跌幅超过50%。数据显示，万科预计2015年1月至3月归属于上市公司股东的净利润为6亿~7亿元，比上年同期下降54%至61%。<\/b> \r\n<\/p>\r\n<p>\r\n\t<b>趋势<\/b> \r\n<\/p>\r\n<p>\r\n\t<b>地价占比上升及去库存压力下&nbsp;房企利润回归<\/b> \r\n<\/p>\r\n<p>\r\n\t中原地产首席分析师张大伟称，一季度房企销售及利润普遍下滑，主要是因为企业销售节奏的变化，“大部分企业在2013年完成情况非常好，预留了大量签约结转到2014年。但2014年整体企业完成情况较差，大部分企业反而透支了2015年年初的签约，导致2015年签约不尽如人意。”\r\n<\/p>\r\n<p>\r\n\t同时，张大伟表示，大多数城市住房供大于求，价格过高，未来增值不确定，已经不再是最佳投资选择，因此房地产投资需求也出现显著回落。\r\n<\/p>\r\n<p>\r\n\t而易居房地产研究院研究员严跃进则表示，一季度部分房企还是坚持降价促销的策略，对此出现利润下滑也是符合预期的。随着地价占房价比例越来越高，开发商利润空间不断被挤压。同时，很多房企目前的营销费用还是比较大的，也会损耗房企利润。\r\n<\/p>\r\n<p>\r\n\t此外，严跃进说，从长期看，地价占比上升与去库存压力将成为长期趋势，房企已告别高利润时代，回归正常利润成为趋势。\r\n<\/p>\r\n<p>\r\n\t不过，张大伟认为，3月下半月市场告别签约淡季。部分城市出现小阳春现象，预计整体市场的走势将会继续向好，后续改善型需求的入市量将会有所增加。\r\n<\/p>\r\n<p>\r\n\t<b>分析：<\/b> \r\n<\/p>\r\n<p>\r\n\t<b>房企打响去库存促销战<\/b> \r\n<\/p>\r\n<p>\r\n\t“对于房地产市场来说，出现退房的原因有两种：1.收房的时候质量差。2.房价下调。无理由退房对于中国90%成交是期房的房地产市场现状来说，这的确是解决了购房者对房屋质量的担忧。”中原地产首席分析师张大伟对记者表示，后续预计也会有更多企业学习借鉴。\r\n<\/p>\r\n<p>\r\n\t而亚太城市房地产研究院院长谢逸枫则表示，恒大2015年率先打出全国项目“无理由退房”计划第一枪，意味正式打响房企主动去库存的促销战。\r\n<\/p>\r\n<p>\r\n\t“承诺无理由退房，意味着开发商承担更多的风险，在资金方面承受更大压力，后续肯定会有企业跟风。”知名地产评论人赵卓文表示。\r\n<\/p>\r\n<p>\r\n\t因此，有业内人士认为，无理由退房可能加速市场优胜劣汰。夏海钧回应称，中国房地产市场高峰时有五六万家房地产开发企业，现在还有两三万家。市场竞争、行业洗牌再洗掉两万多家，剩几百几千家很正常，“到那时行业整体素质会更高”。\r\n<\/p>\r\n<p>\r\n\t“在目前这个市场周期，恒大提出无理由退房，也的确更多是为了去库存营销的努力，从营销上看，对增加成交量肯定有帮助。”张大伟表示。\r\n<\/p>\r\n<p>\r\n\t“常规的降价促销已经无法触及购房者的神经，房企必须使出浑身解数吸引购房者。另一方面是购房者对价格敏感性在减弱，对降价没有之前那么敏感，购房者普遍存在买涨不买跌，无理由退房主要是打消购房者对房价不断下降的顾虑。目的在于制造市场 上涨 预期，引导购房者对后市乐观的态度。”谢逸枫认为。\r\n<\/p>\r\n<p>\r\n\t也有部分业内人士对“无理由退房”的操作性心存疑虑。\r\n<\/p>\r\n<p>\r\n\t<b>相关新闻<\/b> \r\n<\/p>\r\n<p>\r\n\t<b>恒大宣布全国范围内无理由退房<\/b> \r\n<\/p>\r\n<p>\r\n\t恒大地产集团昨日宣布，自今日起，将在全国所有楼盘住宅实施无理由退房，该措施覆盖全国147个城市的305个楼盘。恒大副总裁夏海钧表示，希望住宅“包退”成为市场新常态。\r\n<\/p>\r\n<p>\r\n\t<b>今日起买恒大房“包退货”<\/b> \r\n<\/p>\r\n<p>\r\n\t昨日下午，恒大宣布，全国所有楼盘住宅从4月16日8时起正式实施无理由退房，覆盖恒大所有在售住宅，遍布全国147个城市的305个楼盘。\r\n<\/p>\r\n<p>\r\n\t恒大集团承诺：凡购买恒大所有楼盘住宅的客户，若已履行《楼宇认购书》、《商品房买卖合同》的各项义务，并且无任何违约行为，则自签署《商品房买卖合同》及《无理由退房协议书》之日起至办理入住手续前的任何时间内，均可无理由退房。\r\n<\/p>\r\n<p>\r\n\t最新数据显示，2015年1~3月，恒大累计合约销售金额约305.4亿元，其中3月实现合约销售额137.1亿元，&nbsp;恒大地产2014年全年销售额达1315亿元，2015年销售目标定为1500亿元，较2014年目标增36.4%\r\n<\/p>"
    }
  ]
}
```

## 1.8. 图片分享

### 1.8.1 查询图片分享分类

- 请求路径：photo/getimgcategory
- 请求方法：get
- 请求参数

| 参数名   | 参数说明 | 备注 |
| -------- | -------- | ---- |
| 无参数   |  |      |

- 响应参数

| 参数名 | 参数说明     | 备注                 |
| ------ | ------------ | -------------------- |
| status   | 状态码       | 1查询失败  0查询成功 |
| message    | 分类列表     |                      |

- 响应数据

```json
{
  "status": 0,
  "message": [
    {
      "title": "空间设计",
      "id": 17
    },
    {
      "title": "摄影设计",
      "id": 15
    },
    {
      "title": "明星美女",
      "id": 16
    },
    {
      "title": "家居生活",
      "id": 14
    },
    {
      "title": "户型装饰",
      "id": 18
    },
    {
      "title": "广告摄影",
      "id": 19
    },
    {
      "title": "摄影学习",
      "id": 20
    },
    {
      "title": "摄影器材",
      "id": 21
    },
    {
      "title": "明星写真",
      "id": 22
    },
    {
      "title": "清纯甜美",
      "id": 23
    },
    {
      "title": "古典美女",
      "id": 24
    }
  ]
}
```

### 1.8.2 根据分类id查询图片列表

- 请求路径：photo/getimages
- 请求方法：get
- 请求参数

| 参数名   | 参数说明 | 备注 |
| -------- | -------- | ---- |
| id   | 图片分享分类id，如果id参数为0则表示查询所有分类的图片列表 |      |

- 响应参数

| 参数名 | 参数说明     | 备注                 |
| ------ | ------------ | -------------------- |
| status   | 状态码       | 1查询失败  0查询成功 |
| message    | 图片资讯列表     |                      |

- 响应数据

```json
{
  "status": 0,
  "message": [
    {
      "id": 37,
      "title": "现代简约 明亮的外表卧室卧室背景墙、吊顶黄色",
      "img_url": "http://tpadmin.test/static/api/goods/photo/thumb_201504181230434303.jpg",
      "zhaiyao": "不要简朴不要素雅洋气卧室我做主，高低床榻榻米式靓丽卧室装扮，现代油画壁画帆布画卧室餐厅仟象映画，现代中式卧室装修图欣赏，温馨浪漫，而且很时尚的卧室设计，欧式卧室飘窗装修效果图。"
    },
    {
      "id": 38,
      "title": "很美的落地大书柜 可以放超多的图书的吧",
      "img_url": "http://tpadmin.test/static/api/goods/photo/thumb_201504181237019134.jpg",
      "zhaiyao": "很美的落地大书柜 可以放超多的图书的吧，转角的书柜以及书桌，这里可以收纳超多的东西，书柜,书桌这些是&quot;七彩人生&quot;品，双层书柜组合书柜儿童书柜。"
    },
    {
      "id": 39,
      "title": "西班牙阿拉尔孔郊区的80平米一室一厅的公寓",
      "img_url": "http://tpadmin.test/static/api/goods/photo/thumb_201504181241259978.jpg",
      "zhaiyao": "这是一套在西班牙阿拉尔孔郊区的80平米一室一厅的公寓，用一道墙分隔出了客厅与厨房，虽然整体来看室内设计有些混搭风，但似乎某些空间和角度去看又会有着自己的主题。"
    }
  ]
}
```

### 1.8.3 根据图片资讯id查询图片资讯详情

- 请求路径：photo/getimageInfo
- 请求方法：get
- 请求参数

| 参数名   | 参数说明 | 备注 |
| -------- | -------- | ---- |
| id   | 图片资讯id |      |

- 响应参数

| 参数名 | 参数说明     | 备注                 |
| ------ | ------------ | -------------------- |
| status   | 状态码       | 1查询失败  0查询成功 |
| message    | 图片资讯列表     |                      |

- 响应数据

```json
{
  "status": 0,
  "message": [
    {
      "id": 37,
      "title": "现代简约 明亮的外表卧室卧室背景墙、吊顶黄色",
      "click": 0,
      "add_time": "2015-04-18 04:30:50",
      "content": "不要简朴不要素雅洋气卧室我做主，高低床榻榻米式靓丽卧室装扮，现代油画壁画帆布画卧室餐厅仟象映画，现代中式卧室装修图欣赏，温馨浪漫，而且很时尚的卧室设计<span id=\"__kindeditor_bookmark_start_8__\">，欧式卧室飘窗装修效果图。<\/span>"
    }
  ]
}
```

### 1.8.4 根据图片资讯id查询图片资讯中的图片列表

- 请求路径：photo/getthumimages
- 请求方法：get
- 请求参数

| 参数名   | 参数说明 | 备注 |
| -------- | -------- | ---- |
| id   | 图片资讯id |      |

- 响应参数

| 参数名 | 参数说明     | 备注                 |
| ------ | ------------ | -------------------- |
| status   | 状态码       | 1查询失败  0查询成功 |
| message    | 图片资讯列表     |                      |

- 响应数据

```json
{
  "status": 0,
  "message": [
    {
      "src": "http://tpadmin.test/static/api/goods/photo/thumb_201504181230434303.jpg"
    },
    {
      "src": "http://tpadmin.test/static/api/goods/photo/thumb_201504181230437111.jpg"
    },
    {
      "src": "http://tpadmin.test/static/api/goods/photo/thumb_201504181230439139.jpg"
    },
    {
      "src": "http://tpadmin.test/static/api/goods/photo/thumb_201504181230440387.jpg"
    },
    {
      "src": "http://tpadmin.test/static/api/goods/photo/thumb_201504181230444755.jpg"
    }
  ]
}
```