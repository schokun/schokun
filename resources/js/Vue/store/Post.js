export default {
    state: {
        posts: {},
        categories: [],
        postInfo: {}
    },
    actions: {
        getPosts(cnt, page) {
            axios.get('/admin/posts/?page=' + page)
                .then(r => cnt.commit('getPosts', r.data))
        },
        getCategories(cnt) {
            axios.get('/admin/category')
                .then(r => cnt.commit('getCategories', r.data))
        },

        postInfo(cnt, payload) {
            axios.get('/admin/posts/' + payload)
                .then(r => cnt.commit('postInfo', r.data))
        },

        changePost(cnt, payload) {
            axios.put('/admin/posts/' + payload.id, {
                body: payload
            })
                .then(r => cnt.commit('postInfo', r.data))
        },

        delPost(cnt, payload) {
            axios.delete('/admin/posts/' + payload)
                .then(r => cnt.commit('getPosts', r.data))
        },

        changeCategories(cnt, payload) {
            axios.put('/admin/category/' + payload.id, {
                body: payload.name
            })
        },
        addCategory(cnt, payload) {
            axios.post('/admin/category', {
                body: payload
            })
                .then(r => cnt.commit('getCategories', r.data))
        },
        delCategory(cnt, payload) {
            axios.delete('/admin/category/' + payload)
                .then(r => cnt.commit('getCategories', r.data))
        }
    },

    mutations: {
        getPosts(state, payload) {
            state.posts = payload
        },
        getCategories(state, payload) {
            state.categories = payload
        },
        postInfo(state, payload) {
            state.postInfo = payload
        }
    },

    getters: {
        getPosts(state) {
            return state.posts
        },
        getCategories(state) {
            return state.categories
        },
        postInfo(state) {
            return state.postInfo
        }
    }

}
