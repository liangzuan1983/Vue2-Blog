<template>
  <div v-cloak>
    <div class="container">
      <div class="profile-header" :style="{backgroundImage: 'url(' + headerBg + ')'}"></div>
      <div class="profile-bio">{{bio}}</div>
      <ul class="profile-links">
        <li>
          <a :href="mailMe" target="_blank">
            <div class="profile-mail"></div>
          </a>
        </li>
        <li>
          <a>
            <div class="profile-wechat" @mouseover="showTwoDimentionCode" @mouseout="showHeader"></div>
          </a>
        </li>
        <li>
          <a :href="github" target="_blank">
            <div class="profile-github"></div>
          </a>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import headerImg from '../assets/profile-header.jpg'
import twoDimentionCode from '../assets/two-dimention-code.png'

export default {
  data: function () {
    return {
      mailMe: 'http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=new_yj@foxmail.com',
      github: 'https://github.com/new-yj/blog',
      headerBg: headerImg,
      bio: '知识就是力量。'
    }
  },
  methods: {
    showTwoDimentionCode () {
      this.headerBg = twoDimentionCode
    },
    showHeader () {
      this.headerBg = headerImg
    }
  }
}
</script>

<style scoped>
.container {
  width: 290px;
  height: 320px;
  background: #fff;
  box-shadow: 0 1px 5px #ccc;
  box-sizing: border-box;
  padding: 10px;
}
.profile-header {
  width: 200px;
  height: 200px;
  border-radius: 5px;
  margin: 10px auto;
  box-sizing: border-box;
  border: 5px solid #fff;
  box-shadow: 0 1px 5px #ccc;
}
.profile-bio {
  text-align: center;
  color: #666;
}
.profile-links {
  padding: 0;
  width: 220px;
  margin: 0 auto;
  margin-top: -5px;
}
.profile-links li {
  list-style: none;
  display: inline-block;
  margin: 10px;
}
.profile-mail {
  width: 50px;
  height: 50px;
  background: url("../assets/mailMe.svg");
  background-size: cover;
}
.profile-wechat {
  width: 50px;
  height: 50px;
  background: url("../assets/weChat.svg");
  background-size: cover;
}
.profile-github {
  width: 50px;
  height: 50px;
  background: url("../assets/gitHub.svg");
  background-size: cover;
}
</style>
