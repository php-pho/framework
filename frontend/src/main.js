import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import Antd from 'ant-design-vue'
import 'ant-design-vue/dist/antd.css'
import responsive from 'vue-responsive'

Vue.config.productionTip = false

Vue.use(Antd)
Vue.use(responsive)

router.afterEach((current, after) => {
  store.state.activeMenu.pop()
  store.state.activeMenu.push(current.name)
})

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')