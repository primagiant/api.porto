import Angkatan from './admin/pages/masterdata/Angkatan.vue';
import Fakultas from './admin/pages/masterdata/Fakultas.vue';
import Jurusan from './admin/pages/masterdata/Jurusan.vue';
import Prodi from './admin/pages/masterdata/Prodi.vue';
import Dashboard from './admin/pages/Dashboard.vue';
import Kegiatan from './admin/pages/Kegiatan.vue';

export const routes = [
    {
        name: 'dashboard',
        path: '/admin/dashboard',
        component: Dashboard
    },
    {
        name: 'kegiatan',
        path: '/admin/kegiatan',
        component: Kegiatan
    },
    {
        name: 'angkatan',
        path: '/admin/angkatan',
        component: Angkatan
    },
    {
        name: 'fakultas',
        path: '/admin/fakultas',
        component: Fakultas
    },
    {
        name: 'jurusan',
        path: '/admin/jurusan',
        component: Jurusan
    },
    {
        name: 'prodi',
        path: '/admin/prodi',
        component: Prodi
    }
];