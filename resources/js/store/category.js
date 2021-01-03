import axios from 'axios'
export default{
    namespaced: true,
    state: {
        categories: null
    },
    getters: {
        categories(state){
            return state.categories
        }
    },

    mutations: {
        SET_CATEGORIES(state, payload){
            state.categories = payload
        }
    },

    actions: {
        async fetchCategories({commit}, parent){
            try{
                const { data } = await axios.get(`api/categories?parent=${parent}`)
                if(!data.length > 0) return
                commit('SET_CATEGORIES', data)
            }
            catch(error){
                console.log(error.response.data.error)
            }

        }
    }
}