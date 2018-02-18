<template>
  <div>
    <my-articles></my-articles>
    <my-footer class="footer">
      浙ICP备18006943号
    </my-footer>
  </div>
</template>

<script>
import Vue from 'vue'
import myFooter from '../components/component-footer'
Vue.component('my-footer', myFooter)

export default {}
</script>

<style scoped>
.footer {
  position: relative;
  top: 20px;
}
</style>
