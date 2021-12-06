import Dashboard from '../pembimbingAkademik/pages/Dashboard.vue';
import Kegiatan from '../pembimbingAkademik/pages/Kegiatan.vue';
import Mahasiswa from '../pembimbingAkademik/pages/Mahasiswa.vue';
import DetailMahasiswa from '../pembimbingAkademik/pages/DetailMahasiswa.vue';

export const PembimbingAkademikRoutes = [
    { name: 'dashboard', path: '/pembimbing-akademik/dashboard', component: Dashboard },
    { name: 'kegiatan', path: '/pembimbing-akademik/kegiatan', component: Kegiatan },
    { name: 'mahasiswa', path: '/pembimbing-akademik/mahasiswa/', component: Mahasiswa },
    { name: 'detailMahasiswa', path: '/pembimbing-akademik/mahasiswa/:nim', component: DetailMahasiswa },
];