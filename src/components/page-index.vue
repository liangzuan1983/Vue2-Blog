<template>
  <div>
    <my-nav></my-nav>
    <my-articles></my-articles>
  </div>
</template>

<script>
import Vue from 'vue'
import myNav from './component-nav'
import myArticles from './component-articles'

Vue.component('my-nav', myNav)
Vue.component('my-articles', myArticles)

export default {}
</script>
