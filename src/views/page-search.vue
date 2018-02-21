<template>
  <div>
    <my-articles :url="url + word + '&pagination='"></my-articles>
  </div>
</template>

<script>
import Bus from '../bus.js'

export default {
  watch: {
    $route () {
      Bus.$emit('search-change', this.url + this.$route.params.word + '&pagination=')
    }
  },
  data () {
    return {
      url: '/php/get/getsearcharticles.php?word=',
      word: ''
    }
  },
  created () {
    this.word = this.$route.params.word
  }
}
</script>
