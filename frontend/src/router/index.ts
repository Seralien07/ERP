import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import LoginView from '../views/LoginView.vue'
import Dashboard from '../views/DashboardView.vue'
import ComputeView from '../views/ComputeView.vue'
import SimCarteView from '../views/SimCarteView.vue'
import CredView from '../views/CredView.vue'
import MatView from '../views/MatView.vue'
import MatSortView from '../views/MatSortView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'login',
      component: LoginView
    },
    {
      path: '/home',
      name: 'home',
      component: HomeView,
      children: [
        {
          path: '',
          name: 'Gestion des personnels',
          component: Dashboard,
          meta: { auth: true },
        },
        {
          path: '/machine',
          name: 'Suivi des machines',
          component: ComputeView,
          meta: { auth: true },
        },
        {
          path: '/sim',
          name: 'Getion des cartes SIM',
          component: SimCarteView,
          meta: { auth: true },
        },
        {
          path: '/cred',
          name: 'Getion du credit',
          component: CredView,
          meta: { auth: true },
        },
        {
          path: '/mat',
          name: 'Getion du materiel',
          component: MatView,
          meta: { auth: true },
        },
        {
          path: '/matSort',
          name: 'Getion du materiel sortant',
          component: MatSortView,
          meta: { auth: true },
        },
      ]
    }
  ]
})

export default router
