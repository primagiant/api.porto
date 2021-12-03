<template>
    <div>
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Tambah Angkatan</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <router-link :to="{ name: 'dashboard' }">Dashboard</router-link>
                        </li>
                        <li class="breadcrumb-item active"><router-link :to="{ name: 'angkatan' }">Angkatan</router-link></li>
                        <li class="breadcrumb-item active">Tambah Angkatan</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form @submit.prevent="saveData">
                            <div class="form-group">
                                <label>Tahun Angkatan</label>
                                <input type="number" class="form-control" autofocus />
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
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
            tahun: "",
        };
    },
    mounted() {},
    methods: {
        saveData: function (e) {
            e.preventDefault();
        },
    },
};
</script>