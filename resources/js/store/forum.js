import axios from 'axios'

export const forum = {
    
    namespaced: true,
    state: {
        forums: []
    },
    getters: {
        forums(state){
            return state.forums
        }
    },

    mutations: {
        SET_FORUMS(state, payload){
            state.forums = payload
        },

        CLEAR_FORUMS(state){
            state.forums = null
        }
    },

    actions: {
        clearForums({commit}){
            commit('CLEAR_FORUMS')
        },

        async fetchForums({commit}, parentSlug){
            try{

                let url = null

                if(parentSlug) {
                    url = `/api/forums?slug=${parentSlug}`
                }
                else{
                    url = '/api/forums'
                }

                const { data } = await axios.get(url)
                if(!data.length > 0) return
                commit('SET_FORUMS', data)
                
            }
            catch(error){
                console.log(error.response.data.error)
            }

        }
    }
}