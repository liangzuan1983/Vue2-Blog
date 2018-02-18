<template>
  <div>
    <my-nav>
      <my-navsearch class="nav-search"></my-navsearch>
    </my-nav>
    <my-container>
      <router-view class="articles"></router-view>
      <my-profile class="profile"></my-profile>
      <my-fresharticles class="fresharticles"></my-fresharticles>
    </my-container>
  </div>
</template>

<script>
// clickoutside指令
import Vue from 'vue'
import myNav from './components/component-nav'
import myNavSearch from './components/component-navSearch'
import myContainer from './components/component-container'
import myArticles from './components/component-articles'
import myProfile from './components/component-profile'
import myFreshArticle from './components/component-fresharticles'

Vue.component('my-nav', myNav)
Vue.component('my-navsearch', myNavSearch)
Vue.component('my-articles', myArticles)
Vue.component('my-container', myContainer)
Vue.component('my-profile', myProfile)
Vue.component('my-fresharticles', myFreshArticle)

Vue.directive('clickoutside', {
  bind: function (el, binding, vnode) {
    function documentHandler (e) {
      if (el.contains(e.target)) {
        return false
      }
      if (binding.expression) {
        binding.value()
      }
    }
    el.__vueClickOutside__ = documentHandler
    document.addEventListener('click', documentHandler)
  },
  unbind: function (el, binding) {
    document.removeEventListener('click', el.__vueClickOutside__)
    delete el.__vueClickOutside__
  }
})

export default {}
</script>

<style scoped>
.nav-search {
  float: right;
  margin: 2px 8px 0px 0px;
}
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

@media (max-width: 980px) {
  .nav-search {
    margin-right: 30px;
  }
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
