<template>
    <div class="container base-demo">
        <div class="form-group">
            <label for="title"> Заголовок</label>
            <input type="text" class="form-control" id="title" v-model="title">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Категория</label>
            <select class="form-control" id="exampleFormControlSelect1" v-model="category">
                <option v-for="(category, index) of categories">
                    {{category.name}}
                </option>
            </select>
        </div>
        <div class="form-group">
            <label for="user">Пользователю</label>
            <select class="form-control" id="user" v-model="user">
                <option v-for="(user, index) of users">
                    {{user.name}}
                </option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Текст</label>
            <textarea v-model="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button class="btn btn-success">Создать</button>
    </div>
</template>

<script>
    export default {
        name: "CreatePostComponent",
        data() {
            return {
                title: '',
                category: 'php',
                text: '',
                user: ''
            }
        },
        computed: {
            categories() {
                return this.$store.getters.getCategories;
            },
            users() {
                return this.$store.getters.postUsers;
            }
        },
        created() {
            this.$store.dispatch('getCategories');
            this.$store.dispatch('postUsers');
        },
    }
</script>

<style scoped>

    .base-demo {
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
