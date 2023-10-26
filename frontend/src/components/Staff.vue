<template>
      <!-- Row -->
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header ag-color-2">
                    <h4 class="m-b-0 text-white">Gestion des personnels</h4>
                </div>
                <div class="card-body">
                <div class="form-body">
                  <h3 class="card-title" v-hide="isUpdateUser">Filtres</h3>
                  <hr>
                <div class="row p-t-20">
                <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label">	Departement</label>
  
                  <select v-model="department"
                          class="form-control custom-select">
                          <option value="">Veuillez choisir le departement</option>
                          <option  v-for="department in allDepartment"
                                      :key="department.id"
                                      :value="department.id">
                                  {{ department.name }}
                          </option>
                  </select>
                </div>
            </div>
            <!--/span-->
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Compagnie</label>
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
            <!--/span-->
              </div>
                <!--/row-->
                
              <div class="row">
                      <div class="form-actions">
                        <button type="button" class="btn ag-color-10-hover ag-color-10" @click="showStaffByFilter">Appliquer les filtres</button>
                        <button type="submit" class="btn ag-color-4-hover ag-color-4 ml-10" @click="clearFilters"> <i class="fa fa fa-close"></i>Reinitialiser filtres</button>
                      </div>
                </div>
            </div>
          </div>
      </div>
      <!-- Row -->
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title" style="border-right:none">List des personnels</div>
      </div>
      <!--end breadcrumb-->
      <div class="card">
        <div class="card-body">
          <div class="d-lg-flex align-items-center mb-4 gap-3">
            <div class="position-relative col-sm-6">
              <div class="row">
                <div class="form-actions">
                      <button type="button" class="mt-2 mt-lg-0 ms-auto btn hover-btn ag-color-2" @click="showModalAddStaff"><i class="bx bxs-plus-square"></i>Nouveau personnel</button>
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
                  <th>Prenom</th>
                  <th>Email</th>
                  <th>Poste</th>
                  <th>Departement</th>
                  <th>Compagnie</th>
                  <th>Date d'embauche</th>
                  <th>Date de demission</th>
                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>

                  <tr v-for="staff in allStaff">
                  
                    <td>{{staff.lastname}}</td>
                    <td>{{staff.firstname}}</td>
                    <td>{{staff.email}}</td>
                    <td>{{staff.post}}</td>
                    <td>{{staff.department}}</td>
                    <td>{{staff.compagny}}</td>
                    <td>{{staff.hiring_date}}</td>
                    <td></td>
                    <td>
                      <div class="d-flex order-actions">
                        <a href="javascript:;" @click="showModalUpdateStaff(staff)"><i class='bx bxs-edit hover-btn blue'></i></a>
                        <a href="javascript:;" @click="showModalDeleteConfirmation(staff.id, staff.lastname)" class="ms-3 confirm-delete-client"><i class='bx bxs-trash red'></i></a>
                      </div>
                    </td>
                  </tr>
                  <tr v-if="(allStaff).length == '0'">
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
    <!-- Modal add staff -->
    <modal-add-staff  @get-all-staff="getAllStaff"
                      :all-department="allDepartment"
                      :all-compagny="allCompagny"/>
    <!-- Modal update staff -->
    <modal-update-staff @get-all-staff="getAllStaff"
                        :staff-details="staffDetails"
                        :all-department="allDepartment"
                        :all-compagny="allCompagny"/>
    <!-- Modal confirmation delete-->
    <Modal-delete-confirmation @get-all-staff="getAllStaff"
                               :staffId="staffId"
                               :staffName="staffName"/>
      
</template>

<script>
import { defineComponent } from 'vue'
import ModalAddStaff from './modules/staff-components/ModalAddStaff.vue';
import ModalUpdateStaff from './modules/staff-components/ModalUpdateStaff.vue';
import ModalDeleteConfirmation from './modules/staff-components/ModalDeleteConfirmation.vue';

export default defineComponent({
  name: 'StaffForm',
  components: {
    ModalAddStaff,
    ModalUpdateStaff,
    ModalDeleteConfirmation
  },
  data: function () {
    return {
      allStaff: [],
      allDepartment: [],
      allCompagny: [],
      staffDetails: [],
      staffId:'',
      staffName:'',
      find:'',
      department:'',
      compagny:''
    };
  },
  methods: {
    getAllStaff () {
      this.$api.staffApi.getAllStaff()
        .then((data) => {
          this.allStaff = data.data;
        }).catch((error) => {
            throw error;
        });
    },
    showModalDeleteConfirmation (idStaff, nameStaff) {
      this.staffId = idStaff;
      this.staffName = nameStaff;
      const modal = $('#confirmDelete');
      modal.modal('show');
    },
    showModalAddStaff () {
      const modal = $('#newStaff');
      modal.modal('show');
    },
    showModalUpdateStaff (staff) {
      this.staffDetails = staff;
      const modal = $('#updateStaff');
      modal.modal('show');
    },
    onInputSearchText() {
      this.$api.staffApi.searchStaff(this.find)
        .then((data) => {
          this.allStaff = data.data;
        }).catch((error) => {
            throw error;
        });
    },
    showStaffByFilter() {
      let params = {
            department: this.department,
            compagny: this.compagny
      }
      this.$api.staffApi.filterStaff(params)
        .then((data) => {
          this.allStaff = data.data;
        }).catch((error) => {
            throw error;
        });
    },
    clearFilters() {
      this.department = '',
      this.compagny = '',
      this.getAllStaff();
    },
    getAllDepartment () {
      this.$api.departmentApi.getAllDepartment()
        .then((data) => {
          this.allDepartment = data.data;
        }).catch((error) => {
            throw error;
        });
    },
    getAllCompagny () {
      this.$api.compagnyApi.getAllCompagny()
        .then((data) => {
          this.allCompagny = data.data;
        }).catch((error) => {
            throw error;
        });
    },
  },
  mounted () {
    this.getAllDepartment();
    this.getAllCompagny();
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
