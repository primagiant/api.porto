<template>
    <div>
        <div class="col-md-12 mb-3">
            <h3>Data Portofolio Mahasiswa</h3>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <router-link :to="{ name: 'angkatanCreate' }" class="btn btn-primary mb-3">
                        <i class="icon-plus mr-2"></i>
                        Tambah Data
                    </router-link>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Nama Kegiatan</th>
                                    <th class="text-center">Kategori</th>
                                    <th class="text-center">Jenis</th>
                                    <th class="text-center">Penyelenggara</th>
                                    <th class="text-center">Point</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center" width="50">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in portofolio.data" :key="index">
                                    <td class="text-center">{{ item.nama_kegiatan }}</td>
                                    <td class="text-center">{{ item.kategori_kegiatan }}</td>
                                    <td class="text-center">{{ item.jenis_kegiatan }}</td>
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
                                        <router-link to="" class="btn btn-sm btn-warning" type="submit">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <i class="ti-bookmark-alt"></i>
                                            </div>
                                        </router-link>
                                        <router-link v-if="item.status == 0" to="" class="btn btn-sm btn-danger" type="submit">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <i class="ti-trash"></i>
                                            </div>
                                        </router-link>
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
    methods: {},
};
</script>

