<template>
    <div class="base-demo container">
        <h3>Категории</h3>
        <div class="form-group d-flex" v-for="(category , index) of categories">
            <input
                type="text"
                v-model="category.name"
                @change="changeCategories(category.id , category.name )"
                class="form-control w-25"
            >
            <button class="btn-danger" @click="delCategory(category.id , index)">Удалить категорию</button>
        </div>

        <div class="form-group d-flex">
            <input v-if="addCategory"
                   type="text"
                   class="form-control w-25"
                   v-model="newCategory"
                   @change="StoreCategory"
            >
        </div>
        <button type="submit" @click="addCategory = !addCategory" class="btn btn-primary">Создать категорию</button>
    </div>
</template>

<script>
    export default {
        name: "CategoriesComponent",
        data() {
            return {
                newCategory: '',
                addCategory: false
            }
        },
        computed: {
            categories() {
                return this.$store.getters.getCategories
            }
        },
        methods: {
            changeCategories(id, name) {
                this.$store.dispatch('changeCategories', {
                    id: id,
                    'name': name
                });
                Vue.$toast.open({
                    message: 'Изменен',
                    type: 'success',
                    position: 'top'
                });
            },
            delCategory($id, index) {
                if (this.categories[index].posts.length === 0) {
                    this.$store.dispatch('delCategory', $id);
                } else {
                    let check = confirm('Удалить категорию? В данной категории' + this.categories[index].posts.length + ' Пост');
                    if (check) {
                        this.$store.dispatch('delCategory', $id);
                    }
                }

            },
            StoreCategory() {
                this.$store.dispatch('addCategory', this.newCategory);
                this.addCategory = !this.addCategory;
                this.newCategory = '';

                Vue.$toast.open({
                    message: 'Категори добавлена',
                    type: 'success',
                    position: 'top'
                });

            }
        },
        created() {
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

    .btn-danger {
        padding: 7px;
        margin-left: 5px;
        border-radius: 5px;
    }

</style>
