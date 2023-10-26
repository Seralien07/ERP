<template>
   <div class="modal fade" style="margin-top:15% !important;" id="confirmDelete" tabindex="-1" aria-labelledby="confirm" aria-hidden="true">
    <div class="modal-dialog modal-md rounded-0">
        <div class="modal-content rounded-0">
            <div class="modal-header" style="background-color: #f44336;color:white;opacity: 0.9;">
                <h5 class="modal-title " style="margin-left: auto;color:white">Confirmation !</h5> 
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                <div class="inline"></div>
                    <div class="inlineBlock">
                        <div class="line">Voulez vous vraiment suprimer la</div>
                        <div class="line" id="client-name-to-delete" style="font-weight: bold">{{simLine}}</div><span class="fs-15"></span>
                        <div class="line"> de l'utilisatreur </div>
                        <div class="line" id="client-name-to-delete" style="font-weight: bold">{{simUsername}}</div><span class="fs-15"> ?</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer footer-bg">
                <button type="button" class="btn btn-sm text-nowrap hover-btn ag-color-4-hover ag-color-4" data-bs-dismiss="modal">Annuler</button>
                <button type="text" name="delete-client" class="btn btn-sm text-nowrap ag-color-12-hover ag-color-12" data-bs-dismiss="modal" @click="deleteSim()" >Suprimer</button>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name: 'ModalAddSim',
    props:['simId','simLine','simUsername'],
    data: function () {
        return {
            idSim: '',
        };
    },
    methods: {
        deleteSim () {
            this.$api.simApi.deleteSim(this.simId)
                .then((data) => {
                    this.notifyEvent();
                    this.$emit('get-all-sim');
                }).catch((error) => {
                    this.notifyEvent(false);
                    throw error;
                });
        },
        notifyEvent(isSuccess = true) {
            if(isSuccess){
                this.$notify('La Ligne a bien été supprimer.',{
                        type: 'success',
                        showIcon: 'true',
                        hideProgressBar: 'false',
                    })
            } else {
                this.$notify('Une erreur s\'est produite lors de suppression.',{
                        type: 'danger',
                        showIcon: 'true',
                        hideProgressBar: 'false',
                    });
            }
        }
    }
}
</script>