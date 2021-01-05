import axios from 'axios'

export const thread = {
    
    namespaced: true,
    state: {
        threads: []
    },

    getters: {
        threads(state){
            return state.threads
        }
    },

    mutations: {
        SET_THREADS(state, payload){
            state.threads = payload
        },

        CLEAR_THREADS(state){
            state.threads = null
        }
    },

    actions: {
        clearThreads({commit}){
            commit('CLEAR_THREADS')
        },

        async fetchThreads({commit}, forumId){
            try{

                let url = null

                if(forumId) {
                    url = `/api/threads?forum=${forumId}`
                }
                else{
                    url = '/api/threads'
                }

                const { data } = await axios.get(url)
                if(!data.length > 0) return
                commit('SET_THREADS', data)
                
            }
            catch(error){
                console.log(error.response.data.error)
            }

        }
    }
}