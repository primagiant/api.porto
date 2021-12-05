import Angkatan from '../admin/pages/masterdata/Angkatan.vue';
import Fakultas from '../admin/pages/masterdata/Fakultas.vue';
import Jurusan from '../admin/pages/masterdata/Jurusan.vue';
import Prodi from '../admin/pages/masterdata/Prodi.vue';
import Dashboard from '../admin/pages/Dashboard.vue';
import Kegiatan from '../admin/pages/Kegiatan.vue';
import TambahAngkatan from '../admin/pages/forms/TambahAngkatan.vue';

export const AdminRoutes = [
    { name: 'dashboard', path: '/admin/dashboard', component: Dashboard },
    { name: 'kegiatan', path: '/admin/kegiatan', component: Kegiatan },
    // Angkatan
    { name: 'angkatan', path: '/admin/angkatan', component: Angkatan },
    { name:'angkatanCreate', path: '/admin/angkatan/create', component: TambahAngkatan },
    // { name:'angkatanEdit', path: '/admin/angkatan/edit/:id', component: FormKegiatan },
    // Fakultas
    { name: 'fakultas', path: '/admin/fakultas', component: Fakultas },
    // Jurusan
    { name: 'jurusan', path: '/admin/jurusan', component: Jurusan },
    // Prodi
    { name: 'prodi', path: '/admin/prodi', component: Prodi }
];