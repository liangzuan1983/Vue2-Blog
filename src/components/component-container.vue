<template>
  <div v-cloak>
    <div class="container">
      <slot></slot>
    </div>
  </div>
</template>

<script>
export default {}
</script>

<style scoped>
.container {
  max-width: 980px;
  width: auto;
  margin: 0 auto;
  padding: 20px 10px;
  /* border: 1px solid #ccc; */
  position: relative;
  top: 35px;
}
</style>
