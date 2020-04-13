import Vue from 'vue'
import Vuex from 'vuex'
import User from './User'
import Post from './Post'

Vue.use(Vuex);

export default new Vuex.Store({
    modules:{User , Post }
})
