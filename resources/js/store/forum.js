import axios from 'axios'

export const forum = {
    
    namespaced: true,
    state: {
        forums: [],
        threads: {}
    },
    getters: {
        forums(state){
            return state.forums
        },

        threads(state){
            return state.threads
        }
    },

    mutations: {
        SET_FORUMS(state, payload){
            state.forums = payload
        },

        SET_THREADS(state,payload){
            state.threads = payload
        },

        CLEAR_FORUMS(state){
            state.forums = null
        },

        CLEAR_THREADS(state){
            state.threads = null
        }
    },

    actions: {
        clearForums({commit}){
            commit('CLEAR_FORUMS')
        },

        clearThreads({commit}){
            commit('CLEAR_THREADS')
        },

        async fetchForums({commit, dispatch }, parentSlug){
            try{

                let url = parentSlug ? `/api/forums?slug=${parentSlug}` : '/api/forums'

                const { data } = await axios.get(url)

                if(!data.length > 0) return

                commit('SET_FORUMS', data)
                
                if(data.length == 1) dispatch('fetchThreads', {
                    forumId: data[0].id,
                    page: 1
                })
                
            }
            catch(error){
                console.log(error.response.data.error)
            }
        },

        async fetchThreads({commit}, {page, forumId}){
            try{

                let threadPage = page && !page==0 ? page : 1

                let url = forumId ? `/api/threads?page=${threadPage}&forum=${forumId}` : `/api/threads/page=${threadPage}`

                const {data} = await axios.get(url)

                commit('SET_THREADS', data)         
            }
            catch(error){
                console.log(error.response.data.error)
            }

        }
    }
}