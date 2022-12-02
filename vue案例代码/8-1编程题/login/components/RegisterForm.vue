<template>
    <el-form  class="form">
        <el-form-item class="form-item">
            <el-input placeholder="用户名/手机"> </el-input>
        </el-form-item>
        <el-form-item class="form-item">
            <el-input placeholder="密码" type="password"></el-input>
        </el-form-item>
        <el-button class="submit" type="primary">
            注册
        </el-button>
    </el-form>
</template>
<script>
export default {
    data(){
        return {
           
        }
    },
    methods: {
    }
}
</script>

<style scoped lang="less">
    .form{
        padding:25px;
    }

    .form-item{
        margin-bottom:20px;
    }

    .form-text{
        font-size:12px;
        color:#409EFF;
        text-align: right;
        line-height: 1;
    }

    .submit{
        width:100%;
        margin-top:10px;
    }
</style>