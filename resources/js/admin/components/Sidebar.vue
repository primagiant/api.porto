<template>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title"><span>Main</span></li>
                    <li>
                        <router-link :to="{ name: 'dashboard' }">
                            <i data-feather="home"></i>
                            <span>Dashboard</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link to="">
                            <i data-feather="users"></i>
                            <span>Mahasiswa</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'kegiatan' }">
                            <i data-feather="package"></i>
                            <span>Kegiatan</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link to="">
                            <i data-feather="box"></i>
                            <span>Pembimbing Akademik</span>
                        </router-link>
                    </li>
                    <li class="menu-title"><span>Master</span></li>
                    <li class="submenu active">
                        <router-link to="">
                            <i data-feather="grid"></i>
                            <span>Master Data</span>
                            <span class="menu-arrow"></span>
                        </router-link>
                        <ul>
                            <li><router-link :to="{ name: 'fakultas' }">Fakultas</router-link></li>
                            <li><router-link :to="{ name: 'jurusan' }">Jurusan</router-link></li>
                            <li><router-link :to="{ name: 'prodi' }">Prodi</router-link></li>
                            <li><router-link :to="{ name: 'angkatan' }">Angkatan</router-link></li>
                        </ul>
                    </li>

                    <li class="menu-title"><span>Pengaturan</span></li>
                    <li>
                        <router-link to="">
                            <i data-feather="user"></i>
                            <span>Profile</span>
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {};
</script>