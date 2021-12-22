import Dashboard from '../pembimbingAkademik/pages/Dashboard.vue';
import Kegiatan from '../pembimbingAkademik/pages/Kegiatan.vue';
import PerluValidasi from '../pembimbingAkademik/pages/PerluValidasi.vue';
import DetailPerluValidasi from '../pembimbingAkademik/pages/DetailPerluValidasi.vue';
import Validasi from '../pembimbingAkademik/pages/Validasi.vue';
import SudahValidasi from '../pembimbingAkademik/pages/SudahValidasi.vue';
import DetailSudahValidasi from '../pembimbingAkademik/pages/DetailSudahValidasi.vue';

export const PembimbingAkademikRoutes = [
    { name: 'dashboard', path: '/pembimbing-akademik/dashboard', component: Dashboard },
    { name: 'kegiatan', path: '/pembimbing-akademik/kegiatan', component: Kegiatan },
    { name: 'perluValidasi', path: '/pembimbing-akademik/mahasiswa/non-valid', component: PerluValidasi },
    { name: 'detailPerluValidasi', path: '/pembimbing-akademik/mahasiswa/:nim/non-valid', component: DetailPerluValidasi },
    { name: 'validasi', path: '/pembimbing-akademik/portofolio/:id', component: Validasi},
    { name: 'sudahValidasi', path: '/pembimbing-akademik/mahasiswa/valid', component: SudahValidasi },
    { name: 'detailSudahValidasi', path: '/pembimbing-akademik/mahasiswa/:nim/valid', component: DetailSudahValidasi },
];