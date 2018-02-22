<template>
  <div v-cloak>
      <my-manageleaveword :gUrl="gUrl" :sUrl="sUrl"></my-manageleaveword>
  </div>
</template>

<script>
import Vue from 'vue'
import myManageleaveword from '../components/component-manageleaveword'

Vue.component('my-manageleaveword', myManageleaveword)

export default {
  data () {
    return {
      gUrl: '/php/management/getleaveword.php',
      sUrl: '/php/management/delleaveword.php'
    }
  }
}
</script>
