<template>
    <div>
        <div class="col-md-12 mb-3">
            <h3>Mahasiswa</h3>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
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
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Pembimbing Akademik</th>
                                    <th>Fakultas</th>
                                    <th>Jurusan</th>
                                    <th>Program Studi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Jacob</td>
                                    <td>20202020</td>
                                    <td>Peembimbing Akademik</td>
                                    <td>Teknik dan Kejuruan</td>
                                    <td>Teknik Informatik</td>
                                    <td>Ilmu Komputer</td>
                                    <td>
                                        <form action="" method="POST" class="d-inline btn-group">
                                            <a href="" class="btn btn-sm btn-warning rounded-left">
                                                <i class="ti-pencil-alt"></i>
                                            </a>
                                            <button class="btn btn-sm btn-danger rounded-right show-delete-confirm" type="submit">
                                                <i class="ti-trash"></i>
                                            </button>
                                        </form>
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