<template>
    <div>
        <div class="col-md-12 mb-3">
            <h3>Validasi Portofolio</h3>
        </div>
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form @submit.prevent="validasi" class="forms-sample">
                        <div class="form-group row">
                            <label for="nama_kegiatan" class="col-sm-3 col-form-label">Nama Kegiatan</label>
                            <div class="col-sm-9">
                                <input disabled type="text" :value="portofolio.nama_kegiatan" class="form-control" id="nama_kegiatan" placeholder="Nama Kegiatan" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="penyelenggara" class="col-sm-3 col-form-label">Penyelenggara</label>
                            <div class="col-sm-9">
                                <input disabled type="text" :value="portofolio.penyelenggara" class="form-control" id="penyelenggara" placeholder="Penyelenggara" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kategori_kegiatan" class="col-sm-3 col-form-label">Kategori Kegiatan</label>
                            <div class="col-sm-9">
                                <input disabled type="text" :value="portofolio.kategori_kegiatan" class="form-control" id="kategori_kegiatan" placeholder="Kategori Kegiatan" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_kegiatan" class="col-sm-3 col-form-label">Jenis Kegiatan</label>
                            <div class="col-sm-9">
                                <input disabled type="text" :value="portofolio.jenis_kegiatan" class="form-control" id="jenis_kegiatan" placeholder="Jenis Kegiatan" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_kegiatan" class="col-sm-3 col-form-label">Bukti</label>
                            <div class="col-sm-9">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-primary d-inline-flex justify-content-center align-items-center" data-toggle="modal" data-target="#exampleModal">
                                    <i class="ti-eye"></i>
                                    <small class="ml-2">Lihat Bukti</small>
                                </button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ref_point" class="col-sm-3 col-form-label">Ref Point</label>
                            <div class="col-sm-3">
                                <input disabled type="text" :value="portofolio.ref_point" class="form-control" id="ref_point" placeholder="Ref Point" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="valid_point" class="col-sm-3 col-form-label">Valid Point</label>
                            <div class="col-sm-3">
                                <input autofocus v-model="validPoint" type="number" class="form-control" id="valid_point" placeholder="Valid Point" />
                            </div>
                            <div v-if="errors.valid_point" class="invalid-feedback">
                                {{ errors.valid_point[0] }}
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <router-link :to="{ name: 'detailMahasiswa', params: { nim: this.portofolio.mahasiswa.nim } }" class="btn btn-light">Kembali</router-link>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <!-- <div class="modal-body"> -->
                    <div v-if="checkExtension(this.portofolio.bukti) == 'pdf'" class="embed-responsive embed-responsive-21by9">
                        <iframe :src="'/storage/' + this.portofolio.bukti" class="embed-responsive-item" allowfullscreen style="border: none" width="100%"></iframe>
                    </div>
                    <div v-else class="d-flex justify-content-center align-items-center collapse-hidden">
                        <img :src="'/storage/' + this.portofolio.bukti" alt="modal image" />
                    </div>
                    <!-- </div> -->
                </div>
                <div class="mt-3 d-flex justify-content-center align-items-center">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Close</button>
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
            validPoint: null,
            errors: {},
        };
    },
    created() {
        axios.get("/api/portofolio/" + this.$route.params.id).then((response) => {
            this.portofolio = response.data.data;
            if (this.portofolio.status == 1) {
                this.$router.push({ name: "detailMahasiswa", params: { nim: this.portofolio.mahasiswa.nim } });
            }
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
                    let formData = new FormData();
                    formData.append("valid_point", parseInt(this.validPoint, 10));
                    if (result.value) {
                        axios
                            .post("/api/portofolio/validasi/" + this.$route.params.id, formData)
                            .then((response) => {
                                this.$swal.fire({ title: "Success!", text: "Portofolio Tervalidasi", icon: "success", timer: 1000 });
                            })
                            .catch((error) => {
                                this.errors = error.response.data;
                                console.log(this.errors);
                            });
                        this.$router.push({ name: "detailMahasiswa", params: { nim: this.portofolio.mahasiswa.nim } });
                    }
                });
        },
        checkExtension: function (src) {
            return src.split(".").pop();
        },
    },
};
</script>