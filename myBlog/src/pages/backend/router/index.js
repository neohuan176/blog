import Vue from 'vue'
import Router from 'vue-router'
import Login from '..//components/user/login'
import Layout from '..//components/main/layout'
import Main from '..//components/main/main'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: '',
      component: Layout,
      children:[
        { path: '/', component: Main, name: '控制台' },
      ]
    },
    {
      path: '/login',
      name: '登录',
      component: Login
    }
  ]
})
