<template>
  <div>
      <div class="container">
        <input type="text" v-model="value" class="search-input" @blur="inputBlur" />
        <div class="search-button" :style="{background: 'url(' + navSearchBg + ')'}"
                @click="handleClick" @keydown.enter="handleEnter"></div>
        <ul class="search-autocomplete">
            <li v-for="(item, index) in autocompleteList" :key="index" @click="autoInput(index)">
                {{item}}
            </li>
        </ul>
      </div>
  </div>
</template>

<script>
import navSearchBg from '../assets/nav-search.svg'

export default {
  methods: {
    handleClick () {
      this.handleEnter()
    },
    handleEnter () {
      //   执行搜索请求
    },
    autoInput (index) {
      this.value = this.autocompleteList[index]
      this.handleEnter()
    },
    inputBlur () {
      this.autocompleteList = []
    }
  },
  data () {
    return {
      value: '',
      navSearchBg: navSearchBg,
      autocompleteList: ['first', 'second']
    }
  }
}
</script>

<style scoped>
.container {
  background: #eee;
  border-radius: 10px;
  width: 195px;
  height: 35px;
}
.search-input {
  width: 150px;
  height: 22px;
  outline: none;
  border: none;
  padding: 5px;
  float: left;
  border-radius: 10px;
  background: transparent;
}
.search-button {
  width: 35px;
  height: 35px;
  border-radius: 50%;
  float: left;
  background-size: cover;
}
.search-autocomplete {
    background: #fff;
    position: absolute;
    top: 50px;
    border-radius: 10px 10px 5px 5px;
    margin: 0;
    padding: 0;
    width: 195px;
    z-index: -1;
    /* display: none; */
}
.search-autocomplete li {
    list-style: none;
    padding: 0;
    margin: 0;
    text-align: left;
    color: #666;
    border-radius: 5px;
}
.search-autocomplete li:hover {
    color: #fff;
    background: #666;
    cursor: pointer;
}

@media (max-width: 350px) {
  .container {
    display: none;
  }
}
</style>
