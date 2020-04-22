<template>
    <div class="base-demo container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Заголовок</th>
                <th scope="col">Категория</th>
                <th scope="col">Стаус</th>
                <th scope="col">Автор</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(post , index) of posts.data" :key="index">
                <th scope="row">{{ index + 1 }}</th>
                <td>{{ post.title}}</td>
                <td> {{  post.category.name  }}</td>
                <td v-if="post.moderate === 0"> Не опубликован</td>
                <td v-else>опубликован</td>
                <td>{{ post.user.name }}</td>
                <td>
                    <button
                        type="button"
                        class="btn-danger"
                        data-toggle="modal"
                        data-target="#delModal"
                        @click="delPost(post.id)"
                    >
                        Удалить
                    </button>


                    <router-link
                        tag="button"
                        class="btn-primary"
                        :to="{name: 'PostsInfo' , params: { id: post.id}}"
                    >
                        Просмотр
                    </router-link>
                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr class="pagination">
                <pagination :data="posts" @pagination-change-page="getResults"></pagination>
            </tr>
            </tfoot>
        </table>
    </div>
</template>

<script>
    export default {
        name: "PostComponent",

        data() {
            return {}
        },
        computed: {
            posts() {
                return this.$store.getters.getPosts
            }
        },
        methods: {
            getResults(page = 1) {
                this.$store.dispatch('getPosts', page)
            },
            delPost(id) {
                let confirms = confirm('Вы действительно хотите удалить пост?');
                if (confirms) {
                    this.$store.dispatch('delPost' , id)
                }
            }
        },
        created() {
            this.getResults();
        },
    }
</script>

<style scoped>
    .pagination {
        position: absolute;
        top: 350px;
    }

    .base-demo {
        display: flex;
        width: 100%;
        justify-content: center;
        margin-top: 72px;
        margin-left: 264px;
    }

    .container {
        max-width: 1770px !important
    }

    button {
        border: none;
        padding: 5px;
        border-radius: 4px;
    }
</style>
