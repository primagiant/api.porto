import Dashboard from '../mahasiswa/pages/Dashboard.vue'
import Kegiatan from '../mahasiswa/pages/Kegiatan.vue'
import Portofolio from '../mahasiswa/pages/Portofolio.vue'

export const MahasiswaRoutes = [
    { name: 'dashboard', path:'/mahasiswa/dashboard', component:Dashboard },
    { name: 'kegiatan', path:'/mahasiswa/kegiatan', component: Kegiatan},
    { name: 'portofolio', path:'/mahasiswa/portofolio', component: Portofolio},
];