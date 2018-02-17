<template>
  <div>
    <my-nav>
      <my-navsearch class="nav-search"></my-navsearch>
    </my-nav>
    <router-view></router-view>
  </div>
</template>

<script>
// clickoutside指令
import Vue from 'vue'
import myNav from './components/component-nav'
import myNavSearch from './components/component-navSearch'
import myFooter from './components/component-footer'

Vue.component('my-nav', myNav)
Vue.component('my-navsearch', myNavSearch)
Vue.component('my-footer', myFooter)

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

@media (max-width: 980px) {
  .nav-search {
    margin-right: 30px;
  }
}
</style>
