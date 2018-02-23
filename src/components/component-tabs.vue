<template>
  <div v-cloak>
      <div class="tabs-container">
        <router-link class="tab-button" v-for="(item, index) in tabList"
        :key="index" @click="pushRouter(index)"
        :to="{name: item.router}">{{item.text}}</router-link>
      </div>
  </div>
</template>

<script>
export default {
  props: {
    tabList: {
      type: Array,
      default: function () {
        return []
      }
    }
  }
}
</script>

<style scoped>
.tabs-container {
  background: #495060;
  width: 267px;
  height: 50px;
}
.tabs-container .tab-button {
  display: block;
  float: right;
  width: 89px;
  height: 50px;
  line-height: 50px;
  font-size: 20px;
  font-weight: bold;
  color: #c6c8cd;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
}
.tabs-container .tab-button:hover {
  background: #666e80;
  color: #fff;
}
.tabs-container .router-link-active {
  background: #fff;
  color: #666;
}

</style>
