<template>
 <div>
    <header-page></header-page>
    <side-bar></side-bar>
    <div class="page-wrapper">
      <div class="page-content">
          <router-view></router-view>
      </div>
    </div>

  </div>
  <footer-page></footer-page>
</template>

<script>
import headerPage from './modules/HeaderPage.vue';
import sideBar from './modules/SideBar.vue';
import footerPage from '../components/modules/FooterPage.vue';

export default {
  name: 'HomeView',
  components: {
      sideBar,
      footerPage,
      headerPage
  }
}
</script>

<style>

.modal-dialog{
  overflow-y: initial !important;
}
.modal-body{
  max-height: calc(100vh - 200px) !important;
  overflow-y: auto !important;
}

</style>