<template>
    <!-- Row -->
    <div class="row">
      <div class="col-lg-12">
          <div class="card">
              <div class="card-header ag-color-2">
                  <h4 class="m-b-0 text-white">Gestion des materiels sortant</h4>
              </div>
              <div class="card-body">
              <div class="form-body">
                <h3 class="card-title" v-hide="isUpdateUser">Filtres</h3>
                <hr>
              <div class="row p-t-20">
          <div class="col-md-4">
              <div class="form-group">
                <label class="control-label">Categorie</label>

                <select v-model="category"
                        class="form-control custom-select">
                        <option value="">Veuillez choisir la categorie</option>
                        <option  v-for="category in allCategory"
                                    :key="category.id"
                                    :value="category.id">
                                {{ category.name }}
                        </option>
                </select>
              </div>
          </div>
          <!--/span-->
         
            </div>
              <!--/row-->
              
            <div class="row">
                    <div class="form-actions">
                      <button type="button" class="btn ag-color-10-hover ag-color-10"  @click="showMatSortByFilter">Appliquer les filtres</button>
                      <button type="submit" class="btn ag-color-4-hover ag-color-4 ml-10" @click="clearFilters"> <i class="fa fa fa-close"></i>Reinitialiser filtres</button>
                    </div>
              </div>
          </div>
        </div>
    </div>
    <!-- Row -->
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title" style="border-right:none">Liste materiel sortant</div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
      <div class="card-body">
        <div class="d-lg-flex align-items-center mb-4 gap-3">
          <div class="position-relative col-sm-6">
            <div class="row">
              <div class="form-actions">
                    <button type="button" class="mt-2 mt-lg-0 ms-auto btn hover-btn ag-color-2" @click="showModalAddMatSort"><i class="bx bxs-plus-square"></i>Nouveau Materiel Sortant</button>
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
                <th>Nom</th>
                <th>Serial(SN)</th>
                <th>Type</th>
                <th>Categorie</th>
                <th>Model</th>
                <th>Quantité Sortant</th>
                <th>Utilisateur</th>
                <th>Post</th>
                <th>Departement</th>
                <th>Compagnie</th>
                <th>Commentaire</th>
                <th>Actions</th>
              </tr>
            </thead>

            <tbody>

                <tr v-for="matSort in allMatSort">

                  <td>{{matSort.nameMater}}</td>
                  <td>{{matSort.serials}}</td>
                  <td>{{matSort.type}}</td>
                  <td>{{matSort.category}}</td>
                  <td>{{matSort.model}}</td>
                  <td>{{matSort.quantity_sort}}</td>
                  <td>{{matSort.fullname}}</td>
                  <td>{{matSort.post}}</td>
                  <td>{{matSort.department}}</td>
                  <td>{{matSort.compagny}}</td>
                  <td>{{matSort.comments}}</td>
                  <td>
                    <div class="d-flex order-actions">
                      <a href="javascript:;" @click="showModalUpdateMatSort(matSort)"><i class='bx bxs-edit hover-btn blue'></i></a>
                      <a href="javascript:;" @click="showModalDeleteConfirmation(matSort.id,matSort.fullname)" class="ms-3 confirm-delete-client"><i class='bx bxs-trash red'></i></a>
                    </div>
                  </td>
                </tr>
                <tr v-if="(allMatSort).length == '0'">
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
  <!-- Modal add matSort -->
  <modal-add-matSort  @get-all-matSort="getAllMatSort"
                    :all-staff="allStaff"
                    :all-mat="allMat"/>
  <!-- Modal update matSort -->
  <modal-update-matSort @get-all-matSort="getAllMatSort"
                      :matSort-details="matSortDetails"
                      :all-staff="allStaff"
                      :all-mat="allMat"/>
  <!-- Modal confirmation delete-->
  <Modal-delete-confirmation @get-all-matSort="getAllMatSort"
                             :matSortId="matSortId"
                             :matSortUsername="matSortUsername"/>
    
</template>

<script>
import { defineComponent } from 'vue'
import ModalAddMatSort from './modules/matSort-components/ModalAddMatSort.vue';
import ModalUpdateMatSort from './modules/matSort-components/ModalUpdateMatSort.vue';
import ModalDeleteConfirmation from './modules/matSort-components/ModalDeleteConfirmation.vue';

export default defineComponent({
name: 'MatSortForm',
components: {
  ModalAddMatSort,
  ModalUpdateMatSort,
  ModalDeleteConfirmation
},
data: function () {
  return {
    allMatSort: [],
    allStaff: [],
    allMat: [],
    matSortDetails: [],
    matSortId:'',
    find:'',
    matSortUsername:'',
    category:''
  };
},
methods: {
  getAllMatSort () {
      this.$api.matSortApi.getAllMatSort()
        .then((data) => {
          this.allMatSort = data.data;
        }).catch((error) => {
            throw error;
        });
    },
  showModalDeleteConfirmation (idMatSort,matSortUsername) {
    this.matSortId = idMatSort;
    this.matSortUsername = matSortUsername;
    const modal = $('#confirmDelete');
    modal.modal('show');
  },
  showModalAddMatSort () {
    const modal = $('#newMatSort');
    modal.modal('show');
  },
  showModalUpdateMatSort (matSort) {
    this.matSortDetails = matSort;
    const modal = $('#updateMatSort');
    modal.modal('show');
  },
  onInputSearchText() {
    this.$api.matSortApi.searchMatSort(this.find)
      .then((data) => {
        this.allMatSort = data.data;
      }).catch((error) => {
          throw error;
      });
  },
  showMatSortByFilter() {
      let params = {
            category: this.category
      }
      this.$api.matSortApi.filterMatSort(params)
        .then((data) => {
          this.allMatSort = data.data;
        }).catch((error) => {
            throw error;
        });
    },
    clearFilters() {
      this.category = '',
      this.getAllMatSort();
    },
  getAllCategory () {
    this.$api.categoryApi.getAllCategory()
      .then((data) => {
        this.allCategory = data.data;
        console.log('AllCategory',this.allCategory);
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
    getAllMat () {
      this.$api.matApi.getAllMat()
        .then((data) => {
          this.allMat = data.data;
        }).catch((error) => {
            throw error;
        });
    },

},
mounted () {
  this.getAllCategory();
  this.getAllMatSort();
  this.getAllStaff();
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
