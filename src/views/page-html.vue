<template>
  <div>
    <my-container>
      <my-articles class="articles"></my-articles>
      <my-profile class="profile"></my-profile>
      <my-fresharticles class="fresharticles"></my-fresharticles>
    </my-container>
  </div>
</template>

<script>
export default {}
</script>

<style scoped>
.profile {
  margin-left: 10px;
  margin-top: 30px;
  display: inline-block;
  position: fixed;
}
.articles {
  display: inline-block;
  width: 680px;
}
.fresharticles {
  display: inline-block;
  position: fixed;
  margin-left: 10px;
  margin-top: 380px;
}

@media (max-width: 980px) {
  .profile {
    display: none;
  }
  .fresharticles {
    display: none;
  }
  .articles {
    display: block;
    max-width: 680px;
    width: auto;
    margin: 30px auto 0 auto;
  }
}
</style>
