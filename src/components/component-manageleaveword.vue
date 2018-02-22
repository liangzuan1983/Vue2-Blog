<template>
  <div>
      <div class="container">
        <div class="leave-container" v-for="(item, index) in leaveWords" :key="index" v-if="leaveWords.length">
            <p class="leave-name-date">
              <span class="leave-name">{{item.name}}：</span><br />
              <span class="leave-date">{{item.date}}</span>
            </p>
            <p class="leave-content">
              {{item.content}}
            </p>
            <button class="leave-del">删除</button>
        </div>
      </div>
  </div>
</template>

<script>
export default {
  props: {
    gUrl: {
      type: String,
      default: ''
    },
    sUrl: {
      type: String,
      default: ''
    }
  },
  data () {
    return {
      leaveWords: [
        {
          name: 'yj',
          date: '2018-2-22',
          content: 'wtt, i love you.sdfsfdsdfsdfdfsdfsdfsdfdsfsdfddddddddddddd'
        },
        {
          name: 'wtt',
          date: '2018-2-22',
          content: 'e.sfddddddddddddddddddddddddddddddddddddddddddddddddddddddddd'
        }
      ]
    }
  }
}
</script>

<style scoped>
.container {
  max-width: 980px;
  width: 100%;
  position: absolute;
  top: 85px;
  left: 50%;
  transform: translateX(-50%);
  background: #fff;
  border: 1px solid #ccc;
  border-top: none;
}
.leave-container .leave-name-date {
  margin-top: 50px;
  background: #ddd;
  padding: 5px 0;
  border: 1px solid #ccc;
  box-shadow: 1px 1px 7px #ccc;
}
.leave-container * {
  word-wrap:break-word;
  word-break:break-all;
}
.leave-container .leave-name-date .leave-name {
  font-weight: bold;
  color: #666;
}
.leave-container .leave-name-date .leave-date {
  color: #888;
  font-size: 0.8em;
}
.leave-container .leave-content {
  text-indent: 2em;
}
.leave-container .leave-del {
    width: 50px;
    height: 30px;
    border-radius: 5px;
    border: 1px #ccc solid;
    outline: none;
    background: #b00;
    color: #eee;
    float: right;
}
.leave-container .leave-del:hover {
    background: #c00;
    color: #fff;
}
.leave-container .leave-del:active {
    background: #a00;
    color: #ddd;
}
</style>
