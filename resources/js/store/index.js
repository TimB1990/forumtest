import { createStore } from 'vuex'
import auth from './auth'
import forum from './forum'

export default new createStore({
    modules: {
        auth,
        forum
    }
})