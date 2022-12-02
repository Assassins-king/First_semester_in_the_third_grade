<template>
    <div class="container">
        <!-- 主要内容 -->
        <el-row 
        type="flex" 
        justify="center" 
        align="middle" 
        class="main">
            <div class="form-wrapper">
                <!-- 表单头部tab -->
                <el-row type="flex" justify="center" class="tabs">
                    <span :class="{active: currentTab === index}" 
                    v-for="(item, index) in [`登录`, `注册`]"
                    :key="index" 
                    @click="handleChangeTab(index)">
                        {{item}}
                    </span>
                </el-row>
                <!-- 登录功能组件 -->
                <LoginForm v-if="currentTab == 0"/>
                <!-- 注册功能组件 -->
                <RegisterForm v-if="currentTab == 1"/>
            </div>
        </el-row>
    </div>
</template>

<script>
import LoginForm from '@/components/loginForm'
import RegisterForm from '@/components/RegisterForm'
export default {
    components: {
      LoginForm,
      RegisterForm
    },
    data(){
        return {
            currentTab: 0
        }
    },
    methods: {
        handleChangeTab(index){
            this.currentTab = index;
        },
    }
}
</script>

<style scoped lang="less">
    .container{
        background:black;
        height: 100%;
        width:100%;

        .main{
            height: 100%;
            width: 100%;
            overflow: hidden;
            margin: 0 auto;
            position: fixed;
            top: 0;
            left: 0;
            background: black;
            
            .form-wrapper{
                width:400px;
                margin:0 auto;
                background:#fff;
                box-shadow: 2px 2px 0 rgba(0,0,0,0.1);
                overflow:hidden;
                
                .tabs{
                    span{
                        display: block;
                        width:50%;
                        height: 50px;
                        box-sizing: border-box;
                        border-top:2px #eee solid;
                        background:#eee;
                        line-height: 48px;
                        text-align: center;
                        cursor: pointer;
                        color:#666;

                        &.active{
                            color:orange;
                            border-top-color: orange;
                            background:#fff;
                            font-weight: bold;
                        }
                    }
                }
            }
        }
    }
</style>