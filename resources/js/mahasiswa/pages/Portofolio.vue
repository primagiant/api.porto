<template>
    <div>
        <div class="col-md-12 mb-3">
            <h3>Data Portofolio Mahasiswa</h3>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <router-link :to="{ name: 'portofolioCreate' }" class="btn btn-primary mb-3">
                        <i class="icon-plus mr-2"></i>
                        Tambah Data
                    </router-link>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="checkAll" /></th>
                                    <th class="text-center">Nama Kegiatan</th>
                                    <th class="text-center">Penyelenggara</th>
                                    <th class="text-center">Point</th>
                                    <th class="text-center" width="50">Status</th>
                                    <th class="text-center" width="50">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in portofolio.data" :key="index">
                                    <td><input type="checkbox" class="checkClass" /></td>
                                    <td class="text-center">{{ item.nama_kegiatan }}</td>
                                    <td class="text-center">{{ item.penyelenggara }}</td>
                                    <td class="text-center">{{ item.valid_point }}</td>
                                    <td class="text-center">
                                        <div v-if="item.status == 0" class="btn btn-sm btn-danger d-flex justify-content-center align-items-center">
                                            <i class="ti-close"></i>
                                        </div>
                                        <div v-else class="btn btn-sm btn-success d-flex justify-content-center align-items-center">
                                            <i class="ti-check"></i>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <router-link to="" class="btn btn-sm btn-primary" type="submit">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <i class="ti-eye"></i>
                                            </div>
                                        </router-link>
                                        <button @click="redirectCheck(item.id)" class="btn btn-sm btn-warning" type="submit">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <i class="ti-marker-alt"></i>
                                            </div>
                                        </button>
                                        <button @click="deleteData(item.id)" v-if="item.status == 0" to="" class="btn btn-sm btn-danger">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <i class="ti-trash"></i>
                                            </div>
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
</template>

<script>
export default {
    data() {
        return {
            portofolio: {},
        };
    },
    mounted() {
        axios.get("/api/portofolio/").then((response) => {
            this.portofolio = response.data;
        });
    },
    methods: {
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
                        let uri = `/api/portofolio/${id}`;
                        this.axios.delete(uri).then((response) => {
                            this.$swal.fire({ title: "Success!", text: "Angkatan deleted successfully", icon: "success", timer: 1000 });
                            this.portofolio.data.splice(this.portofolio.data.indexOf(id), 1);
                        });
                        this.$router.push({ name: "portofolio" });
                    }
                });
        },
        redirectCheck: function (id) {
            axios.get("/api/portofolio/" + id).then((response) => {
                if (response.data.data.status === 0) {
                    this.$router.push({ name: "portofolioEdit", params: { id: id } });
                } else {
                    this.$swal
                        .fire({
                            title: "Apakah kamu yakin?",
                            text: "Jika anda mengedit data yang sudah tervalidasi, maka data point akan tereset ke 0 kembali.",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Yakin",
                            cancelButtonText: "Batal",
                        })
                        .then((result) => {
                            if (result.value) {
                                this.$router.push({ name: "portofolioEdit", params: { id: id } });
                            }
                        });
                }
            });
        },
    },
};
</script>

