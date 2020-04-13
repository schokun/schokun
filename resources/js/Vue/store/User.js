export default {
    state: {
        users: {},
        feedBacks: [],
        user: {},
        massage: [],
        massageStatus: []
    },
    actions: {
        users(context , page)  {
            axios.get('/admin/users/?page=' + page)
                .then(response => {
                    context.commit('users' , response.data);
                });
        },
        getUser(context, user_id){
            axios.get('/admin/users/' + user_id)
                .then(response => {
                    context.commit('user' , response.data);
                });
        },
        delUser(context , payload){
            axios.delete('/admin/users/' + payload)
                .then( r => context.commit('users' , r.data))
        },
        changeUser(context , payload){
            axios.put('/admin/users/' + payload.id , {
                body: payload
            })
                .then(
                    r => context.commit('changeUser' , r.data)
                )
        },
        feedBacks(context){
            axios.get('/admin/feedBacks')
                .then( r => context.commit('feedBacks' , r.data))
        },
        createUser(context, payload) {
            axios.post('/admin/users' , {
                body: payload
            })
                .then( r => context.commit('createUser' , r.data))
        }
    },
    mutations: {
        users(state, payload) {
            state.users = payload;
        },
        user(state, payload) {
            state.user = payload;
        },

        feedBacks(state, payload){
            state.feedBacks = payload;
        },
        changeUser(state , payload){
            if(payload.error){
                state.massage = payload.error;
                state.massageStatus = ['error']
            }else {
                state.users = payload;
                state.massageStatus = ['info'];
                state.massage = ['Успешно изменен']
            }
        },
        createUser(state , payload) {
            if(payload.error){
                state.massage = payload.error;
                state.massageStatus = ['error']
            }else {
                state.massageStatus = ['info'];
                state.massage = ['Юзер добавлен!']
            }
        },

        clearErrors(state){
            state.massage = [];
        }

    },
    getters: {
        feedBacks(state) {
            return state.feedBacks
        },
        users(state) {
            return state.users
        },
        user(state) {
            return state.user;
        },
        massage(state){
            return state.massage
        },
        massageStatus(state){
            return state.massageStatus;
        }
    }
}
