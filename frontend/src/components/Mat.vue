<template>
    <!-- Row -->
    <div class="row">
      <div class="col-lg-12">
          <div class="card">
              <div class="card-header ag-color-2">
                  <h4 class="m-b-0 text-white">Gestion des materiels</h4>
              </div>
              <div class="card-body">
              <div class="form-body">
                <h3 class="card-title" v-hide="isUpdateUser">Filtres</h3>
                <hr>
              <div class="row p-t-20">
              <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">Categorie</label>

                <select v-model="category"
                        class="form-control custom-select">
                        <option value="">Veuillez choisir la Categorie</option>
                        <option  v-for="category in allCategory"
                                    :key="category.id"
                                    :value="category.id">
                                {{ category.name }}
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
                      <button type="button" class="btn ag-color-10-hover ag-color-10" @click="showMatByFilter">Appliquer les filtres</button>
                      <button type="submit" class="btn ag-color-4-hover ag-color-4 ml-10" @click="clearFilters"> <i class="fa fa fa-close"></i>Reinitialiser filtres</button>
                    </div>
              </div>
          </div>
        </div>
    </div>
    <!-- Row -->
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title" style="border-right:none">Liste des materiels</div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
      <div class="card-body">
        <div class="d-lg-flex align-items-center mb-4 gap-3">
          <div class="position-relative col-sm-6">
            <div class="row">
              <div class="form-actions">
                    <button type="button" class="mt-2 mt-lg-0 ms-auto btn hover-btn ag-color-2" @click="showModalAddMat"><i class="bx bxs-plus-square"></i>Nouveau materiel</button>
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
                <th>Serial(SN)</th>
                <th>Type</th>
                <th>Categorie</th>
                <th>Model</th>
                <th>Quantité Entrant</th>
                <th>Date d'explotation</th>
                <th>Commentaire</th>
                <th>Actions</th>
              </tr>
            </thead>

            <tbody>

                <tr v-for="mat in allMat">
                
                  <td>{{mat.serial}}</td>
                  <td>{{mat.type}}</td>
                  <td>{{mat.category}}</td>
                  <td>{{mat.model}}</td>
                  <td>{{mat.quantity}}</td>
                  <td>{{mat.date}}</td>
                  <td>{{mat.commente}}</td>
                  <td>
                    <div class="d-flex order-actions">
                      <a href="javascript:;" @click="showModalUpdateMat(mat)"><i class='bx bxs-edit hover-btn blue'></i></a>
                      <a href="javascript:;" @click="showModalDeleteConfirmation(mat.id, mat.type)" class="ms-3 confirm-delete-client"><i class='bx bxs-trash red'></i></a>
                    </div>
                  </td>
                </tr>
                <tr v-if="(allMat).length == '0'">
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
  <!-- Modal add mat -->
  <modal-add-mat  @get-all-mat="getAllMat"
                    :all-category="allCategory"/>
  <!-- Modal update mat -->
  <modal-update-mat @get-all-mat="getAllMat"
                      :mat-details="matDetails"
                      :all-category="allCategory"/>
  <!-- Modal confirmation delete-->
  <Modal-delete-confirmation @get-all-mat="getAllMat"
                             :matId="matId"
                             :matType="matType"/>
    
</template>

<script>
import { defineComponent } from 'vue'
import ModalAddMat from './modules/mat-components/ModalAddMat.vue';
import ModalUpdateMat from './modules/mat-components/ModalUpdateMat.vue';
import ModalDeleteConfirmation from './modules/mat-components/ModalDeleteConfirmation.vue';

export default defineComponent({
name: 'MatForm',
components: {
  ModalAddMat,
  ModalUpdateMat,
  ModalDeleteConfirmation
},
data: function () {
  return {
    allMat: [],
    allCategory: [],
    matDetails: [],
    matId:'',
    matType:'',
    find:'',
    category:''
  };
},
methods: {
  getAllMat () {
    this.$api.matApi.getAllMat()
      .then((data) => {
        this.allMat = data.data;
      }).catch((error) => {
          throw error;
      });
  },
  showModalDeleteConfirmation (idMat, typeMat) {
    this.matId = idMat;
    this.matType = typeMat;
    const modal = $('#confirmDelete');
    modal.modal('show');
  },
  showModalAddMat () {
    const modal = $('#newMat');
    modal.modal('show');
  },
  showModalUpdateMat (mat) {
    this.matDetails = mat;
    const modal = $('#updateMat');
    modal.modal('show');
  },
  onInputSearchText() {
    this.$api.matApi.searchMat(this.find)
      .then((data) => {
        this.allMat = data.data;
      }).catch((error) => {
          throw error;
      });
  },
  showMatByFilter() {
      let params = {
            category: this.category
      }
      this.$api.matApi.filterMat(params)
        .then((data) => {
          this.allMat = data.data;
        }).catch((error) => {
            throw error;
        });
    },
    clearFilters() {
      this.category = '',
      this.getAllMat();
    },
  getAllCategory () {
    this.$api.categoryApi.getAllCategory()
      .then((data) => {
        this.allCategory = data.data;
      }).catch((error) => {
          throw error;
      });
  },
},
mounted () {
  this.getAllCategory();
  this.getAllMat();
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
