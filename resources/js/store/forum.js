import axios from 'axios'

export const forum = {
    
    namespaced: true,
    state: {
        forums: [],
        threads: {},
        posts: []
    },
    getters: {
        forums(state){
            return state.forums
        },

        threads(state){
            return state.threads
        },

        posts(state){
            return state.posts
        }
    },

    mutations: {
        SET_FORUMS(state, payload){
            state.forums = payload
        },

        SET_THREADS(state,payload){
            state.threads = payload
        },

        SET_POSTS(state,payload){
            state.posts = payload
        },

        CLEAR_FORUMS(state){
            state.forums = null
        },

        CLEAR_THREADS(state){
            state.threads = null
        },

        CLEAR_POSTS(state){
            state.posts = null
        }
    },

    actions: {
        clearForums({commit}){
            commit('CLEAR_FORUMS')
        },

        clearThreads({commit}){
            commit('CLEAR_THREADS')
        },

        clearPosts({commit}){
            commit('CLEAR_POSTS')
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

        },

        async fetchPosts({commit}, {page, threadSlug}){
            try{
                let postPage = page && !page==0 ? page: 1
                let url = threadSlug ? `/api/posts?page=${postPage}&topic=${threadSlug}` : '/api/posts'

                const { data } = await axios.get(url)

                if(!data.length > 0) return

                commit('SET_POSTS', data)
            }
            catch(error){
                console.log(error.response.data.error)
            }
        }
    }
}