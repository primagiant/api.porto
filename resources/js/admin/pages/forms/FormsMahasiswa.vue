<template>
    <div>
        <div class="col-md-12">
            <h3 v-if="$route.params.id" class="card-title">Edit Mahasiswa</h3>
            <h3 v-else class="card-title">Tambah Mahasiswa</h3>
        </div>
        <form @submit.prevent="saveData">
            <div class="row">
                <div class="grid-margin stretch-card col-md-6">
                    <div class="card rounded-lg">
                        <div class="card-body">
                            <div>
                                <div class="form-group">
                                    <label for="nim">NIM</label>
                                    <input v-model="datas.nim" type="text" autofocus class="form-control" :class="{ 'is-invalid': invalid }" placeholder="NIM" />
                                    <div v-if="errors.nim" class="invalid-feedback">
                                        {{ errors.name[0] }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name">Nama Mahasiswa</label>
                                    <input v-model="datas.name" type="text" autofocus class="form-control" :class="{ 'is-invalid': invalid }" placeholder="Nama Mahasiswa" />
                                    <div v-if="errors.name" class="invalid-feedback">
                                        {{ errors.name[0] }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="fakultas_id">Fakultas</label>
                                    <select v-model="selectedFakultas" class="form-control">
                                        <option disabled value="">Select Fakultas</option>
                                        <option v-for="item in fakultas.data" :key="item.id" :value="item.id">{{ item.nama_fakultas }}</option>
                                    </select>
                                    <div v-if="errors.fakultas_id" class="invalid-feedback">
                                        {{ errors.fakultas_id[0] }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="jurusan_id">Jurusan</label>
                                    <select v-model="selectedJurusan" class="form-control">
                                        <option disabled value="">Select Jurusan</option>
                                        <option v-for="item in jurusan.data" :key="item.id" :value="item.id">{{ item.nama_jurusan }}</option>
                                    </select>
                                    <div v-if="errors.jurusan_id" class="invalid-feedback">
                                        {{ errors.jurusan_id[0] }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="prodi_id">Prodi</label>
                                    <select v-model="selectedProdi" class="form-control">
                                        <option disabled value="">Select Prodi</option>
                                        <option v-for="item in prodi.data" :key="item.id" :value="item.id">{{ item.nama_prodi }}</option>
                                    </select>
                                    <div v-if="errors.prodi_id" class="invalid-feedback">
                                        {{ errors.prodi_id[0] }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="angkatan_id">Angkatan</label>
                                    <select v-model="datas.angkatan_id" class="form-control">
                                        <option disabled value="">Select Angkatan</option>
                                        <option v-for="item in angkatan.data" :key="item.id" :value="item.id">{{ item.tahun }}</option>
                                    </select>
                                    <div v-if="errors.angkatan_id" class="invalid-feedback">
                                        {{ errors.angkatan_id[0] }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="angkatan_id">Pembimbing Akademik</label>
                                    <select v-model="datas.pembimbing_akademik_id" class="form-control">
                                        <option disabled value="">Select Pembimbing Akademik</option>
                                        <option v-for="item in pa.data" :key="item.id" :value="item.id">{{ item.nama }}</option>
                                    </select>
                                    <div v-if="errors.angkatan_id" class="invalid-feedback">
                                        {{ errors.angkatan_id[0] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card rounded-lg">
                        <div class="card-body">
                            <div>
                                <div class="form-group">
                                    <label for="nama">Email</label>
                                    <input v-model="datas.email" type="email" autofocus class="form-control" :class="{ 'is-invalid': invalid }" name="nama" placeholder="Email" />
                                    <div v-if="errors.nama" class="invalid-feedback">
                                        {{ errors.nama[0] }}
                                    </div>
                                </div>

                                <div v-if="!$route.params.id" class="form-group">
                                    <label for="nama">Password</label>
                                    <input v-model="datas.password" type="password" class="form-control" :class="{ 'is-invalid': invalid }" name="nama" placeholder="Password" />
                                    <div v-if="errors.password" class="invalid-feedback">
                                        {{ errors.password[0] }}
                                    </div>
                                </div>

                                <div v-if="!$route.params.id" class="form-group">
                                    <label for="nama">Konfirmasi Password</label>
                                    <input v-model="datas.password_confirmation" type="password" class="form-control" :class="{ 'is-invalid': invalid }" name="nama" placeholder="Konfirmasi Password" />
                                    <div v-if="errors.password_confirmation" class="invalid-feedback">
                                        {{ errors.password_confirmation[0] }}
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                <router-link :to="{ name: 'mahasiswa' }" class="btn btn-light">Kembali</router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            fakultas: {},
            jurusan: {},
            prodi: {},
            angkatan: {},
            pa: {},
            datas: {
                nim: null,
                name: null,
                fakultas_id: null,
                jurusan_id: null,
                prodi_id: null,
                angkatan_id: "",
                pembimbing_akademik_id: "",
                email: null,
                password: null,
                password_confirmation: null,
            },
            errors: {},
            selectedFakultas: "",
            selectedJurusan: "",
            selectedProdi: "",
            invalid: false,
        };
    },
    mounted() {
        axios.get("/api/mahasiswa/").then((response) => {
            this.mahasiswa = response.data;
        });
        axios.get("/api/fakultas/").then((response) => {
            this.fakultas = response.data;
        });
        axios.get("/api/angkatans").then((response) => {
            this.angkatan = response.data;
        });
        axios.get("/api/pembimbingakademik/").then((response) => {
            this.pa = response.data;
        });
        if (this.$route.params.id) {
            this.axios.get("/api/mahasiswa/" + this.$route.params.id).then((response) => {
                console.log(response.data);
                this.datas.nim = response.data.data.nim;
                this.datas.name = response.data.data.nama;
                this.selectedFakultas = response.data.data.fakultas_id;
                this.selectedJurusan = response.data.data.jurusan_id;
                this.selectedProdi = response.data.data.prodi_id;
                this.datas.email = response.data.data.user.email;
                this.datas.tahun = response.data.data.tahun;
                this.datas.pembimbing_akademik_id = response.data.data.pembimbing_akademik_id;
                console.log(response.data.data);
            });
        }
    },

    watch: {
        selectedFakultas: function (value) {
            axios.get("/api/jurusan/byFakultas/" + this.selectedFakultas).then((response) => {
                this.jurusan = response.data;
                this.datas.fakultas_id = this.selectedFakultas;
            });
        },
        selectedJurusan: function (value) {
            axios.get("/api/prodi/byJurusan/" + this.selectedJurusan).then((response) => {
                this.prodi = response.data;
                this.datas.jurusan_id = this.selectedJurusan;
            });
        },
        selectedProdi: function (value) {
            this.datas.prodi_id = this.selectedProdi;
        },
    },
    methods: {
        saveData: function (e) {
            e.preventDefault();
            if (this.$route.params.id) {
                axios
                    .put("/api/mahasiswa/" + this.$route.params.id, this.datas)
                    .then((response) => {
                        this.$swal.fire({ title: "Success!", text: response.data.message, icon: "success", timer: 1000 });
                        this.$router.push({ name: "mahasiswa" });
                    })
                    .catch((error) => {
                        this.errors = error.response.data;
                        this.invalid = true;
                    });
            } else {
                axios
                    .post("/api/mahasiswa/", this.datas)
                    .then((response) => {
                        this.$swal.fire({ title: "Success!", text: response.data.message, icon: "success", timer: 1000 });
                        this.$router.push({ name: "mahasiswa" });
                    })
                    .catch((error) => {
                        this.errors = error.response.data;
                        this.invalid = true;
                    });
            }
        },
    },
};
</script>