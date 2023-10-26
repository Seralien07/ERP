<template>
    <!-- Row -->
    <div class="row">
      <div class="col-lg-12">
          <div class="card">
              <div class="card-header ag-color-2">
                  <h4 class="m-b-0 text-white">Gestion du credit</h4>
              </div>
              <div class="card-body">
              <div class="form-body">
                <h3 class="card-title" v-hide="isUpdateUser">Filtres</h3>
                <hr>
              <div class="row p-t-20">
              <div class="col-md-4">
              <div class="form-group">
                <label class="control-label">	Offer</label>

                <select v-model="offer"
                        class="form-control custom-select">
                        <option value="">Veuillez choisir l'Operateur</option>
                        <option  v-for="offer in allOffer"
                                    :key="offer.id"
                                    :value="offer.id">
                                {{ offer.name }}
                        </option>
                </select>
              </div>
          </div>
          <!--/span-->
          <div class="col-md-4">
              <div class="form-group">
                <label class="control-label">	Device</label>

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
          <!--/span-->
          <div class="col-md-4">
              <div class="form-group">
                <label class="control-label">	Voix</label>

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
          <!--/span-->
            </div>
              <!--/row-->
              
            <div class="row">
                    <div class="form-actions">
                      <button type="button" class="btn ag-color-10-hover ag-color-10"  @click="showCredByFilter">Appliquer les filtres</button>
                      <button type="submit" class="btn ag-color-4-hover ag-color-4 ml-10" @click="clearFilters"> <i class="fa fa fa-close"></i>Reinitialiser filtres</button>
                    </div>
              </div>
          </div>
        </div>
    </div>
    <!-- Row -->
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title" style="border-right:none">Liste Offre du credit</div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
      <div class="card-body">
        <div class="d-lg-flex align-items-center mb-4 gap-3">
          <div class="position-relative col-sm-6">
            <div class="row">
              <div class="form-actions">
                    <button type="button" class="mt-2 mt-lg-0 ms-auto btn hover-btn ag-color-2" @click="showModalAddCred"><i class="bx bxs-plus-square"></i>Nouveau Offre</button>
              </div>
            </div>
          
          </div>

          <div class="position-relative col-sm-6">
            <input  v-model="find"
                    type="text" 
                    class="form-control ps-5 radius-30" 
                    placeholder="Rechercher"
                    @input="onInputSearchText">
            <span class="position-absolute top-50 product-show translate-middle-y">
              <i class="bx bx-search"></i>
            </span>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table mb-0">
            <thead class="table-light">
              <tr>  
                <th>Operateur</th>
                <th>Ligne</th>
                <th>Utilisateur</th>
                <th>departement</th>
                <th>Compagnie</th>
                <th>Post</th>
                <th>Device</th>
                <th>Data</th>
                <th>Coùt Data</th>
                <th>Voix</th>
                <th>Coùt Voix</th>
                <th>Offre</th>
                <th>Coùt Offre</th>
                <th>Option</th>
                <th>Coùt Offre</th>
                <th>Commentaire</th>
                <th>Actions</th>
              </tr>
            </thead>

            <tbody>

                <tr v-for="cred in allCred">

                  <td>{{cred.operateur}}</td>
                  <td>{{cred.line}}</td>
                  <td>{{cred.fullname}}</td>
                  <td>{{cred.department}}</td>
                  <td>{{cred.compagny}}</td>
                  <td>{{cred.post}}</td>
                  <td>{{cred.device}}</td>
                  <td>{{cred.data}}</td>
                  <td>{{cred.price_data}}</td>
                  <td>{{cred.voice}}</td>
                  <td>{{cred.price_voice}}</td>
                  <td>{{cred.offer}}</td>
                  <td>{{cred.price_offer}}</td>
                  <td>{{cred.option}}</td>
                  <td>{{cred.price_option}}</td>
                  <td>{{cred.comment}}</td>
                  <td>
                    <div class="d-flex order-actions">
                      <a href="javascript:;" @click="showModalUpdateCred(cred)"><i class='bx bxs-edit hover-btn blue'></i></a>
                      <a href="javascript:;" @click="showModalDeleteConfirmation(cred.id,cred.fullname)" class="ms-3 confirm-delete-client"><i class='bx bxs-trash red'></i></a>
                    </div>
                  </td>
                </tr>
                <tr v-if="(allCred).length == '0'">
                    <td colspan="12" class="text-center">Aucun résultat</td>
                </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- end page wrapper -->
  <!-- Modal add sim -->
  <modal-add-cred  @get-all-cred="getAllCred"
                    :all-device="allDevice"
                    :all-voice="allVoice"
                    :all-offer="allOffer"
                    :all-staff="allStaff"
                    :all-sim="allSim"/>
  <!-- Modal update sim -->
  <modal-update-cred @get-all-cred="getAllCred"
                      :cred-details="credDetails"
                      :all-device="allDevice"
                      :all-voice="allVoice"
                      :all-offer="allOffer"
                      :all-staff="allStaff"
                      :all-sim="allSim"/>
  <!-- Modal confirmation delete-->
  <Modal-delete-confirmation @get-all-cred="getAllCred"
                             :credId="credId"
                             :credUsername="credUsername"/>
    
