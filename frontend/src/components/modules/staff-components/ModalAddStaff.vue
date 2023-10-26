<template>
   <div class="modal fade" style="margin-top:32px !important;" id="newStaff" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-md rounded-0">
        <div class="modal-content rounded-0">
            <div class="modal-header rounded-0 ag-color-2">
                <h5 class="modal-title " style="margin-left: auto;color:white">Nouveau personnel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="row">
                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="icpe" class="col-form-label">Nom</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="nom" name="nom" class="form-control rounded-0" v-model="lastName">
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="prenom" class="col-form-label">Prenom</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="prenom" name="prenom" class="form-control rounded-0" v-model="firstName">
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="email-1" class="col-form-label">Email</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="email-1" name="email-1" class="form-control rounded-0 " v-model="email">
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="email-2" class="col-form-label">Post</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="post" name="post" class="form-control rounded-0 " v-model="post">
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="phone" class="col-form-label">Departement</label>
                            </div>
                            <div class="col-8">
                                <select v-model="department"
                                        class="form-control custom-select">
                                    <option value="">Veuillez choisir la departement</option>
                                    <option  v-for="department in allDepartment"
                                                :key="department.id"
                                                :value="department.id">
                                            {{ department.name }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="mobile" class="col-form-label">Compagny</label>
                            </div>
                            <div class="col-8">
                                <select v-model="compagny"
                                        class="form-control custom-select">
                                    <option value="">Veuillez choisir la compagnie</option>
                                    <option v-for="compagny in allCompagny"
                                                :key="compagny.id"
                                                :value="compagny.id">
                                            {{ compagny.name }}
                                    </option>
                                </select>
                            </div>
                        </div>

                    </div>

            </div>
            <div class="modal-footer footer-bg">
                <button type="button" class="btn btn-sm text-nowrap ag-color-4-hover ag-color-4" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" name="addClient" class="btn btn-sm text-nowrap ag-color-10-hover ag-color-10" data-bs-dismiss="modal" @click="addNewStaff()">Enregistrer</button>
            </div>
        </div>
    </div>
</div>

</template>

<script>
export default {
  props: {
  },
    name: 'ModalAddStaff',
    props:['allDepartment','allCompagny'],
    data: function () {
    return {
        lastName: '',
        firstName: '',
        email: '',
        post: '',
        department: '',
        compagny: ''
    };
  },
  methods: {
    addNewStaff () {
        let params = {
            lastName: this.lastName,
            firstName: this.firstName,
            email: this.email,
            post: this.post,
            department: this.department,
            compagny: this.compagny
        }
        this.$api.staffApi.creatStaff(params)
            .then((data) => {
                this.notifyEvent();
                this.$emit('get-all-staff');
            }).catch((error) => {
                this.notifyEvent(false);
                throw error;
            });
    },
    notifyEvent(isSuccess = true) {
        if(isSuccess){
            this.$notify('Le nouvel personnel a bien été créé.',{
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