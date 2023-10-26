<template>
    <header>
        <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>
            <div class="search-bar flex-grow-1">
            <div class="position-relative search-bar-box">
                <span class="p-b-34 p-t-27">
                    <img src="/src/assets/images/riologo.svg" alt="" style="width: 20%;">
                </span>
                <span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
            </div>
            </div>
            <!-- Display to use notification -->
            <div class="top-menu ms-auto" style="display: none;">
      <ul class="navbar-nav align-items-center">
        <li class="nav-item dropdown dropdown-large">
          <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count"></span>
            <i class='bx bx-bell'></i>
          </a>
          <div class="dropdown-menu dropdown-menu-end">
            <a href="javascript:;">
              <div class="msg-header">
                <p class="msg-header-title">Notifications</p>
                <p class="msg-header-clear ms-auto red">Vous avez Test taches en retard</p>
              </div>
            </a>
            <div class="header-notifications-list">
              <a class="dropdown-item" href="javascript:;">
                <div class="d-flex align-items-center" >
                  <div class="flex-grow-1">
                    <h6 class="msg-name">Intitulé: <span class="green-so">Test</span>
                      <span class="msg-time float-end"></span>
                    </h6>
                    <p class="msg-info">Intervenant: <span class="green-so" >Test 1</span></p>
                    <p class="msg-info blue-so">Date prevus: <span>Date</span></p>
                    <p class="msg-info blue-so">Agenda: <span >Test 2</span></p>
                  </div>
                </div>
              </a>
            </div>
            <!-- <a href="javascript:;">
              <div class="text-center msg-footer">Voir toutes les notifications</div>
            </a> -->
          </div>
        </li>
        <div class="header-message-list"></div>

      </ul>
    </div>
            <!-- End notification -->
            <div class="user-box dropdown">
            <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i style="font-size: 40px;" class="lni lni-user"></i>
                <div class="user-info ps-3">
                <p class="user-name mb-0">JUDITH</p>
                <p class="designattion mb-0">Fonction: Developpeur</p>
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                <a class="dropdown-item" href="javascript:;">
                    <i class="bx bx-cog"></i>
                    <span>Mon compte</span>
                </a>
                </li>
                <li>
                <div class="dropdown-divider mb-0"></div>
                </li>
                <li>
                <a class="dropdown-item" href="/">
                    <i class='bx bx-log-out-circle'></i>
                    <span hr>Se deconnecter</span>
                </a>
                </li>
            </ul>
            </div>
        </nav>
        </div>
    </header>
</template>

<script>
export default {
    name: 'header',
}
</script>

<style scoped>

</style>