import axios from 'axios'

export default {
    namespaced: true,

    state: {
        authenticated: false,
        user: null
    },

    getters: {

        authenticated(state){
            return state.authenticated
        },

        user(state){
            return state.user
        }
    },

    mutations: {
        SET_AUTHENTICATED(state, value){
            state.authenticated = value
        },

        SET_USER(state, value){
            state.user = value
        }
    },

    actions: {
        // { dispatch } is calling other action - { commit } is calling mutator
        async login({ dispatch }, credentials){
            await axios.get('/sanctum/csrf-cookie');
            await axios.post('/auth/login', credentials);

            return dispatch('me');
        },
        
        async logout({ dispatch }){
            await axios.post('/auth/logout');
            return dispatch('me');
        },

        async me({ commit }){
            try{
                let response = await axios.get('/api/user')
                commit('SET_AUTHENTICATED', true)
                commit('SET_USER', response.data)
            } 
            catch(err){
                console.log(err)
                commit('SET_AUTHENTICATED', false)
                commit('SET_USER', null)
            }
        }
    }
}