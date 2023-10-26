<template>
   <div class="modal fade" style="margin-top:32px !important;" id="newMatSort" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-md rounded-0">
        <div class="modal-content rounded-0">
            <div class="modal-header rounded-0 ag-color-2">
                <h5 class="modal-title " style="margin-left: auto;color:white">Nouveau materiel sortant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="row">
                        
                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="prenom" class="col-form-label">Nom</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="nameMater" name="nameMater" class="form-control rounded-0" v-model="nameMater">
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="prenom" class="col-form-label">Serial</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="serials" name="serials" class="form-control rounded-0" v-model="serials">
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="phone" class="col-form-label">Type</label>
                            </div>
                            <div class="col-8">
                                <select v-model="mat"
                                        class="form-control custom-select">
                                    <option value="">Veuillez choisir le type</option>
                                    <option  v-for="mat in allMat"
                                                :key="mat.id"
                                                :value="mat.id">
                                                {{ mat.type }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="prenom" class="col-form-label">Quantité Sortant</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="quantity_sort" name="quantity_sort" class="form-control rounded-0" v-model="quantity_sort">
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

                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="email-1" class="col-form-label">Commentaire</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="comments" name="comments" class="form-control rounded-0 " v-model="comments">
                            </div>
                        </div>

                    </div>

            </div>
            <div class="modal-footer footer-bg">
                <button type="button" class="btn btn-sm text-nowrap ag-color-4-hover ag-color-4" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" name="addClient" class="btn btn-sm text-nowrap ag-color-10-hover ag-color-10" data-bs-dismiss="modal" @click="addNewMatSort()">Enregistrer</button>
            </div>
        </div>
    </div>
</div>

</template>

<script>
export default {
  props: {
  },
    name: 'ModalAddMatSort',
    props:['allStaff','allMat'],
    data: function () {
    return {
        nameMater: '',
        serials: '',
        mat: '',
        quantity_sort: '',
        staff: '',
        comments: ''
    };
  },
  methods: {
    addNewMatSort () {
        let params = {
           
            nameMater: this.nameMater,
            serials: this.serials,
            quantity_sort: this.quantity_sort,
            comments: this.comments,
            staffId: this.staff,
            matId: this.mat
           
        }
        this.$api.matSortApi.creatMatSort(params)
            .then((data) => {
                this.notifyEvent();
                this.$emit('get-all-matSort');
            }).catch((error) => {
                this.notifyEvent(false);
                throw error;
            });
    },
    notifyEvent(isSuccess = true) {
        if(isSuccess){
            this.$notify('Le nouvel materiel sortant a bien été créé.',{
                    type: 'success',
                    showIcon: 'true',
                    hideProgressBar: 'false',
                })
        } else {
            this.$notify('Une erreur s\'est produite lors de l\'enregistrement.',{
                    type: 'danger',
                    showIcon: 'true',
                    hideProgressBar: 'false',
                });
        }
    }
  },
}
</script>