<template>
    <div class="container base-demo">
        <div class="form-group mb-4">
            <button class="btn btn-success" @click="back">Назад</button>
        </div>
        <div class="form-group">
            <label for="themePost">Тема поста</label>
            <input type="text" class="form-control" v-model="post.title" name="title" id="themePost" placeholder="Тема">
        </div>
        <div class="form-group">
            <label for="category">Выберите категорию</label>
            <select class="form-control" id="category" name="category_id" v-model="post.category_id">
                <option
                    v-for="(category) of categories"
                    :value="category.id"
                >
                    {{ category.name}}
                </option>
            </select>
        </div>
        <div class="form-group">
            <label for="body_post">Содержимое поста</label>
            <textarea name="text" class="form-control" id="body_post" v-model="post.text" rows="3"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-success" @click="changePost">Редактировать</button>
            <button
                class="btn btn-success"
                @click="changePost(0)"
                v-if="post.moderate === 1"
            >
                Снять с публикации
            </button>
            <button
                class="btn btn-success"
                @click="changePost(1)"
                v-else
            >
                Опубликовать
            </button>
        </div>
    </div>

</template>

<script>
    export default {
        name: "PostInfoComponent",
        data() {
            return {
                postId: this.$route.params.id,
                category_id: '',
            }
        },
        computed: {
            post() {
                return this.$store.getters.postInfo
            },
            categories() {
                return this.$store.getters.getCategories
            }
        },
        methods: {
            back() {
                this.$router.push({name: 'post'})
            },
            changePost(moderate = this.post.moderate) {
                this.$store.dispatch('changePost', {
                    'id': this.postId,
                    'title': this.post.title,
                    'text': this.post.text,
                    'category_id': this.post.category_id,
                    'moderate': moderate
                });
                this.change =  !this.change;

                Vue.$toast.open({
                    message: 'Изменен',
                    type: 'success',
                    position: 'top'
                });
            },
        },
        watch: {
            $route(to) {
                this.postId = to.params['id']
            }
        },
        created() {
            this.$store.dispatch('postInfo', this.postId);
            this.$store.dispatch('getCategories')
        }
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

</style>
