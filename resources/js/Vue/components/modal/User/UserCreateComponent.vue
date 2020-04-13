<template>
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Создание</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            aria-describedby="emailHelp"
                            v-model="name"
                        >
                    </div>
                    <div class="form-group">
                        <label for="Email">Емаил</label>
                        <input
                            v-model="email"
                            type="email"
                            class="form-control"
                            id="Email"
                            aria-describedby="emailHelp"
                        >
                    </div>
                    <div class="form-group">
                        <label for="Password1">Пароль</label>
                        <input
                            v-model="password"
                            type="password"
                            class="form-control"
                            id="Password1"
                        >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal" @click="create" >Создать</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "UserCreateComponent",
        data(){
            return {
                name: '',
                email: '',
                password: ''
            }
        },
        computed: {
            massage(){
                return  this.$store.getters.massage;
            },
            massageStatus(){
                return this.$store.getters.massageStatus;
            }
        },
        methods: {
            create(){
                this.$store.dispatch('createUser', {
                    name: this.name , email: this.email, password: this.password
                });
                setTimeout( () => {
                    for( let i = 0; i < this.massage.length; i++) {
                        Vue.$toast.open({
                            message: this.massage[i],
                            type: this.massageStatus[0],
                            position: 'top'
                        });
                    }
                    this.$store.commit('clearErrors');
                }, 500);
            }
        }
    }
</script>

<style scoped>

</style>
