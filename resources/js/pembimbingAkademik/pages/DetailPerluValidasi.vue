<template>
    <div>
        <div class="col-md-12 mb-3">
            <h3>Detail Portofolio Non Valid</h3>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" width="10"><input type="checkbox" @click="checkAll()" v-model="isCheckAll" /></th>
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
                                    <td class="text-center"><input type="checkbox" v-model="selected" @change="updateCheckall()" /></td>
                                    <td class="text-center">{{ item.nama_kegiatan }}</td>
                                    <td class="text-center">{{ item.tahun }}</td>
                                    <td class="text-center">{{ item.penyelenggara }}</td>
                                    <td class="text-center">{{ item.ref_point }}</td>
                                    <td class="text-center">
                                        <input class="form-control" type="number" min="0" max="50" />
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-primary">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <i class="ti-eye"></i>
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
            selected: {},
            isCheckAll: false,
        };
    },
    mounted() {
        axios.get("/api/portofolio/byNim/" + this.$route.params.nim).then((response) => {
            this.portofolio = response.data;
        });
    },
    methods: {
        checkAll: function () {
            this.isCheckAll = !this.isCheckAll;
            this.selected = [];
            if (this.isCheckAll) {
                for (let key in this.portofolio.data) {
                    this.selected.push(this.portofolio.data[key]);
                    console.log(this.selected);
                }
            }
        },
        updateCheckall: function () {
            if (this.selected.length == this.portofolio.length) {
                this.isCheckAll = true;
            } else {
                this.isCheckAll = false;
            }
        },
    },
};
</script>

<style scoped>
.th-width {
    width: 150px;
}
</style>