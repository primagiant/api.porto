<template>
    <div>
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Welcome {{ pembimbingAkademik.nama }}</h3>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="mdi mdi-calendar"></i>
                                    Angkatan ( {{ selectedAngkatan }} )
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                    <div v-for="(item, index) in angkatan" :key="index">
                                        <button @click="filterAngkatan(item.id)" class="dropdown-item" href="#">{{ item.tahun }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin transparent">
                <div class="row">
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-tale csr-pointer" @click="redirectToPerluValidasi()">
                            <div class="card-body">
                                <p class="mb-4">Perlu Divalidasi</p>
                                <p class="fs-30 mb-2">{{ perluValidasi }}</p>
                                <p>Portofolio</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-dark-blue csr-pointer" @click="redirectToSudahValidasi()">
                            <div class="card-body">
                                <p class="mb-4">Sudah Divalidasi</p>
                                <p class="fs-30 mb-2">{{ sudahValidasi }}</p>
                                <p>Portofolio</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                        <div class="card card-light-blue">
                            <div class="card-body">
                                <p class="mb-4">Banyaknya Portofolio</p>
                                <p class="fs-30 mb-2">{{ totalPortofolio }}</p>
                                <p>Portofolio</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 stretch-card transparent">
                        <div class="card card-light-danger">
                            <div class="card-body">
                                <p class="mb-4">Mahasiswa Diampu</p>
                                <p class="fs-30 mb-2">{{ banyakMahasiswa }}</p>
                                <p>Mahasiswa</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <p class="card-title">Report</p>
                            <a href="#" class="text-info">View all</a>
                        </div>
                        <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                        <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                        <canvas id="sales-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card position-relative">
                    <div class="card-body">
                        <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-md-12 grid-margin stretch-card">
                                            <div class="card">
                                                <div class="card-body">
                                                    <p class="card-title mb-0">Top Mahasiswa</p>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-borderless">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Nim</th>
                                                                    <th>Nama</th>
                                                                    <th>Skor</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <template v-if="isThereMahasiswaAngkatan === true">
                                                                    <tr v-for="(item, index) in mahasiswa.data" :key="index">
                                                                        <td>{{ index + 1 }}</td>
                                                                        <td class="font-weight-bold">{{ item.nim }}</td>
                                                                        <td>{{ item.nama }}</td>
                                                                        <td class="font-weight-medium">{{ item.totalSkor }}</td>
                                                                    </tr>
                                                                </template>
                                                                <tr v-else>
                                                                    <td colspan="4" class="text-center">Tidak ada Data Mahasiswa</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                                            <div class="ml-xl-4 mt-3">
                                                <p class="card-title">Detailed Reports</p>
                                                <h1 class="text-primary">$34040</h1>
                                                <h3 class="font-weight-500 mb-xl-4 text-primary">North America</h3>
                                                <p class="mb-2 mb-xl-0">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xl-9">
                                            <div class="row">
                                                <div class="col-md-6 border-right">
                                                    <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                        <table class="table table-borderless report-table">
                                                            <tr>
                                                                <td class="text-muted">Illinois</td>
                                                                <td class="w-100 px-0">
                                                                    <div class="progress progress-md mx-4">
                                                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td><h5 class="font-weight-bold mb-0">713</h5></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">Washington</td>
                                                                <td class="w-100 px-0">
                                                                    <div class="progress progress-md mx-4">
                                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td><h5 class="font-weight-bold mb-0">583</h5></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">Mississippi</td>
                                                                <td class="w-100 px-0">
                                                                    <div class="progress progress-md mx-4">
                                                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td><h5 class="font-weight-bold mb-0">924</h5></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">California</td>
                                                                <td class="w-100 px-0">
                                                                    <div class="progress progress-md mx-4">
                                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td><h5 class="font-weight-bold mb-0">664</h5></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">Maryland</td>
                                                                <td class="w-100 px-0">
                                                                    <div class="progress progress-md mx-4">
                                                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td><h5 class="font-weight-bold mb-0">560</h5></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted">Alaska</td>
                                                                <td class="w-100 px-0">
                                                                    <div class="progress progress-md mx-4">
                                                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td><h5 class="font-weight-bold mb-0">793</h5></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <canvas id="south-america-chart"></canvas>
                                                    <div id="south-america-legend"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#detailedReports" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#detailedReports" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
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
            pembimbingAkademik: {},
            angkatan: {},
            selectedAngkatan: "",
            perluValidasi: 0,
            sudahValidasi: 0,
            totalPortofolio: 0,
            banyakMahasiswa: 0,
            mahasiswa: {},
            isThereMahasiswaAngkatan: false,
        };
    },
    mounted() {
        axios.get("/api/pembimbingakademik").then((response) => {
            this.pembimbingAkademik = response.data.data;
        });
        axios.get("/api/angkatan").then((response) => {
            this.angkatan = response.data.data;
            this.selectedAngkatan = this.angkatan[0].tahun;
            this.filterAngkatan(this.angkatan[0].id);
        });
        this.calculateValidation();
    },
    methods: {
        filterAngkatan(id) {
            for (let i in this.angkatan) {
                if (this.angkatan[i].id == id) {
                    this.selectedAngkatan = this.angkatan[i].tahun;
                }
            }
            axios.get("/api/mahasiswa/topMahasiswa/" + id).then((response) => {
                this.mahasiswa = response.data;
                if (response.data.data.length !== 0) {
                    this.isThereMahasiswaAngkatan = true;
                } else {
                    this.isThereMahasiswaAngkatan = false;
                }
            });
        },
        calculateValidation() {
            axios.get("/api/mahasiswa").then((response) => {
                for (let i = 0; i < response.data.data.length; i++) {
                    axios.get("/api/portofolio/byNim/" + response.data.data[i].nim).then((res) => {
                        this.perluValidasi += res.data.data.perluValidasi.length;
                        this.sudahValidasi += res.data.data.sudahValidasi.length;
                        this.totalPortofolio = this.perluValidasi + this.sudahValidasi;
                    });
                }
                this.banyakMahasiswa = response.data.data.length;
            });
        },
        redirectToPerluValidasi() {
            this.$router.push({ name: "perluValidasi" });
        },
        redirectToSudahValidasi() {
            this.$router.push({ name: "sudahValidasi" });
        },
    },
};
</script>

<style scoped>
.csr-pointer {
    cursor: pointer;
}
</style>