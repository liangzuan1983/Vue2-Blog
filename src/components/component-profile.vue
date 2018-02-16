<template>
  <div v-cloak>
    <div class="container">
      <div class="profile-header"></div>
      <a :href="mailMe" target="_blank">
        <div class="profile-mail"></div>
      </a>
      <a>
        <div class="profile-wechat"></div>
      </a>
      <a :href="github" target="_blank">
        <div class="profile-github"></div>
      </a>
    </div>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      mailMe: 'http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=new_yj@foxmail.com',
      github: 'https://github.com/new-yj'
    }
  }
}
</script>

<style scoped>
.container {
  width: 290px;
  height: 300px;
  background: #fff;
  box-shadow: 0 0 5px #ccc;
}
.profile-mail {
  width: 30px;
  height: 30px;
  background: #ccc;
}
.profile-github {
  width: 30px;
  height: 30px;
  background: #ccc;
}
</style>
