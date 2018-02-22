<template>
  <div v-cloak>
      <my-writearticle :url="url" :typeList="typeList"></my-writearticle>
  </div>
</template>

<script>
import Vue from 'vue'
import myWritearticle from '../components/component-writearticle'

Vue.component('my-writearticle', myWritearticle)

export default {
  data () {
    return {
      url: '/php/management/writearticle.php',
      typeList: ['', 'html', 'css', 'javascript', 'vue', 'other']
    }
  }
}
</script>
