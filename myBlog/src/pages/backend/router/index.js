import Vue from 'vue'
import Router from 'vue-router'
import Login from '..//components/user/login'
import Layout from '..//components/main/layout'
import Main from '..//components/main/main'

Vue.use(Router)

window.$ = window.Jquery = require('jquery')

export default new Router({
  routes: [
    {
      path: '/',
      name: '',
      component: Layout,
      icon: 'ionic',
      leaf: true,
      children:[
        { path: '/', component: Main, name: '控制台' },
      ]
    },
    {
      path: '/',
      name: '菜单组',
      component: Layout,
      icon: 'ios-paper',
      leaf: true,
      children:[
        { path: '/testMenu', component: Main, name: '普通菜单' },
      ]
    },
    {
      path: '/',
      name: '菜单组',
      component: Layout,
      icon: 'ios-paper',
      children:[
        { path: '/testMenu1', component: Main, name: '子菜单1' },
        { path: '/testMenu2', component: Main, name: '子菜单2' },
      ]
    },
    {
      path: '/',
      name: '菜单组1',
      component: Layout,
      icon: 'ios-paper',
      children:[
        { path: '/testMenu1-1', component: Main, name: '子菜单1-1' },
        { path: '/testMenu1-2', component: Main, name: '子菜单1-2' },
      ]
    },
    {
      path: '/login',
      name: '登录',
      hidden: true,
      component: Login
    }
  ]
})
