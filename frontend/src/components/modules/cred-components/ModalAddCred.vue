<template>
   <div class="modal fade" style="margin-top:32px !important;" id="newCred" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-md rounded-0">
        <div class="modal-content rounded-0">
            <div class="modal-header rounded-0 ag-color-2">
                <h5 class="modal-title " style="margin-left: auto;color:white">Nouveau Offre</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="row">
                        
                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="phone" class="col-form-label">Ligne</label>
                            </div>
                            <div class="col-8">
                                <select v-model="sim"
                                        class="form-control custom-select">
                                    <option value="">Veuillez choisir la ligne</option>
                                    <option  v-for="sim in allSim"
                                                :key="sim.id"
                                                :value="sim.id">
                                                {{ sim.line }}
                                    </option>
                                </select>
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
                                <label for="phone" class="col-form-label">Device</label>
                            </div>
                            <div class="col-8">
                                <select v-model="device"
                                        class="form-control custom-select">
                                    <option value="">Veuillez choisir le device</option>
                                    <option  v-for="device in allDevice"
                                                :key="device.id"
                                                :value="device.id">
                                            {{ device.name }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="prenom" class="col-form-label">Data</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="data" name="data" class="form-control rounded-0" v-model="data">
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="email-1" class="col-form-label">Coùt Data</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="price_data" name="price_data" class="form-control rounded-0 " v-model="price_data">
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="phone" class="col-form-label">Voix</label>
                            </div>
                            <div class="col-8">
                                <select v-model="voice"
                                        class="form-control custom-select">
                                    <option value="">Veuillez choisir la voix</option>
                                    <option  v-for="voice in allVoice"
                                                :key="voice.id"
                                                :value="voice.id">
                                            {{ voice.name }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="email-1" class="col-form-label">Coùt Voix</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="price_voice" name="price_voice" class="form-control rounded-0 " v-model="price_voice">
                            </div>
                        </div>
                        
                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="phone" class="col-form-label">Offre</label>
                            </div>
                            <div class="col-8">
                                <select v-model="offer"
                                        class="form-control custom-select">
                                    <option value="">Veuillez choisir l'offre</option>
                                    <option  v-for="offer in allOffer"
                                                :key="offer.id"
                                                :value="offer.id">
                                            {{ offer.name }}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="email-1" class="col-form-label">Coùt Offre</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="price_offer" name="price_offer" class="form-control rounded-0 " v-model="price_offer">
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="email-1" class="col-form-label">Option</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="option" name="option" class="form-control rounded-0 " v-model="option">
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="email-1" class="col-form-label">Coùt Option</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="price_option" name="price_option" class="form-control rounded-0 " v-model="price_option">
                            </div>
                        </div>

                        <div class="row g-3 align-items-center mb-20">
                            <div class="col-4">
                                <label for="email-1" class="col-form-label">Commentaire</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="comment" name="comment" class="form-control rounded-0 " v-model="comment">
                            </div>
                        </div>

                    </div>

            </div>
            <div class="modal-footer footer-bg">
                <button type="button" class="btn btn-sm text-nowrap ag-color-4-hover ag-color-4" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" name="addClient" class="btn btn-sm text-nowrap ag-color-10-hover ag-color-10" data-bs-dismiss="modal" @click="addNewCred()">Enregistrer</button>
            </div>
        </div>
    </div>
</div>

</template>

<script>
export default {
  props: {
  },
    name: 'ModalAddCred',
    props:['allDevice','allVoice','allOffer','allStaff','allSim'],
    data: function () {
    return {
        sim: '',
        staff: '',
        device: '',
        data: '',
        price_data: '',
        voice: '',
        price_voice: '',
        offer: '',
        price_offer: '',
        option: '',
        price_option: '',
        comment: ''
    };
  },
  methods: {
    addNewCred () {
        let params = {
           
            device: this.device,
            data: this.data,
            price_data: this.price_data,
            voice: this.voice,
            price_voice: this.price_voice,
            offer: this.offer,
            price_offer: this.price_offer,
            option: this.option,
            price_option: this.price_option,
            comment: this.comment,
            staffId: this.staff,
            simId: this.sim
           
        }
        this.$api.credApi.creatCred(params)
            .then((data) => {
                this.notifyEvent();
                this.$emit('get-all-cred');
            }).catch((error) => {
                this.notifyEvent(false);
                throw error;
            });
    },
    notifyEvent(isSuccess = true) {
        if(isSuccess){
            this.$notify('Le nouvel offre a bien été créé.',{
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