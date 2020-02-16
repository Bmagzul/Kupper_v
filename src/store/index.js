import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from 'vuex-persistedstate'

Vue.use(Vuex)

export default new Vuex.Store({
	state: {
		token: "",
		usuario: {}
	},
	getters: {
	},
	mutations: {
		setUsuario (state, n_user) {
			state.usuario = n_user;
			console.log(n_user)
		},	

		setToken (state, n_token) {
			state.token = n_token;
			console.log(n_token)
		}
	},
	actions: {
	},
	modules: {
	},
	plugins: [createPersistedState()]
})
