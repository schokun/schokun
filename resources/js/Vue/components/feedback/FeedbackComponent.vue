<template>
    <div class="base-demo container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Е-маил</th>
                <th scope="col">Дата сообщения</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item , index) of feedBacks" :key="index" :class="{ newItem: item.new }">
                <th scope="row">{{ index + 1}}</th>
                <td>{{ item.email}}</td>
                <td>{{ item.created_at}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "FeedbackComponent",
        computed: {
            feedBacks() {
                return this.$store.getters.feedBacks
            },
        },
        created() {
            this.$store.dispatch('feedBacks');
        }
    }
</script>

<style scoped>
    .base-demo {
        display: flex;
        width: 100%;
        justify-content: center;
        margin-top: 32px;
        margin-left: 264px;

    }
    .container {
        max-width: 1770px!important
    }
    .newItem {
        background: cornsilk;
    }
</style>
