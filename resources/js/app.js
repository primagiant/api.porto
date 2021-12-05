require('./bootstrap');
window.Vue = require('vue').default;

import Admin from './admin/App.vue';
import PembimbingAkademik from './pembimbingAkademik/App.vue';
import Mahasiswa from './Mahasiswa/App.vue';

import VueAxios from 'vue-axios';
import VueRouter from 'vue-router';
import axios from 'axios';

import { AdminRoutes } from './routes/admin';
import { PembimbingAkademikRoutes } from './routes/pembimbingAkademik';
import { MahasiswaRoutes } from './routes/mahasiswa';

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.all';

import Vue from 'vue';

Vue.use(VueRouter);
Vue.use(VueSweetalert2);
Vue.use(VueAxios, axios);

Vue.component('pagination', require('laravel-vue-pagination'));

// Admin
const AdminRouter = new VueRouter({
    mode: 'history',
    routes: AdminRoutes
});

const admin = new Vue({
    el: '#admin',
    router: AdminRouter,
    render: h => h(Admin)
});

// // Pembimbing Akademik
// const PembimbingAkademikRouter = new VueRouter({
//     mode: 'history',
//     routes: PembimbingAkademikRoutes
// });

// const pembimbingAkademik = new Vue({
//      el: '#pembimbingAkademik',
//      router: PembimbingAkademikRouter,
//      render: h => h(PembimbingAkademik)
// });

// // Mahasiswa
// const MahasiswaRouter = new VueRouter({
//     mode: 'history',
//     routes: MahasiswaRoutes
// });

// const mahasiswa = new Vue({
//      el: '#mahasiswa',
//      router: MahasiswaRouter,
//      render: h => h(Mahasiswa)
// });
 