<template>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Редактирование</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputname">Имя</label>
                        <input

                            v-model="user.name"
                            type="text"
                            class="form-control"
                            id="exampleInputname"
                            aria-describedby="emailHelp"
                        >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Емаил</label>
                        <input
                            type="email"
                            class="form-control"
                            id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            v-model="user.email"
                        >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Пароль</label>
                        <input
                            type="password"
                            class="form-control"
                            id="exampleInputPassword1"
                            v-model="user.password"
                        >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal" @click="changeUser">Редактировать</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "EditComponent",
        props: ['id'],
        data(){
            return {
                name: '',
                email: '',
                password: ''
            }
        },
        computed: {
            user() {
                return this.$store.getters.user
            },
            massage(){
                return  this.$store.getters.massage;
            },
            massageStatus(){
                return this.$store.getters.massageStatus;
            }

        },
        methods: {
            changeUser(){
                this.$store.dispatch('changeUser' , {
                    name: this.user.name,
                    email: this.user.email,
                    password: this.user.password,
                    id: this.id
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
        },
        watch: {
            id(){
                this.$store.dispatch('getUser', this.id);
            },
        },
    }
</script>

<style scoped>

</style>
