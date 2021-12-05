import Angkatan from '../admin/pages/masterdata/Angkatan.vue';
import Fakultas from '../admin/pages/masterdata/Fakultas.vue';
import Jurusan from '../admin/pages/masterdata/Jurusan.vue';
import Prodi from '../admin/pages/masterdata/Prodi.vue';
import Dashboard from '../admin/pages/Dashboard.vue';
import Kegiatan from '../admin/pages/Kegiatan.vue';
import Mahasiswa from '../admin/pages/Mahasiswa.vue';
import PembimbingAkademik from '../admin/pages/PembimbingAkademik.vue';
import FormsAngkatan from '../admin/pages/forms/FormsAngkatan.vue';

export const AdminRoutes = [
    { name: 'dashboard', path: '/admin/dashboard', component: Dashboard },
    { name: 'kegiatan', path: '/admin/kegiatan', component: Kegiatan },
    // Angkatan
    { name: 'angkatan', path: '/admin/angkatan', component: Angkatan },
    { name:'angkatanCreate', path: '/admin/angkatan/create', component: FormsAngkatan },
    { name:'angkatanEdit', path: '/admin/angkatan/edit/:id', component: FormsAngkatan },
    // Fakultas
    { name: 'fakultas', path: '/admin/fakultas', component: Fakultas },
    // Jurusan
    { name: 'jurusan', path: '/admin/jurusan', component: Jurusan },
    // Prodi
    { name: 'prodi', path: '/admin/prodi', component: Prodi },
    // Mahasiswa
    { name: 'mahasiswa', path: '/admin/mahasiswa', component: Mahasiswa },
    //Pembimbing Akademik
    { name: 'pembimbingakademik', path: '/admin/pembimbingakademik', component: PembimbingAkademik },
];