<template>
    <div>
        <div class="col-md-12 mb-3">
            <h3>Detail Portofolio</h3>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Nama Kegiatan</th>
                                    <th class="text-center">Kategori</th>
                                    <th class="text-center">Jenis</th>
                                    <th class="text-center">Penyelenggara</th>
                                    <th class="text-center" width="50">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="portofolio.data.length !== 0">
                                    <tr v-for="(item, index) in portofolio.data" :key="index">
                                        <td class="text-center">{{ item.nama_kegiatan }}</td>
                                        <td class="text-center">{{ item.kategori_kegiatan }}</td>
                                        <td class="text-center">{{ item.jenis_kegiatan }}</td>
                                        <td class="text-center">{{ item.penyelenggara }}</td>
                                        <td class="text-center">
                                            <router-link :to="{ name: 'validasiPortofolio', params: { id: item.id } }" class="btn btn-sm btn-success" type="submit">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <i class="ti-bookmark-alt"></i>
                                                </div>
                                            </router-link>
                                        </td>
                                    </tr>
                                </template>
                                <template v-else>
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak Ada Portofolio yang Harus Divalidasi Untuk Mahasiswa Terkait</td>
                                    </tr>
                                </template>
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
        axios.get("/api/portofolio/byNim/" + this.$route.params.nim).then((response) => {
            this.portofolio = response.data;
        });
    },
};
</script>