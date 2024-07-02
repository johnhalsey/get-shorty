import './bootstrap';
import '../css/app.css';

import { createApp } from "vue";

import Shortener from "./Components/Shortener.vue";

const app = createApp()

app.component('shortner', Shortener)

app.mount('#app')
