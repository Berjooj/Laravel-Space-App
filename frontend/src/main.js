import Vue from 'vue'
import App from './App.vue'
import {BootstrapVue, IconsPlugin, AlertPlugin} from 'bootstrap-vue'
import router from './router/rotas'

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import VueRouter from "vue-router";
import {library} from '@fortawesome/fontawesome-svg-core'
import {faRocket, faUserAlt} from '@fortawesome/free-solid-svg-icons'
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'

library.add(faRocket, faUserAlt)
Vue.component('f-icon', FontAwesomeIcon)

Vue.config.productionTip = false

Vue.use(VueRouter)
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
Vue.use(AlertPlugin)


// Vue.http.options.crossOrigin = true
//Vue.config.productionTip = false

new Vue({
    router,
    render: h => h(App),
}).$mount('#app')
