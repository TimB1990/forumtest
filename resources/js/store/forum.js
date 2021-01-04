import axios from 'axios'
export default{
    
    namespaced: true,
    state: {
        forums: null
    },
    getters: {
        forums(state){
            return state.categories
        }
    },

    mutations: {
        SET_FORUMS(state, payload){
            state.categories = payload
        }
    },

    actions: {
        async fetchForums({commit}, parent){
            try{
                const { data } = await axios.get(`api/forums?parent=${parent}`)
                if(!data.length > 0) return
                commit('SET_FORUMS', data)
            }
            catch(error){
                console.log(error.response.data.error)
            }

        }
    }
}