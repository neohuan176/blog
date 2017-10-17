
<template>
    <div class="layout" :class="{'layout-hide-text': spanLeft < 3}">
        <Row type="flex">
            <Col :span="spanLeft" class="layout-menu-left">
                <Menu :active-name="currentPath" theme="dark" width="auto" accordion>
                    <div class="layout-logo-left"></div>
                    <template v-for="(item,index) in $router.options.routes" :keys="index" v-if="!item.hidden">
                        <router-link :to="item.children[0].path" v-if="item.leaf">
                        <MenuItem :name="item.children[0].path" >
                            <Icon :type="item.icon" :size="iconSize"></Icon>
                            <span class="layout-text">{{item.children[0].name}}</span>
                        </MenuItem>
                        </router-link>

                        <Submenu :name="item.path" v-if="!item.leaf && item.children.length>0">
                            <template slot="title">
                                <Icon :type="item.icon" :size="iconSize"></Icon>
                                <span class="layout-text">{{item.name}}</span>
                            </template>
                            <router-link :to="child.path" v-for="(child,index) in item.children" :key="index">
                            <MenuItem :name="child.path" ><span >{{child.name}}</span></MenuItem>
                            </router-link>
                        </Submenu>

                    </template>
                </Menu>
            </Col>

            <Col :span="spanRight">
                <div class="layout-header">
                    <Button type="text" @click="toggleClick">
                        <Icon type="navicon" size="32"></Icon>
                    </Button>
                    <span>1{{sysUserName}}</span>
                </div>
                <div class="layout-breadcrumb">
                    <Breadcrumb>
                        <BreadcrumbItem :href="currentPathNameParentPath">{{currentPathNameParent}}</BreadcrumbItem>
                        <BreadcrumbItem v-if="currentPathName!=''">{{currentPathName}}</BreadcrumbItem>
                    </Breadcrumb>
                </div>
                <div class="layout-content">
                    <div class="layout-content-main"><router-view></router-view></div>
                </div>
                <div class="layout-copy">
                    2011-2016 &copy; TalkingData
                </div>
            </Col>
        </Row>
    </div>
</template>
<script scoped>
    export default {
        data () {
            return {
                spanLeft: 3,
                spanRight: 21,
                currentPath: '/',
                currentPathName:'',
                currentPathNameParent: '',
                currentPathNameParentPath: '',
                sysUserName: ''
            }
        },
        watch: {
            '$route'(to,from){
                this.currentPath = to.path
                this.currentPathName = to.name
                this.currentPathNameParent = to.matched[0].name
                this.currentPathNameParentPath = to.matched[0].path
            }
        },
        computed: {
            iconSize () {
                return this.spanLeft === 3 ? 14 : 24;
            }
        },
        methods: {
            toggleClick () {
                if (this.spanLeft === 3) {
                    this.spanLeft = 1;
                    this.spanRight = 23;
                } else {
                    this.spanLeft = 3;
                    this.spanRight = 21;
                }
            }
        },
        mounted(){
            $(".ivu-menu-submenu-title-icon").addClass('arraow-pos');
        },
        created(){
            var user = JSON.parse(localStorage.getItem('user'));
            if (user) {
                this.sysUserName = user.name || '';
            }
        }
    }
</script>
<style >

    .arraow-pos {
        position: absolute!important;
        top: 39%!important;
        left: 79%!important;
    }


    .layout{
        border: 1px solid #d7dde4;
        background: #f5f7f9;
        position: relative;
        border-radius: 4px;
        overflow: hidden;
    }
    .layout-breadcrumb{
        padding: 10px 15px 0;
    }
    .layout-content{
        min-height: 800px;
        margin: 15px;
        overflow: hidden;
        background: #fff;
        border-radius: 4px;
    }
    .layout-content-main{
        padding: 10px;
    }
    .layout-copy{
        text-align: center;
        padding: 10px 0 20px;
        color: #9ea7b4;
    }
    .layout-menu-left{
        background: #464c5b;
    }
    .layout-header{
        height: 60px;
        background: #fff;
        box-shadow: 0 1px 1px rgba(0,0,0,.1);
    }
    .layout-logo-left{
        width: 90%;
        height: 30px;
        background: #5b6270;
        border-radius: 3px;
        margin: 15px auto;
    }
    .layout-ceiling-main a{
        color: #9ba7b5;
    }
    .layout-hide-text .layout-text{
        display: none;
    }
    .ivu-col{
        transition: width .2s ease-in-out;
    }
</style>