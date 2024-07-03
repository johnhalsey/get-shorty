import './bootstrap';
import '../css/app.css';

import { createApp } from "vue";

import Encode from "./Components/Encode.vue";
import Decode from "./Components/Decode.vue";

const app = createApp()

app.component('encode', Encode)
app.component('decode', Decode)

app.mount('#app')
