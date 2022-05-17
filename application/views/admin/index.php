<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Selamat datang <?= $get_user['name']; ?></h1>


    <div class="row">


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                JUMLAH ANGGOTA</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_user; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-address-book fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                STOK BUKU TERDAFTAR</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_book; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                BUKU DI PINJAM</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_book_dipinjam; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tag fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                BUKU DI BOOKING</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_book_dibooking; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <hr class="sidebar-divider">


    <div class="box-wrapper">

        <section>
            <h1 class="h3 mb-4 text-gray-800">Pengguna terdaftar</h1>

            <!-- <a href="<?= site_url('admin/anggota'); ?>" class="btn btn-dark mb-3"><i class="fas fa-plus"> Tambah anggota</i> </a> -->

            <?php if ($this->session->flashdata('message_success')) : ?>
                <div class="notification-fb">
                    <div class="alert alert-success  alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('message_success'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-xl">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Created_at</th>
                                    <th>Updated_at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($user as $row) : ?>

                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['email']; ?></td>
                                        <td><?= $row['name']; ?></td>
                                        <td>
                                            <!-- <?= ($row['id_role'] == 1) ? $row['role'] : $row['role']; ?> -->

                                            <?php if ($row['id_role'] == 1) : ?>
                                                <p class="text-dark" style="font-weight: bold;"><?= $row['role']; ?></p>
                                            <?php else : ?>
                                                <p class="text-dark" style="font-weight: bold;"><?= $row['role']; ?></p>
                                            <?php endif; ?>

                                        </td>
                                        <td>
                                            <?php if ($row['is_active'] == 1) : ?>
                                                <p class="text-success">Aktif</p>
                                            <?php else : ?>
                                                <p class="text-danger">Tidak Aktif</p>
                                            <?php endif; ?>

                                        </td>
                                        <td><?= date('Y-m-d H:i:s', $row['created_at']); ?></td>
                                        <td><?= date('Y-m-d H:i:s', $row['updated_at']); ?></td>
                                        <td>
                                            <span class="d-inline">
                                                <button type="button" data-delete-url="<?= site_url('admin/delete_user/' . $row['id_user']); ?>" onclick="deleteConfirm(this)" title="hapus" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> </button>
                                                <!-- <button type="button" title="edit" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i> </button> -->
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </section>

    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function deleteConfirm(e) {
        Swal.fire({
            title: 'Delete Confirm?',
            text: 'Apakah kamu yakin menghapus anggota ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, deleted!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.assign(e.dataset.deleteUrl);
            }
        })
    }
</script>