import { createRouter, createWebHistory } from 'vue-router';
import HomePage from '@/pages/HomePage.vue';
import LoginFromPage from '@/pages/LoginFormPage.vue';
import SampleVuex from '@/pages/SampleVuex.vue';
import ChatPage from '@/pages/ChatPage.vue';
import SocketPage from '@/pages/SocketPage.vue';

const routes = [
  { path: '/chat/:chatRoomId?',
    component: ChatPage,
    props: true,
    // children: [
    //   { 
    //         path: '',
    //         component: ChatRoomVue,
    //       }
    // ]
  },
  { path: '/home', component: HomePage },
  { path: '/login', component: LoginFromPage },
  { path: '/sample/vuex', component: SampleVuex },
  { path: '/socket', component: SocketPage}
]


const router = createRouter({
  // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
  history: createWebHistory(),
  routes, // short for `routes: routes`
})

export default router