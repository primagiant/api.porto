<template>
    <div>
        <div class="col-md-12 mb-3">
            <h3>Kegiatan</h3>
        </div>
        <div class="col-md-12 rounded">
            <div class="card">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <!-- loop 1 -->
                        <li v-for="(kategori_kegiatan, index) in kegiatan" :key="index" class="list-group-item">
                            <strong>{{ kategori_kegiatan.nama }}</strong>
                            <!-- loop 2 -->
                            <ul v-for="(jenis_kegiatan, index) in kategori_kegiatan.jenis_kegiatan" :key="index" class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>{{ jenis_kegiatan.nama }}</span>
                                    <strong>{{ jenis_kegiatan.ref_point }}</strong>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- <div class="d-flex justify-content-between align-items-center mt-4 px-3">
                        <small class="text-secondary">Showing {{ $kegiatan->firstItem() }} to {{ $kegiatan->lastItem() }} of {{ $kegiatan->total() }} results.</small>
                        {{ $kegiatan->links() }}
                    </div> -->
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