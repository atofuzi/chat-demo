import { createApp } from 'vue'
import App from './App.vue'
import './index.css'
import router from './router';  
import store from './store';
import vClickOutside from "click-outside-vue3"

createApp(App).use(router).use(store).use(vClickOutside).mount('#app');