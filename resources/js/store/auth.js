import axios from 'axios'
import { isLoggedIn, logIn, getToken, setToken } from "../utils"

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
        async loadUser({ commit, dispatch}){
            if(isLoggedIn){
                const token = getToken();
            }

        },

        async login({ dispatch }, credentials){
            await axios.get('/sanctum/csrf-cookie');

            const { data } = await axios.post('/auth/login', credentials);

            console.log(data)

            return dispatch('me', data.token);
        },
        
        async logout({ dispatch }, userId){
            console.log(userId);
            await axios.post('/auth/logout', userId);
            return dispatch('me', null);
        },

        async me({ commit }, token){
            if(!token){
                commit('SET_AUTHENTICATED', false)
                commit('SET_USER', null)
                return
            }

            try{
                let { data } = await axios.get('/api/user', { headers: { 'Authorization' : `Bearer ${token}`}})
                data.token = token
                commit('SET_AUTHENTICATED', true)
                commit('SET_USER', data)
            } 
            catch(err){
                console.log(err)
                commit('SET_AUTHENTICATED', false)
                commit('SET_USER', null)
            }
        }
    }
}