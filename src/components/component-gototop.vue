<template>
  <div>
      <button class="gototop-button" @click="gotoTop"></button>
  </div>
</template>

<script>
import Bus from '../bus.js'

export default {
  data () {
    return {
      timer: null
    }
  },
  methods: {
    // 移动端解决方案
    mobGototop () {
      if (document.body.scrollTop > 0) {
        document.body.scrollTop -= 50
      } else {
        clearInterval(this.timer)
      }
    },
    // pc端
    pcGototop () {
      if (document.documentElement.scrollTop > 0) {
        document.documentElement.scrollTop -= 25
      } else {
        clearInterval(this.timer)
      }
    },
    gotoTop () {
      let _this = this
      clearInterval(_this.timer)
      _this.timer = setInterval(function () {
        if (document.body.scrollTop) {
          _this.mobGototop()
        } else {
          _this.pcGototop()
        }
      }, 5)
    }
  },
  mounted () {
    let _this = this
    Bus.$on('scroll-gototop', function () {
      _this.gotoTop()
    })
  }
}
</script>

<style scoped>
.gototop-button {
    width: 64px;
    height: 64px;
    background: url('../assets/gototop.svg');
    border-radius: 10px;
    position: fixed;
    bottom: 80px;
    right: 100px;
    outline: none;
    border: none;
    box-shadow: 0 1px 7px #ccc;
}
.gototop-button:hover {
    box-shadow: 0 1px 10px 1px #ccc;
}
.gototop-button:active {
    box-shadow: none;
}

@media (max-width: 980px) {
    .gototop-button {
        bottom: 10px;
        right: 20px;
    }
}
</style>
