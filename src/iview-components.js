import Vue from 'vue'
import {Progress} from 'iview'

const IviewComponents = {Progress}

for (let key in IviewComponents) {
  Vue.component(key, IviewComponents[key])
}
