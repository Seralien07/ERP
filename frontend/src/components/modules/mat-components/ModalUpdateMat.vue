<template>
   <div class="modal fade" style="margin-top:32px !important;" id="updateMat" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-md rounded-0">
        <div class="modal-content rounded-0">
            <div class="modal-header rounded-0 ag-color-2">
                <h5 class="modal-title " style="margin-left: auto;color:white">Modification materiel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="row">

                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="prenom" class="col-form-label">Serial(SN)</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="serial" name="serial" class="form-control rounded-0" v-model="serial">
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="prenom" class="col-form-label">Type</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="type" name="type" class="form-control rounded-0" v-model="type">
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="mobile" class="col-form-label">Categorie</label>
                            </div>
                            <div class="col-8">
                                <select v-model="category"
                                        class="form-control custom-select">
                                    <option value="">Veuillez choisir la categorie</option>
                                    <option v-for="category in allCategory"
                                                :key="category.id"
                                                :value="category.id">
                                            {{ category.name }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="email-1" class="col-form-label">Model</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="model" name="model" class="form-control rounded-0 " v-model="model">
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="prenom" class="col-form-label">Quantité</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="quantity" name="quantity" class="form-control rounded-0" v-model="quantity">
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="prenom" class="col-form-label">Date d'exploitation</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="date" name="date" class="form-control rounded-0" v-model="date">
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="email-2" class="col-form-label">Commentaire</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="commente" name="commente" class="form-control rounded-0 " v-model="commente">
                            </div>
                        </div>

                    </div>

            </div>
            <div class="modal-footer footer-bg">
                <button type="button" class="btn btn-sm text-nowrap ag-color-4-hover ag-color-4" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" name="addClient" class="btn btn-sm text-nowrap ag-color-10-hover ag-color-10" data-bs-dismiss="modal" @click="updateMat()">Valider</button>
            </div>
        </div>
    </div>
</div>

</template>

<script>
export default {
    name: 'ModalAddMat',
    props:['matDetails','allCategory'],
    data: function () {
        return {
            idMat: '',
            serial: '',
            type: '',
            category: '',
            model: '',
            quantity: '',
            date: '',
            commente: ''
            };
    },
    watch: {
        matDetails () {
            this.initializeInputs();
        }
    },
    methods: {
        updateMat () {
            let params = {
            serial: this.serial,
            type: this.type,
            category: this.category,
            model: this.model,
            quantity: this.quantity,
            date: this.date,
            commente: this.commente
            }
            this.$api.matApi.updateMat(this.idMat,params)
                .then((data) => {
                    this.notifyEvent();
                    this.$emit('get-all-mat');
                }).catch((error) => {
                    this.notifyEvent(false);
                    throw error;
                });
        },
        initializeInputs () {
            console.log("this.matDetails", this.matDetails);
            this.idMat = this.matDetails.id;
            this.serial = this.matDetails.serial;
            this.type = this.matDetails.type;
            this.category = this.matDetails.categoryId;
            this.model = this.matDetails.model;
            this.quantity = this.matDetails.quantity;
            this.date = this.matDetails.date;
            this.commente = this.matDetails.commente;
        },
        notifyEvent(isSuccess = true) {
            if(isSuccess){
                this.$notify('Le materiel a bien été modifié.',{
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