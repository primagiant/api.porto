<template>
    <div>
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Welcome {{ mhs.nama }}</h3>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="mdi mdi-calendar"></i>
                                    Semester ( 1 )
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                    <button class="dropdown-item">1</button>
                                    <button class="dropdown-item">2</button>
                                    <button class="dropdown-item">3</button>
                                    <button class="dropdown-item">4</button>
                                    <button class="dropdown-item">5</button>
                                    <button class="dropdown-item">6</button>
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
                        <div class="card card-tale csr-pointer">
                            <div class="card-body">
                                <p class="mb-4">Point Terkumpul</p>
                                <p class="fs-30 mb-2">{{ mhs.totalSkor }}</p>
                                <p>Portofolio</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-dark-blue csr-pointer">
                            <div class="card-body">
                                <p class="mb-4">Total Portofolio</p>
                                <p class="fs-30 mb-2">{{ totalPortofolio }}</p>
                                <p>Portofolio</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                        <div class="card card-light-blue">
                            <div class="card-body">
                                <p class="mb-4">Sudah Tervalidasi</p>
                                <p class="fs-30 mb-2">{{ valid }}</p>
                                <p>Portofolio</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 stretch-card transparent">
                        <div class="card card-light-danger">
                            <div class="card-body">
                                <p class="mb-4">Belum Tervalidasi</p>
                                <p class="fs-30 mb-2">{{ belumValid }}</p>
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
                            <p class="card-title">Laporan Point</p>
                            <a href="#" class="text-info">View all</a>
                        </div>
                        <p class="font-weight-500">Total point yang terkumpul setiap semesternya.</p>
                        <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                        <canvas id="sales-chart"></canvas>
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
            mhs: {},
            belumValid: 0,
            valid: 0,
            totalPortofolio: 0,
        };
    },
    mounted() {
        axios.get("/api/portofolio").then((response) => {
            this.portofolio = response.data.data;
            this.portofolio.forEach((e) => {
                if (e.status === 1) {
                    this.valid++;
                } else {
                    this.belumValid++;
                }
                this.totalPortofolio++;
            });
        });
        axios.get("/api/mahasiswa").then((response) => {
            this.mhs = response.data.data;
        });
    },
};
</script>
