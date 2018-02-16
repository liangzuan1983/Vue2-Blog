<template>
  <div>
    <my-nav></my-nav>
    <my-container>
      <my-articles class="articles"></my-articles>
      <my-profile class="profile"></my-profile>
    </my-container>
  </div>
</template>

<script>
import Vue from 'vue'
import myNav from '../components/component-nav'
import myContainer from '../components/component-container'
import myArticles from '../components/component-articles'
import myProfile from '../components/component-profile'

Vue.component('my-nav', myNav)
Vue.component('my-articles', myArticles)
Vue.component('my-container', myContainer)
Vue.component('my-profile', myProfile)

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
}
@media (max-width: 980px) {
  .profile {
    display: none;
  }
  .articles {
    display: block;
    max-width: 680px;
    margin: 30px auto 0 auto;
  }
}
</style>
