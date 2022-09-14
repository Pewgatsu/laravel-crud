import './bootstrap';
import '../css/app.css';
import '../sass/app.scss';




import { createApp } from 'vue';
import App from './App.vue';
import router from './router/routes';
import axios from 'axios';



axios.defaults.baseURL = 'http://localhost:8000/api/';



const app = createApp(App).use(router).mount('#app');

