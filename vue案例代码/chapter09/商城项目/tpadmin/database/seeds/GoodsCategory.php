<?php

use think\migration\Seeder;

class GoodsCategory extends Seeder
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $this->table('goods_category')->insert([
            ['id' => 1, 'pid' => 0, 'name' => '手机数码', 'sort' => 1],
            ['id' => 2, 'pid' => 1, 'name' => '小米', 'image' => 'goods/category_image/2019/05/15/f2efb0888bef8fd157f2f1c8755e6f80.png', 'sort' => 1],
            ['id' => 3, 'pid' => 1, 'name' => '华为', 'image' => 'goods/category_image/2019/05/15/953cfabd3bf5c3a482bbe9ac66c8fa21.jpg', 'sort' => 2],
            ['id' => 4, 'pid' => 1, 'name' => 'iPhone', 'image' => 'goods/category_image/2019/05/15/b87144fdb530687b9558d921e83d48ab.jpg', 'sort' => 3],
            ['id' => 5, 'pid' => 1, 'name' => 'vivo', 'image' => 'goods/category_image/2019/05/15/670b2f18751fd29970efe26398391274.png', 'sort' => 4],
            ['id' => 6, 'pid' => 1, 'name' => 'OPPO', 'image' => 'goods/category_image/2019/05/15/a0e3ce31f804d56b14271a16dcbdc10b.png', 'sort' => 5],
            ['id' => 7, 'pid' => 1, 'name' => '魅族', 'image' => 'goods/category_image/2019/05/15/6bbf72a71c1bcf6e443d14fefedd103f.jpg', 'sort' => 6],
            ['id' => 8, 'pid' => 1, 'name' => '三星', 'image' => 'goods/category_image/2019/05/15/58bfad062b532a1d3c42099f819068cb.png', 'sort' => 7],
            ['id' => 9, 'pid' => 1, 'name' => '女性手机', 'image' => 'goods/category_image/2019/05/15/9aeaf37dc32d926285f2fc3427de02df.jpg', 'sort' => 8],
            ['id' => 10, 'pid' => 0, 'name' => '家用电器', 'sort' => 2],
            ['id' => 11, 'pid' => 10, 'name' => '电水壶/热水瓶', 'image' => 'goods/category_image/2019/05/15/0a1e8b506b4bbe1a73f16d70b2eece7e.jpg', 'sort' => 1],
            ['id' => 12, 'pid' => 10, 'name' => '电压力锅', 'image' => 'goods/category_image/2019/05/15/aa69a3bcffcc52b0e365ca65243ec835.jpg', 'sort' => 2],
            ['id' => 13, 'pid' => 10, 'name' => '电饭煲', 'image' => 'goods/category_image/2019/05/15/f1c0cf688bcb91fe32b5c2a7906e6332.jpg', 'sort' => 3],
            ['id' => 14, 'pid' => 10, 'name' => '电磁炉', 'image' => 'goods/category_image/2019/05/15/253a5d721e376ecf3b1a5a06baa7a317.jpg', 'sort' => 4],
            ['id' => 15, 'pid' => 10, 'name' => '微波炉', 'image' => 'goods/category_image/2019/05/15/890e9fbcac4cd5ff338fea5dc2596540.jpg', 'sort' => 5],
            ['id' => 16, 'pid' => 10, 'name' => '电饼铛', 'image' => 'goods/category_image/2019/05/15/ccc6a23166e0a673309cb6759ef160b3.jpg', 'sort' => 6],
            ['id' => 17, 'pid' => 10, 'name' => '豆浆机', 'image' => 'goods/category_image/2019/05/15/fd4ba9365e03c0976e8cf22f78a902c2.jpg', 'sort' => 7],
            ['id' => 18, 'pid' => 10, 'name' => '多用途锅', 'image' => 'goods/category_image/2019/05/15/9b9f45fc1b08982f025cbe565c7ec008.jpg', 'sort' => 8],
            ['id' => 19, 'pid' => 0, 'name' => '电脑办公', 'sort' => 3],
            ['id' => 20, 'pid' => 19, 'name' => '轻薄本', 'image' => 'goods/category_image/2019/05/15/1ed760174279e3970e85217019c1edd0.png', 'sort' => 1],
            ['id' => 21, 'pid' => 19, 'name' => '游戏本', 'image' => 'goods/category_image/2019/05/15/5e4130cc28927665799c3379c78a1713.png', 'sort' => 2],
            ['id' => 22, 'pid' => 19, 'name' => '机械键盘', 'image' => 'goods/category_image/2019/05/15/e6c8697469c56055223756e39c60542a.jpg', 'sort' => 3],
            ['id' => 23, 'pid' => 19, 'name' => '组装电脑', 'image' => 'goods/category_image/2019/05/15/2544453b66d11ff24c626638dcb2565e.jpg', 'sort' => 4],
            ['id' => 24, 'pid' => 19, 'name' => '移动硬盘', 'image' => 'goods/category_image/2019/05/15/4a1926d760dfa56abdbd4ce97813acc3.jpg', 'sort' => 5],
            ['id' => 25, 'pid' => 19, 'name' => '显卡', 'image' => 'goods/category_image/2019/05/15/167b37c9ea36b8acc5ff9f1ff4a32f86.jpg', 'sort' => 6],
            ['id' => 26, 'pid' => 19, 'name' => '游戏台式机', 'image' => 'goods/category_image/2019/05/15/c0fd9e8be4fdb13e72838d21ff22b011.jpg', 'sort' => 7],
            ['id' => 27, 'pid' => 19, 'name' => '家用打印机', 'image' => 'goods/category_image/2019/05/15/d98333ee6fddf537ff755a0c90ab93b1.jpg', 'sort' => 8],
            ['id' => 28, 'pid' => 19, 'name' => '吃鸡装备', 'image' => 'goods/category_image/2019/05/15/9b042c5255371159de8d62216564a095.jpg', 'sort' => 9],
            ['id' => 29, 'pid' => 0, 'name' => '汽车用品', 'sort' => 4],
            ['id' => 30, 'pid' => 29, 'name' => '机油', 'image' => 'goods/category_image/2019/05/15/c90ae170808eaa73e258950be16fbcf4.jpg', 'sort' => 1],
            ['id' => 31, 'pid' => 29, 'name' => '汽车坐垫', 'image' => 'goods/category_image/2019/05/15/57f65d64ef5df464e904f37f0141bd69.jpg', 'sort' => 2],
            ['id' => 32, 'pid' => 29, 'name' => '洗车水枪', 'image' => 'goods/category_image/2019/05/15/d6b17ebab487aefed848e43f7c754f02.jpg', 'sort' => 3],
            ['id' => 33, 'pid' => 29, 'name' => '行车记录仪', 'image' => 'goods/category_image/2019/05/15/b808e009ce547e739dad93bf6dbb2f24.jpg', 'sort' => 4],
            ['id' => 34, 'pid' => 29, 'name' => '轮胎', 'image' => 'goods/category_image/2019/05/15/b44b23d989fbf161afa93b8ac3e00a82.jpg', 'sort' => 5],
            ['id' => 35, 'pid' => 29, 'name' => '应急救援', 'image' => 'goods/category_image/2019/05/15/b36db7438c1ed9bb962e944688f9fc88.png', 'sort' => 6],
            ['id' => 36, 'pid' => 29, 'name' => '香水', 'image' => 'goods/category_image/2019/05/15/b861d4d32236610d7c477c8a0a4bbcb7.jpg', 'sort' => 7],
            ['id' => 37, 'pid' => 29, 'name' => '功能小件', 'image' => 'goods/category_image/2019/05/15/5133f9296d5bda3abec8403a3cf6c35e.jpg', 'sort' => 8],
            ['id' => 38, 'pid' => 29, 'name' => '挂件', 'image' => 'goods/category_image/2019/05/15/84dbfe924450cd313fe24e15512ba379.jpg', 'sort' => 9],
            ['id' => 39, 'pid' => 0, 'name' => '男装', 'sort' => 5],
            ['id' => 40, 'pid' => 39, 'name' => '夹克', 'image' => 'goods/category_image/2019/05/15/d73ec1fab63babbfb39ce44ae35b96c8.jpg', 'sort' => 1],
            ['id' => 41, 'pid' => 39, 'name' => 'T恤', 'image' => 'goods/category_image/2019/05/15/73c491573c9d3d3d8327704733a71207.jpg', 'sort' => 2],
            ['id' => 42, 'pid' => 39, 'name' => '针织衫', 'image' => 'goods/category_image/2019/05/15/d913b18c3d17c1d99486d51435fc3982.jpg', 'sort' => 3],
            ['id' => 43, 'pid' => 39, 'name' => '衬衫', 'image' => 'goods/category_image/2019/05/15/aac1ab3e9531db0c9e53d636ccb1125a.jpg', 'sort' => 4],
            ['id' => 44, 'pid' => 39, 'name' => '卫衣', 'image' => 'goods/category_image/2019/05/15/f3d61ead06fffccac07c6b13f521a625.jpg', 'sort' => 5],
            ['id' => 45, 'pid' => 39, 'name' => '风衣', 'image' => 'goods/category_image/2019/05/15/e6d2db57b8d3c322e8ea93a96702c65e.jpg', 'sort' => 6],
            ['id' => 46, 'pid' => 39, 'name' => '牛仔裤', 'image' => 'goods/category_image/2019/05/15/e32f9556f75d5122852021981cb4b621.jpg', 'sort' => 7],
            ['id' => 47, 'pid' => 39, 'name' => '休闲裤', 'image' => 'goods/category_image/2019/05/15/5a71d7061e49ad91d7089de45d610778.jpg', 'sort' => 8],
            ['id' => 48, 'pid' => 39, 'name' => '自营男装', 'image' => 'goods/category_image/2019/05/15/e47ac280c18965c85a8bcdeb00065257.jpg', 'sort' => 9],
            ['id' => 49, 'pid' => 0, 'name' => '女装', 'sort' => 6],
            ['id' => 50, 'pid' => 49, 'name' => '早春新品', 'image' => 'goods/category_image/2019/05/15/1d481ed906b6237e09225babfba7914d.jpg', 'sort' => 1],
            ['id' => 51, 'pid' => 49, 'name' => '连衣裙', 'image' => 'goods/category_image/2019/05/15/faddc38fbb14032e8bbad6508c2bf367.jpg', 'sort' => 2],
            ['id' => 52, 'pid' => 49, 'name' => '衬衫', 'image' => 'goods/category_image/2019/05/15/cd4de65c042eeb3454fd3f296e630991.jpg', 'sort' => 3],
            ['id' => 53, 'pid' => 49, 'name' => 'T恤', 'image' => 'goods/category_image/2019/05/15/2cf6814d0c79abb994942edf402e2f60.jpg', 'sort' => 4],
            ['id' => 54, 'pid' => 49, 'name' => '牛仔裤', 'image' => 'goods/category_image/2019/05/15/10b01991bf0ece09284ac70730200ec7.jpg', 'sort' => 5],
            ['id' => 55, 'pid' => 49, 'name' => '卫衣', 'image' => 'goods/category_image/2019/05/15/b7fc13f5beb1709b643c912913c85bea.jpg', 'sort' => 6],
            ['id' => 56, 'pid' => 49, 'name' => '针织衫', 'image' => 'goods/category_image/2019/05/15/eebbe04d1504c918f9117ebe21dac34f.jpg', 'sort' => 7],
            ['id' => 57, 'pid' => 49, 'name' => '牛仔外套', 'image' => 'goods/category_image/2019/05/15/7e42c687e645a4c93fbfb5b373029266.jpg', 'sort' => 8],
            ['id' => 58, 'pid' => 49, 'name' => '自营女装', 'image' => 'goods/category_image/2019/05/15/9d0e515e86086a29c3d8390d5cb93252.jpg', 'sort' => 9],
            ['id' => 59, 'pid' => 0, 'name' => '钟表珠宝', 'sort' => 7],
            ['id' => 60, 'pid' => 59, 'name' => '瑞表', 'image' => 'goods/category_image/2019/05/15/518eef9cb854a3cd4cd348882fab1568.jpg', 'sort' => 1],
            ['id' => 61, 'pid' => 59, 'name' => '国表', 'image' => 'goods/category_image/2019/05/15/48a2a5afdebab0e4510349e2fd0f09b9.jpg', 'sort' => 2],
            ['id' => 62, 'pid' => 59, 'name' => '德表', 'image' => 'goods/category_image/2019/05/15/cc1749b9554b14692293444bbd0d4bb8.jpg', 'sort' => 3],
            ['id' => 63, 'pid' => 59, 'name' => '日韩表', 'image' => 'goods/category_image/2019/05/15/02ce848b272a1d07a6f254a844e56db8.jpg', 'sort' => 4],
            ['id' => 64, 'pid' => 59, 'name' => '儿童手表', 'image' => 'goods/category_image/2019/05/15/610569bf2fb1e202c2608a7641ba0643.jpg', 'sort' => 5],
            ['id' => 65, 'pid' => 59, 'name' => '欧美表', 'image' => 'goods/category_image/2019/05/15/75966bad4dd9708e1301650b03113c16.jpg', 'sort' => 6],
            ['id' => 66, 'pid' => 0, 'name' => '内衣配饰', 'sort' => 8],
            ['id' => 67, 'pid' => 66, 'name' => '内衣馆', 'image' => 'goods/category_image/2019/05/15/b10cb30ca7e99b98fbe11f700a1042db.jpg', 'sort' => 1],
            ['id' => 68, 'pid' => 66, 'name' => '大牌文胸', 'image' => 'goods/category_image/2019/05/15/66ea89f35f16bb417f23aed193145c5e.jpg', 'sort' => 2],
            ['id' => 69, 'pid' => 66, 'name' => '自营内衣', 'image' => 'goods/category_image/2019/05/15/f190312466ce914bafa0b582e8c98831.jpg', 'sort' => 3],
            ['id' => 70, 'pid' => 66, 'name' => '内衣爆款', 'image' => 'goods/category_image/2019/05/15/02bda63c80a27a00d73e11ae2859cd5e.jpg', 'sort' => 4],
            ['id' => 71, 'pid' => 66, 'name' => '女士围巾/披肩', 'image' => 'goods/category_image/2019/05/15/050c899cdf899d549b14abd958c02a04.jpg', 'sort' => 5],
            ['id' => 72, 'pid' => 66, 'name' => '配饰馆', 'image' => 'goods/category_image/2019/05/15/fd7c742fca0ad155c69157dac9fd9bd5.jpg', 'sort' => 6],
            ['id' => 73, 'pid' => 0, 'name' => '箱包手袋', 'sort' => 9],
            ['id' => 74, 'pid' => 73, 'name' => '拉杆箱', 'image' => 'goods/category_image/2019/05/15/d8ad8e6f509a6230fb9dfd8043a1cb61.jpg', 'sort' => 1],
            ['id' => 75, 'pid' => 73, 'name' => '时尚男包', 'image' => 'goods/category_image/2019/05/15/9486f8909cf9088b1a89bebc722b1ca2.jpg', 'sort' => 2],
            ['id' => 76, 'pid' => 73, 'name' => '男士腰带', 'image' => 'goods/category_image/2019/05/15/450444484bbf37c728d91ec4997c8d80.jpg', 'sort' => 3],
            ['id' => 77, 'pid' => 73, 'name' => '男包上新', 'image' => 'goods/category_image/2019/05/15/7f78f93a82e5dbd6eb1ae21c3061e32f.jpg', 'sort' => 4],
            ['id' => 78, 'pid' => 73, 'name' => '自营女包', 'image' => 'goods/category_image/2019/05/15/52d0c6bd9d566da302e5e6b7f882f543.jpg', 'sort' => 5],
            ['id' => 79, 'pid' => 73, 'name' => '新款双肩包', 'image' => 'goods/category_image/2019/05/15/12fdd667b2e683519f6720ff57753410.jpg', 'sort' => 6]
        ])->save();
    }
}
