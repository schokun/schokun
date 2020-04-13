import VueRouter from 'vue-router';
import users from './components/users/UsersComponent';
import feedback from './components/feedback/FeedbackComponent'
import userCreate from './components/users/UsersComponent'
import post from './components/post/PostComponent'
import Posts from './components/post/PostInfoComponent'
import createPost from './components/post/CreatePostComponent'


export default new VueRouter({
    routes: [
        {
            path: '/Dashboard/users',
            component: users,
            name: 'users'
        },
        {
            path: '/Dashboard/user/create',
            component: userCreate,
            name: 'userCreate'
        },
        {
            path: '/Dashboard/feedback',
            component: feedback,
            name: 'feedback'
        },
        {
            path: '/Dashboard/post',
            component: post,
            name: 'post',
        },
        {
            path: '/Dashboard/post/create',
            component: createPost,
            name: 'createPost'
        },

    ],
    mode: 'history'

})
