<template>
    <!-- Modal -->

    <div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Удаление</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Действительно удалить пользователя?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-danger"  data-dismiss="modal"  @click="delUser">Удалить</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "DeleteComponent",
        props: ['id'],
        computed: {
            user_id(){
                return this.id
            }
        },
        methods: {
            delUser(){
                this.$store.dispatch('delUser' , this.user_id);
                Vue.$toast.open({
                    message: 'Успешно Удален!',
                    type: 'success',
                    position: 'top'
                });
            }
        }

    }
</script>

<style>

</style>
