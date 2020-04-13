export default {
    state: {
        posts: {},
        categories: [],
        postUsers: []
    },
    actions: {
        getPosts(cnt , page){
            axios.get('/admin/posts/?page=' + page)
                .then(  r => cnt.commit('getPosts' , r.data))
        },
        getCategories(cnt) {
            axios.get('/admin/category')
                .then( r => cnt.commit('getCategories' , r.data))
        },
        postUsers(cnt) {
            axios.get('/admin/posts/users')
                .then( r => cnt.commit('postUsers' , r.data))
        }
    },

    mutations: {
        getPosts(state , payload){
            state.posts = payload
        },
        getCategories(state , payload){
            state.categories = payload
        },
        postUsers(state , payload) {
            state.postUsers = payload
        }
    },

    getters: {
        getPosts(state) {
            return state.posts
        },
        getCategories(state) {
            return state.categories
        },
        postUsers(state) {
            return state.postUsers
        }
    }

}
