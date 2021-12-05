<template>
    <div>
        <div class="col mb-3 ml-2">
            <h3>Jurusan</h3>
        </div>
        <div class="col grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <a href="" class="btn btn-primary mb-3">
                        <i class="icon-plus mr-2"></i>
                        Tambah Data
                    </a>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Jurusan</th>
                                    <th>Nama Fakultas</th>
                                    <th style="width: 16.66%">Deskripsi</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in jurusan" :key="index">
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ item.nama_fakultas }}</td>
                                    <td>{{ item.nama_jurusan }}</td>
                                    <td>{{ item.deskripsi }}</td>
                                    <td class="text-center">
                                        <div class="d-inline btn-group">
                                            <a href="" class="btn btn-sm btn-warning rounded-left">
                                                <i class="ti-pencil-alt"></i>
                                            </a>
                                            <button class="btn btn-sm btn-danger rounded-right" type="submit">
                                                <i class="ti-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- <div class="d-flex justify-content-between align-items-center mt-4 px-3">
                            <small class="text-secondary">Showing {{ $fakultas->firstItem() }} to {{ $fakultas->lastItem() }} of {{ $fakultas->total() }} results.</small>
                            {{ $fakultas->links() }}
                        </div> -->
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
            jurusan: "",
        };
    },
};
</script>