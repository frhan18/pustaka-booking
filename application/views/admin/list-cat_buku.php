<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="box-wrapper">
        <section>
            <h1 class="h3 mb-1 text-gray-800">Data Kategori Buku</h1>
            <button type="button" data-toggle="modal" data-target="#modalTambah" class="btn btn-xs btn-dark mb-3"><i class="fas fa-plus"></i> Tambah Kategori Buku </button>

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

            <hr class="sidebar-divider">

            <div class="row pt-3">
                <div class="col-xl">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kategori Buku</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php
                                $no = 1;
                                foreach ($cat_buku as $cb) : ?>

                                    <tr>
                                        <td style="vertical-align: middle;"><?= $no++; ?></td>
                                        <td style="vertical-align: middle;"><?= $cb['nama_kategori']; ?></td>
                                        <td style="vertical-align: middle;">
                                            <span class="d-inline">
                                                <button type="button" data-delete-url="<?= site_url('admin/hapus_cat_buku/' . $cb['id_kategori']); ?>" onclick="deleteConfirm(this)" title="hapus" class="btn btn-danger">Hapus </button>
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



<!-- Modal tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahLabel">TAMBAH DAFTAR KATEGORI BUKU </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?= form_open_multipart('admin/tambah_cat_buku'); ?>

                <div class="form-group row">
                    <label for="nama_kategori" class="col-sm-3 col-form-label">Nama Kategori</label>
                    <div class="col-sm-9">
                        <input type="text" name="nama_kategori" value="<?= set_value('nama_kategori'); ?>" class="form-control <?= form_error('nama_kategori') ? 'is-invalid' : ''; ?>" id="nama_kategori" required>
                        <div class="invalid-feedback"><?= form_error('nama_kategori'); ?></div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Kategori Buku</button>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>