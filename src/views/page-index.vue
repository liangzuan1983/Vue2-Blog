<template>
  <div>
    <my-container>
      <my-articles class="articles"></my-articles>
      <my-profile class="profile"></my-profile>
      <my-fresharticles class="fresharticles"></my-fresharticles>
      <my-footer class="footer">
        浙ICP备18006943号
      </my-footer>
    </my-container>
  </div>
</template>

<script>
import Vue from 'vue'
import myContainer from '../components/component-container'
import myArticles from '../components/component-articles'
import myProfile from '../components/component-profile'
import myFreshArticle from '../components/component-fresharticles'

Vue.component('my-articles', myArticles)
Vue.component('my-container', myContainer)
Vue.component('my-profile', myProfile)
Vue.component('my-fresharticles', myFreshArticle)

export default {}
</script>

<style scoped>
.profile {
  margin-left: 10px;
  margin-top: 30px;
  display: inline-block;
  position: fixed;
}
.articles {
  display: inline-block;
  width: 680px;
}
.fresharticles {
  display: inline-block;
  position: fixed;
  margin-left: 10px;
  margin-top: 380px;
}
.footer {
  position: relative;
  top: 20px;
}

@media (max-width: 980px) {
  .profile {
    display: none;
  }
  .fresharticles {
    display: none;
  }
  .articles {
    display: block;
    max-width: 680px;
    width: auto;
    margin: 30px auto 0 auto;
  }
}
</style>
