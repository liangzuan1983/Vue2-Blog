<template>
  <div v-cloak>
      <div class="container">
          <input v-model="username" type="text" placeholder="用户名" />
          <input v-model="password" type="password" placeholder="密码" />
          <p v-show="dataError">用户名或密码错误</p>
          <button @click="login">登录</button>
      </div>
  </div>
</template>

<script>
import Bus from '../bus.js'

export default {
  mounted () {
    Bus.$emit('is-management', true)
  },
  data () {
    return {
      username: '',
      password: '',
      dataError: false
    }
  },
  methods: {
    login () {
      //   提交数据登录
      let _this = this
      let data = ''
      for (let key in _this.$data) {
        data += (key + '=' + this.$data[key] + '&')
      }
      _this.$http
        .post('/php/management/login.php', data)
        .then(function (response) {
          //   设置已登录状态
          Bus.$data.isLogon = response.data
          if (Bus.$data.isLogon) {
            //   如果用户名密码正确则跳转路由
          } else {
            //   如果用户名或密码错误
            _this.dataError = true
          }
        })
        .catch(function (error) {
          console.log(error)
        })
    }
  }
}
</script>

<style scoped>
.container {
  background: #fff;
  box-shadow: 0 1px 7px #ccc;
  width: 320px;
  height: 320px;
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  text-align: center;
}
.container input {
  width: 250px;
  height: 30px;
  border: 1px solid #ccc;
  outline: none;
  margin-top: 50px;
  font-size: 20px;
}
.container button {
  display: block;
  margin: 30px auto;
  width: 250px;
  height: 36px;
  font-size: 20px;
  border-radius: 5px;
  border: none;
  outline: none;
  background: #2d8cf0;
  border: 1px solid #ccc;
  color: #fff;
}
.container button:hover {
  background: #57a3f3;
}
.container button:active {
  background: #2d8cf0;
}
.container p {
    text-align: left;
    margin-left: 35px;
    color: #a00;
}

@media (max-width: 980px) {
  .container {
    width: 280px;
    height: 280px;
  }
  .container input, .container button {
      width: 220px;
  }
  .container p {
    margin-left: 15px;
  }
}
</style>
