<template>
    <div>
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Angkatan</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <router-link :to="{ name: 'dashboard' }">Dashboard</router-link>
                        </li>
                        <li class="breadcrumb-item active">Angkatan</li>
                    </ul>
                </div>
                <div class="col-auto">
                    <router-link :to="{ name: 'angkatanCreate' }" class="btn btn-primary mr-1">
                        <i class="fas fa-plus"></i>
                        <span class="ml-1">Tambah Data</span>
                    </router-link>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-center table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th class="text-center">Angkatan Tahun</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in angkatan" :key="index">
                                        <td>{{ index + 1 }}</td>
                                        <td class="text-center">{{ item.tahun }}</td>
                                        <td class="text-right">
                                            <router-link :to="{ name: 'angkatanEdit' }" class="btn btn-sm btn-white text-success mr-2">
                                                <i class="far fa-edit mr-1"></i>
                                                Edit
                                            </router-link>
                                            <button @click="deleteData(item.id)" class="btn btn-sm btn-white text-danger mr-2">
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

<script>
export default {
    data() {
        return {
            angkatan: {},
        };
    },
    mounted() {
        this.showAllData();
    },
    methods: {
        showAllData: function () {
            axios.get("/api/angkatan").then((response) => {
                this.angkatan = response.data.data;
            });
        },
        deleteData: function (id) {
            this.$swal
                .fire({
                    title: "Apakah kamu yakin?",
                    text: "Jika kamu hapus, maka data tidak akan kembali lagi.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Delete",
                    cancelButtonText: "Batal",
                })
                .then((result) => {
                    if (result.value) {
                        let uri = `/api/angkatan/${id}`;
                        this.axios.delete(uri).then((response) => {
                            this.$swal.fire({ title: "Success!", text: "Article deleted successfully", icon: "success", timer: 1000 });
                            // this.products.data.splice(this.products.data.indexOf(id), 1);
                        });
                        this.showAllData();
                    }
                });
        },
    },
};
</script>