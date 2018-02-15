<template>
  <div>
    <my-nav></my-nav>
    <router-view></router-view>
  </div>
</template>

<script>
import Vue from 'vue'
import myNav from './nav'
Vue.component('my-nav', myNav)

export default {}
</script>
