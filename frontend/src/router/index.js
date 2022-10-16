import { createRouter, createWebHistory } from 'vue-router';
import HomePage from '@/pages/HomePage.vue';
import LoginFromPage from '@/pages/LoginFormPage.vue';
import SampleVuex from '@/pages/SampleVuex.vue';

const routes = [
  { path: '/Home', component: HomePage },
  { path: '/login', component: LoginFromPage },
  { path: '/sample/vuex', component: SampleVuex },
]


const router = createRouter({
  // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
  history: createWebHistory(),
  routes, // short for `routes: routes`
})

export default router