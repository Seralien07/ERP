import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'
import { Api } from './api/Api.js';
import { createToast } from 'mosha-vue-toastify';
import 'mosha-vue-toastify/dist/style.css'

const api = new Api();

const app = createApp(App)
app.config.globalProperties.$api = api;
app.config.globalProperties.$notify = createToast;

app.use(createPinia())
app.use(router)

app.mount('#app')
