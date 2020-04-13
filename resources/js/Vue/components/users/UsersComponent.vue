<template>
    <div class="base-demo container">
        <CreateUser></CreateUser>
        <ModalDel :id="user_id"></ModalDel>
        <ModalEdit :id = "user_id"> </ModalEdit>
        <button
            type="button"
            class="btn-success add_user btn"
            data-toggle="modal"
            data-target="#createModal"
        >
            Создать
        </button>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Е-маил</th>
                <th scope="col">Дата регистрации</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(user , index) of users.data" :key="index">
                <th scope="row">{{ index + 1 }}</th>
                <td>{{ user.name}}</td>
                <td>{{ user.email}}</td>
                <td>{{ user.created_at}}</td>
                <td>
                    <button
                        type="button"
                        class="btn-danger"
                        data-toggle="modal"
                        data-target="#delModal"
                        @click="getUserId(user.id)"
                    >
                        Удалить
                    </button>


                    <button
                        type="button"
                        class="btn-primary"
                        data-toggle="modal"
                        data-target="#editModal"
                        @click="getUserId(user.id)"
                    >
                        Редактировать
                    </button>
                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr class="pagination">
                <pagination :data="users" @pagination-change-page="getResults"></pagination>
            </tr>
            </tfoot>
        </table>
    </div>
</template>

<script>
    import VueTableDynamic from 'vue-table-dynamic'
    import ModalDel from '../modal/User/DeleteComponent'
    import ModalEdit from '../modal/User/EditComponent'
    import CreateUser from '../modal/User/UserCreateComponent'

    export default {
        name: "UsersComponent",
        components: {VueTableDynamic, ModalDel , ModalEdit, CreateUser},
        data() {
            return {
                user_id: 0,
            }
        },
        computed: {
            users(){
                return this.$store.getters.users
            }
        },
        methods: {
            getUserId(id) {
                this.user_id = id;
            },
            getResults(page = 1) {
              this.$store.dispatch('users' , page)
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
        top: 209px;
    }
    .add_user{
        position: absolute;
        left: 280px;
        top: 22px;
    }

    .base-demo {
        display: flex;
        width: 100%;
        justify-content: center;
        margin-top: 72px;
        margin-left: 264px;
    }
    .container {
        max-width: 1770px!important
    }
    button {
        border: none;
        padding: 5px;
        border-radius: 4px;
    }
</style>
