import { createStore } from 'vuex'
import auth from './auth'
import { forum } from './forum'
import { thread } from './thread'

export default new createStore({
    modules: {
        auth,
        forum,
        thread
    },
})