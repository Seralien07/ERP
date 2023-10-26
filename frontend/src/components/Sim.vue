<template>
    <!-- Row -->
    <div class="row">
      <div class="col-lg-12">
          <div class="card">
              <div class="card-header ag-color-2">
                  <h4 class="m-b-0 text-white">Gestion des cartes SIM</h4>
              </div>
              <div class="card-body">
              <div class="form-body">
                <h3 class="card-title" v-hide="isUpdateUser">Filtres</h3>
                <hr>
              <div class="row p-t-20">
              <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">	Operateur</label>

                <select v-model="operateur"
                        class="form-control custom-select">
                        <option value="">Veuillez choisir l'Operateur</option>
                        <option  v-for="operateur in allOperateur"
                                    :key="operateur.id"
                                    :value="operateur.id">
                                {{ operateur.name }}
                        </option>
                </select>
              </div>
          </div>
          <!--/span-->

          <!--/span-->
            </div>
              <!--/row-->
              
            <div class="row">
                    <div class="form-actions">
                      <button type="button" class="btn ag-color-10-hover ag-color-10"  @click="showStaffByFilter">Appliquer les filtres</button>
                      <button type="submit" class="btn ag-color-4-hover ag-color-4 ml-10"  @click="clearFilters"> <i class="fa fa fa-close"></i>Reinitialiser filtres</button>
                    </div>
              </div>
          </div>
        </div>
    </div>
    <!-- Row -->
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title" style="border-right:none">List des Cartes SIM</div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
      <div class="card-body">
        <div class="d-lg-flex align-items-center mb-4 gap-3">
          <div class="position-relative col-sm-6">
            <div class="row">
              <div class="form-actions">
                    <button type="button" class="mt-2 mt-lg-0 ms-auto btn hover-btn ag-color-2" @click="showModalAddSim"><i class="bx bxs-plus-square"></i>Nouveau carte SIM</button>
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
                <th>Numero SIM</th>
                <th>Utilisateur</th>
                <th>Departement</th>
                <th>Compagnie</th>
                <th>Post</th>
                <th>Actions</th>
              </tr>
            </thead>

            <tbody>

                <tr v-for="sim in allSim">
                
                  <td>{{sim.operateur}}</td>
                  <td>{{sim.line}}</td>
                  <td>{{sim.number_sim}}</td>
                  <td>{{sim.fullname}}</td>
                  <td>{{sim.department}}</td>
                  <td>{{sim.compagny}}</td>
                  <td>{{sim.post}}</td>
                  <td>
                    <div class="d-flex order-actions">
                      <a href="javascript:;" @click="showModalUpdateSim(sim)"><i class='bx bxs-edit hover-btn blue'></i></a>
                      <a href="javascript:;" @click="showModalDeleteConfirmation(sim.id, sim.line, sim.fullname)" class="ms-3 confirm-delete-client"><i class='bx bxs-trash red'></i></a>
                    </div>
                  </td>
                </tr>
                <tr v-if="(allSim).length == '0'">
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
  <modal-add-sim  @get-all-sim="getAllSim"
                    :all-operateur="allOperateur"
                    :all-staff="allStaff"/>
  <!-- Modal update sim -->
  <modal-update-sim @get-all-sim="getAllSim"
                      :sim-details="simDetails"
                      :all-operateur="allOperateur"
                      :all-staff="allStaff"/>
  <!-- Modal confirmation delete-->
  <Modal-delete-confirmation @get-all-sim="getAllSim"
                             :simId="simId"
                             :simLine="simLine"
                             :simUsername="simUsername"/>
    
</template>

<script>
import { defineComponent } from 'vue'
import ModalAddSim from './modules/sim-components/ModalAddSim.vue';
import ModalUpdateSim from './modules/sim-components/ModalUpdateSim.vue';
import ModalDeleteConfirmation from './modules/sim-components/ModalDeleteConfirmation.vue';

export default defineComponent({
name: 'SimForm',
components: {
  ModalAddSim,
  ModalUpdateSim,
  ModalDeleteConfirmation
},
data: function () {
  return {
    allSim: [],
    allOperateur: [],
    simDetails: [],
    allStaff: [],
    simId:'',
    simLine:'',
    find:'',
    simUsername:'',
    operateur:''
  };
},
methods: {
  getAllSim () {
    this.$api.simApi.getAllSim()
      .then((data) => {
        this.allSim = data.data;
      }).catch((error) => {
          throw error;
      });
  },
  showModalDeleteConfirmation (idSim, lineSim, simUsername) {
    this.simId = idSim;
    this.simLine = lineSim;
    this.simUsername = simUsername;
    const modal = $('#confirmDelete');
    modal.modal('show');
  },
  showModalAddSim () {
    const modal = $('#newSim');
    modal.modal('show');
  },
  showModalUpdateSim (sim) {
    this.simDetails = sim;
    const modal = $('#updateSim');
    modal.modal('show');
  },
  onInputSearchText() {
    this.$api.simApi.searchSim(this.find)
      .then((data) => {
        this.allSim = data.data;
      }).catch((error) => {
          throw error;
      });
  },
  showStaffByFilter() {
      let params = {
            operateur: this.operateur
      }
      this.$api.simApi.filterSim(params)
        .then((data) => {
          this.allSim = data.data;
        }).catch((error) => {
            throw error;
        });
    },
    clearFilters() {
      this.operateur = '',
      this.getAllSim();
    },
  getAllOperateur () {
    this.$api.operateurApi.getAllOperateur()
      .then((data) => {
        this.allOperateur = data.data;
        //console.log('AllOperateur',this.allOperateur);
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
},
mounted () {
  this.getAllOperateur();
  this.getAllSim();
  this.getAllStaff();
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
