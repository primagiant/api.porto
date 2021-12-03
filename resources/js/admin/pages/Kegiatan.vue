<template>
    <div>
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="page-title">Kegiatan</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <router-link :to="{ name: 'dashboard' }">Dashboard</router-link>
                        </li>
                        <li class="breadcrumb-item active">Kegiatan</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-12 rounded">
            <div class="card">
                <div class="card-body">
                    <ul v-for="(item, index) in kegiatan" :key="index" class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>{{ item.nama }}</strong>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span></span>
                                    <strong></strong>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            kegiatan: {},
        };
    },
    mounted() {
        axios.get("/api/kegiatan").then((response) => {
            this.kegiatan = response.data.data;
            console.log(this.kegiatan);
        });
    },
};
</script>