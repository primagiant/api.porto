<template>
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <router-link :to="{ name: 'dashboard' }" class="nav-link">
                    <i class="icon-grid menu-icon"></i>
                    <span class="menu-title">Beranda</span>
                </router-link>
            </li>

            <li class="nav-item">
                <router-link :to="{ name: 'kegiatan' }" class="nav-link">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Kegiatan</span>
                </router-link>
            </li>

            <li class="nav-item">
                <div class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <i class="ti-package menu-icon"></i>
                    <span class="menu-title">Mahasiswa</span>
                    <i class="menu-arrow"></i>
                </div>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <router-link :to="{ name: 'perluValidasi' }" class="nav-link">Perlu Validasi</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{ name: 'sudahValidasi' }" class="nav-link">Sudah Validasi</router-link>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
</template>