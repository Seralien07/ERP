<template>
   <div class="modal fade" style="margin-top:32px !important;" id="updateSim" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-md rounded-0">
        <div class="modal-content rounded-0">
            <div class="modal-header rounded-0 ag-color-2">
                <h5 class="modal-title " style="margin-left: auto;color:white">Modification cart SIM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="row">
                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="phone" class="col-form-label">Operateur</label>
                            </div>
                            <div class="col-8">
                                <select v-model="operateur"
                                        class="form-control custom-select">
                                    <option value="">Veuillez choisir l'operateur</option>
                                    <option  v-for="operateur in allOperateur"
                                                :key="operateur.id"
                                                :value="operateur.id">
                                            {{ operateur.name }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="icpe" class="col-form-label">Ligne</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="line" name="line" class="form-control rounded-0" v-model="line">
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="prenom" class="col-form-label">Numero SIM</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="number_sim" name="number_sim" class="form-control rounded-0" v-model="number_sim">
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="phone" class="col-form-label">Utilisateur</label>
                            </div>
                            <div class="col-8">
                                <select v-model="staff"
                                        class="form-control custom-select">
                                    <option value="">Veuillez choisir l'utilisateur</option>
                                    <option  v-for="staff in allStaff"
                                                :key="staff.id"
                                                :value="staff.id">
                                                {{ staff.fullname }}
                                    </option>
                                </select>
                            </div>
                        </div>

                    </div>

            </div>
            <div class="modal-footer footer-bg">
                <button type="button" class="btn btn-sm text-nowrap ag-color-4-hover ag-color-4" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" name="addClient" class="btn btn-sm text-nowrap ag-color-10-hover ag-color-10" data-bs-dismiss="modal" @click="updateSim()">Valider</button>
            </div>
        </div>
    </div>
</div>

</template>

<script>
export default {
    name: 'ModalAddSim',
    props:['simDetails','allOperateur','allStaff'],
    data: function () {
        return {
            idSim: '',
            operateur: '',
            line: '',
            number_sim: '',
            staff: ''
        };
    },
    watch: {
        simDetails () {
            this.initializeInputs();
        }
    },
    methods: {
        updateSim () {
            let params = {
                operatorId: this.operateur,
                line: this.line,
                number_sim: this.number_sim,
                staffId: this.staff
            }
            this.$api.simApi.updateSim(this.idSim,params)
                .then((data) => {
                    this.notifyEvent();
                    this.$emit('get-all-sim');
                }).catch((error) => {
                    this.notifyEvent(false);
                    throw error;
                });
        },
        initializeInputs () {
            this.idSim = this.simDetails.id;
            this.operateur = this.simDetails.idOperator;
            this.line = this.simDetails.line;
            this.number_sim = this.simDetails.number_sim;
            this.staff = this.simDetails.idStaff;
        },
        notifyEvent(isSuccess = true) {
            if(isSuccess){
                this.$notify('Le cart sim a bien été modifié.',{
                        type: 'success',
                        showIcon: 'true',
                        hideProgressBar: 'false',
                    })
            } else {
                this.$notify('Une erreur s\'est produite lors de modification.',{
                        type: 'danger',
                        showIcon: 'true',
                        hideProgressBar: 'false',
                    });
            }
        }
    },    
}
</script>