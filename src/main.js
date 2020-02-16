import Vue from 'vue'
import App from './App.vue'
import store from './store'
import router from './router'
import axios from 'axios'
import VueToastr from 'vue-toastr'

console.log(VueToastr);
Vue.use(VueToastr);
Vue.use(axios);

Vue.prototype.$http = axios.create({
  baseURL: 'http://localhost/kupper/api/'
});
Vue.prototype.apiUrl = function(url='') {
	return `http://localhost/kupper/api/${url}`
}

Vue.prototype.Notificar = function(titulo,mensaje,tipo) {
	if (tipo == 1) {
		this.$toastr.s(mensaje, titulo);

	} else if (tipo == 2) {
		this.$toastr.w(mensaje, titulo);

	} else if (tipo == 3) {
		this.$toastr.i(mensaje, titulo);

	} else {
		this.$toastr.e(mensaje, titulo);

	}
}

Vue.config.productionTip = false

new Vue({
  store,
  router,
  render: h => h(App)
}).$mount('#app')
