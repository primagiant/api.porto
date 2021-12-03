<template>
    <div>
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Jurusan</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <router-link :to="{ name: 'dashboard' }">Dashboard</router-link>
                        </li>
                        <li class="breadcrumb-item active">Jurusan</li>
                    </ul>
                </div>
                <div class="col-auto">
                    <router-link to="" class="btn btn-primary mr-1">
                        <i class="fas fa-plus"></i>
                        <span class="ml-1">Tambah Data</span>
                    </router-link>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-center table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Jurusan</th>
                                        <th>Nama Fakultas</th>
                                        <th>Deskripsi</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in fakultas" :key="index">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ item.nama_fakultas }}</td>
                                        <td>{{ item.nama_fakultas }}</td>
                                        <td>{{ item.deskripsi }}</td>
                                        <td class="text-right">
                                            <router-link to="" class="btn btn-sm btn-white text-success mr-2">
                                                <i class="far fa-edit mr-1"></i>
                                                Edit
                                            </router-link>
                                            <button class="btn btn-sm btn-white text-danger mr-2">
                                                <i class="far fa-trash-alt mr-1"></i>
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>