<template>
  <div id="app">
    <router-view/>
  </div>
</template>

<script>
export default {
  name: 'app',
  data () {
    return {
      user: localStorage.getItem('user')
    }
  },
  watch: {
    '$route'(to, from) {//监听路由改变
        this.authLogin();
    }
  },
  methods:{
  authLogin: function () {
  let _this = this;
  let user = localStorage.getItem('user');
    console.log(user);
      if(user){
          _this.axios.get('/authCheck').then(function (response) {
              if(response.data.status == 200){
                  localStorage.setItem('user',JSON.stringify(response.data.user));
              }else{
                  localStorage.removeItem('user');
                  _this.$router.push({path: '/login'});
              }
          });
      }else{
          _this.$router.push({path: '/login'});
      }
  },
  },
  created: function(){
    this.authLogin
  }
}
</script>

<style>
  #app{
    height: 100%;
  }
  body{
    height: inherit;
  }
  html{
    height: 100%;
  }
</style>
