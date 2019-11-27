import Vue from 'vue'
import App from './App.vue'
import { VueReCaptcha } from 'vue-recaptcha-v3'

Vue.use(VueReCaptcha, { siteKey: '6Ldn5sQUAAAAAGXBc2YuLVCO4-Px3DtQEMZvAuWX' })

Vue.config.productionTip = false

new Vue({
  render: h => h(App),
}).$mount('#app')
