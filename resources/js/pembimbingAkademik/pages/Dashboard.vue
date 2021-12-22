<template>
    <div>
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Selamat Datang {{ pembimbingAkademik.nama }}</h3>
                        <h6 class="font-weight-normal mb-0">
                            All systems are running smoothly! You have
                            <span class="text-primary">3 unread alerts!</span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <p class="card-title">Laporan Point</p>
                        </div>
                        <p class="font-weight-500">Total point yang terkumpul setiap semesternya.</p>
                        <div class="d-flex justify-content-center align-items-center mt-3 pt-3">
                            <h1>chart</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-tale">
                            <div class="card-body">
                                <p class="mb-4">Point Terkumpul</p>
                                <p class="fs-30 mb-2">{{ totalPoint }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-dark-blue">
                            <div class="card-body">
                                <p class="mb-4">Total Portofolio</p>
                                <p class="fs-30 mb-2">{{ totalPortofolio }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-light-blue">
                            <div class="card-body">
                                <p class="mb-4">Sudah Tervalidasi</p>
                                <p class="fs-30 mb-2">{{ valid }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 stretch-card transparent">
                        <div class="card card-light-danger">
                            <div class="card-body">
                                <p class="mb-4">Belum Tervalidasi</p>
                                <p class="fs-30 mb-2">{{ belumValid }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            // portofolio: {},
            pembimbingAkademik: {},
            // totalPoint: 0,
            // belumValid: 0,
            // valid: 0,
            // totalPortofolio: 0,
        };
    },
    mounted() {
        // axios.get("/api/portofolio").then((response) => {
        //     this.portofolio = response.data.data;
        //     this.portofolio.forEach((e) => {
        //         this.totalPoint += e.valid_point;
        //         if (e.status === 1) {
        //             this.valid++;
        //         } else {
        //             this.belumValid++;
        //         }
        //         this.totalPortofolio++;
        //     });
        // });
        axios.get("/api/pembimbingakademik").then((response) => {
            this.pembimbingAkademik = response.data.data;
        });
    },
};
</script>
