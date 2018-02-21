<template>
  <div>
    <my-articles :url="url"></my-articles>
  </div>
</template>

<script>

export default {
  data () {
    return {
      url: '/php/get/gettypearticles.php?type=vue&pagination='
    }
  }
}
</script>
