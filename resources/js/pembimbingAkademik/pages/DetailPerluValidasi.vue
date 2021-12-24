<template>
    <div>
        <div class="col-md-12 mb-3">
            <h3>Detail Portofolio Non Valid</h3>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <form @submit.prevent="validasi" class="card-body">
                    <button type="submit" class="btn btn-primary mb-3">Validasi Semua Portofolio</button>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Nama Kegiatan</th>
                                    <th class="text-center">Tahun</th>
                                    <th class="text-center">Penyelenggara</th>
                                    <th class="text-center th-width">Point Referensi</th>
                                    <th class="text-center th-width">Valid Point</th>
                                    <th class="text-center" width="50">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in portofolio.data" :key="index">
                                    <td class="text-center">{{ item.nama_kegiatan }}</td>
                                    <td class="text-center">{{ item.tahun }}</td>
                                    <td class="text-center">{{ item.penyelenggara }}</td>
                                    <td class="text-center">{{ item.ref_point }}</td>
                                    <td class="text-center">
                                        <input class="form-control text-center" v-model.number="portofolioPoint[index]" type="number" min="0" />
                                    </td>
                                    <td class="text-center">
                                        <button type="button" data-toggle="modal" :data-target="'#exampleModal' + index" class="btn btn-sm btn-primary">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <i class="ti-eye"></i>
                                            </div>
                                        </button>
                                    </td>
                                    <!-- Modal -->
                                    <div class="modal fade" :id="'exampleModal' + index" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div v-if="checkExtension(item.bukti) == 'pdf'" class="embed-responsive embed-responsive-21by9">
                                                    <iframe :src="'/storage/' + item.bukti" class="embed-responsive-item" allowfullscreen style="border: none" width="100%"></iframe>
                                                </div>
                                                <div v-else class="d-flex justify-content-center align-items-center collapse-hidden">
                                                    <img :src="'/storage/' + item.bukti" alt="modal image" />
                                                </div>
                                            </div>
                                            <div class="mt-3 d-flex justify-content-center align-items-center">
                                                <button type="button" class="btn btn-sm btn-primary d-inline-flex justify-content-center align-items-center" data-toggle="modal" data-target="#exampleModal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal -->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            portofolio: {},
            portofolioPoint: [],
            isCheckAll: false,
        };
    },
    mounted() {
        axios.get("/api/portofolio/byNim/" + this.$route.params.nim).then((response) => {
            this.portofolio = response.data;
        });
    },
    methods: {
        validasi: function (e) {
            e.preventDefault();
            this.$swal
                .fire({
                    title: "Apakah kamu yakin?",
                    text: "Jika anda validasi, maka data tidak akan bisa diperbarui lagi.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Validasi",
                    cancelButtonText: "Batal",
                })
                .then((result) => {
                    for (let i in this.portofolio.data) {
                        let formData = new FormData();
                        formData.append("valid_point", this.portofolioPoint[i]);
                        if (result.value) {
                            axios.post("/api/portofolio/validasi/" + this.portofolio.data[i].id, formData);
                        }
                    }
                    this.$swal.fire({ title: "Success!", text: "Portofolio Tervalidasi", icon: "success", timer: 1000 });
                    this.$router.push({ name: "detailMahasiswa", params: { nim: this.portofolio.data[0].mahasiswa.nim } });
                });
        },
        checkExtension: function (src) {
            return src.split(".").pop();
        },
    },
};
</script>

<style scoped>
.th-width {
    width: 150px;
}
</style>