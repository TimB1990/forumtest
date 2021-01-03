import { createStore } from 'vuex'
import auth from './auth'
import category from './category'

export default new createStore({
    modules: {
        auth,
        category
    }
})