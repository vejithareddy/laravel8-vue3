require('./bootstrap');
import $ from 'jquery'
import axios from 'axios';
import { createApp } from 'vue'
import HelloWorld from './components/Welcome'

const app = createApp({})
app.component('hello-world', HelloWorld)
app.mount('#app')


//Vue.component('v-select', vSelect)