</template>

<script>
import { defineComponent } from 'vue'
import ModalAddCred from './modules/cred-components/ModalAddCred.vue';
import ModalUpdateCred from './modules/cred-components/ModalUpdateCred.vue';
import ModalDeleteConfirmation from './modules/cred-components/ModalDeleteConfirmation.vue';

export default defineComponent({
name: 'CredForm',
components: {
  ModalAddCred,
  ModalUpdateCred,
  ModalDeleteConfirmation
},
data: function () {
  return {
    allCred: [],
    allDevice: [],
    allVoice: [],
    allOffer: [],
    allStaff: [],
    allSim: [],
    credDetails: [],
    credId:'',
    credUsername:'',
    find:'',
    offer:'',
    device:'',
    voice:''
  };
},
methods: {
  getAllCred () {
      this.$api.credApi.getAllCred()
        .then((data) => {
          this.allCred = data.data;
        }).catch((error) => {
            throw error;
        });
    },
  showModalDeleteConfirmation (idCred, credUsername) {
    this.credId = idCred;
    this.credUsername = credUsername;
    const modal = $('#confirmDelete');
    modal.modal('show');
  },
  showModalAddCred () {
    const modal = $('#newCred');
    modal.modal('show');
  },
  showModalUpdateCred (cred) {
    this.credDetails = cred;
    const modal = $('#updateCred');
    modal.modal('show');
  },
  onInputSearchText() {
    this.$api.credApi.searchCred(this.find)
      .then((data) => {
        this.allCred = data.data;
      }).catch((error) => {
          throw error;
      });
  },
  showCredByFilter() {
      let params = {
            offer: this.offer,
            device: this.device,
            voice: this.voice
      }
      this.$api.credApi.filterCred(params)
        .then((data) => {
          this.allCred = data.data;
        }).catch((error) => {
            throw error;
        });
    },
    clearFilters() {
      this.offer = '',
      this.device = '',
      this.voice = '',
      this.getAllCred();
    },
  getAllDevice () {
    this.$api.deviceApi.getAllDevice()
      .then((data) => {
        this.allDevice = data.data;
        //console.log('AllOperateur',this.allOperateur);
      }).catch((error) => {
          throw error;
      });
  },
  getAllVoice () {
    this.$api.voiceApi.getAllVoice()
      .then((data) => {
        this.allVoice = data.data;
        //console.log('AllVoice',this.allVoice);
      }).catch((error) => {
          throw error;
      });
  },
  getAllOffer () {
    this.$api.offerApi.getAllOffer()
      .then((data) => {
        this.allOffer = data.data;
        console.log('AllOffer',this.allOffer);
      }).catch((error) => {
          throw error;
      });
  },
  getAllStaff () {
      this.$api.staffApi.getAllStaff()
        .then((data) => {
          this.allStaff = data.data;
        }).catch((error) => {
            throw error;
        });
    },
    getAllSim () {
      this.$api.simApi.getAllSim()
        .then((data) => {
          this.allSim = data.data;
        }).catch((error) => {
            throw error;
        });
    },

},
mounted () {
  this.getAllDevice();
  this.getAllVoice();
  this.getAllOffer();
  this.getAllCred();
  this.getAllStaff();
  this.getAllSim();
}
});

</script>


<style>

.ag-color-7 {
  color: white !important;
  background-color: #56717a;
  opacity: 0.9;
}

.ag-color-8 {
  color: #6c85ec;
  border-color: #6c85ec;
}

.ag-color-8:hover {
  background: #6c85ec;
  color: white;
  opacity: 0.9;
}

.ml-10 {
  margin-left: 10px;
}

.product-show {
  left: 25px !important;
}

.top-50 {
  top: 55% !important;
}

.d-lg-flex.align-items-center.mb-4.gap-3 {
  margin-top: 10px !important;
}

.radius-30 {
  border-radius: 8px !important;
  margin-top: 0px !important;
}

</style>
