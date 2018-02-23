<template>
  <div v-cloak>
      <my-managearticle :gUrl="gUrl" :sUrl="sUrl"></my-managearticle>
  </div>
</template>

<script>
import Vue from 'vue'
import myManagearticle from '../components/component-managearticle'

Vue.component('my-managearticle', myManagearticle)

export default {
  data () {
    return {
      gUrl: '/php/management/getarticlelist.php',
      sUrl: '/php/management/delarticle.php?title='
    }
  }
}
</script>
