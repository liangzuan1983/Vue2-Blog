<template>
  <div>
    <div class="container">
      <a class="footer-icp" href="http://www.miitbeian.gov.cn/" target="_blank">
        <slot></slot>
      </a>
    </div>
  </div>
</template>

<script>
export default {}
</script>

<style scoped>
.container {
    width: 100%;
    text-align: center;
}
.footer-icp {
    text-decoration: none;
    color: #aaa;
    margin: 0;
}
</style>
