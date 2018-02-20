<template>
  <div>
    <my-articles :url="url"></my-articles>
  </div>
</template>

<script>

export default {
  data () {
    return {
      url: '/gettypearticles.php?type=other&pagination='
    }
  }
}
</script>
