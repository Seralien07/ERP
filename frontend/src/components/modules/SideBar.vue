<template>
<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img style="opacity: 0.7;" src="/src/assets/images/erp-logo.png" class="logo-icon" alt="logo icon" width="80">
        </div>
        <div>
            <h1 class="logo-text">Entreprise Ressource Planning</h1>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-menu'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">

        <li class="menu-label">DATA RH</li>
        <li :class="getActive('/home')">
                <router-link to="/home">
                    <div class="parent-icon">
                        <i class='bx bx-user-pin'></i>
                    </div>
                    <div class="menu-title">Gestion personel</div>
                </router-link>
        </li>

        <li class="menu-label">SIM  CARD</li>

        <li :class="getActive('/sim')">
            <router-link to="/sim">
                <div class="parent-icon">
                    <i class='lni lni-investment'></i>
                </div>
                <div class="menu-title">Gestion cart sim</div>
            </router-link>
        </li>

        <li :class="getActive('/cred')">
            <router-link to="/cred">
                <div class="parent-icon">
                    <i class='lni lni-target-customer'></i>
                </div>
                <div class="menu-title">Gestion credit</div>
            </router-link>
        </li>
    
        <li :class="getActive('/reporting')">
            <router-link to="/reporting">
                <div class="parent-icon">
                    <i class='lni lni-stats-up'></i>
                </div>
                <div class="menu-title">Reporting</div>
            </router-link>
        </li>

        <li class="menu-label">SOTCK</li>

        <li :class="getActive('/mat')">
            <router-link to="/mat">
                <div class="parent-icon">
                    <i class='lni lni-investment'></i>
                </div>
                <div class="menu-title">Gestion materiel Entrant </div>
            </router-link>
        </li>

        <li :class="getActive('/matSort')">
            <router-link to="/matSort">
                <div class="parent-icon">
                    <i class='lni lni-target-customer'></i>
                </div>
                <div class="menu-title">Gestion materiel sortant</div>
            </router-link>
        </li>
    
        <li class="menu-label">ADMINISTRATION</li>
        <li :class="getActive('/gestion-user')">
            <router-link to="/reporting">
                <div class="parent-icon">
                    <i class="lni lni-users"></i>
                </div>
                <div class="menu-title" >Gestion utilisateurs</div>
            </router-link>
        </li>

        <li class="menu-label">Autres</li>
        <li>
            <a href="/">
                <div class="parent-icon">
                    <i class="bx  bx-log-out-circle"></i>
                </div>
                <div class="menu-title">Se deconnecter</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
</template>

<script>
export default {
    name: 'SideBar',
    methods: {
        getActive (route) {
           return route === this.$route.path ? 'mm-active' : '';
        }
    }
}
</script>
