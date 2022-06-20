<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="box-wrapper">
        <section>
            <h1 class="h3 mb-1 text-gray-800">Data Buku</h1>
            <button type="button" data-toggle="modal" data-target="#modalTambah" class="btn btn-xs btn-dark mb-3"><i class="fas fa-plus"></i> Tambah Buku</button>

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
                                    <th>Sampul</th>
                                    <th>Kategori</th>
                                    <th>Pengarang</th>
                                    <th>Penerbit</th>
                                    <th>Isbn</th>
                                    <th>Tahun Terbit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php
                                $no = 1;
                                foreach ($get_buku as $gb) : ?>

                                    <tr>
                                        <td style="vertical-align: middle;"><?= $no++; ?></td>
                                        <td style="vertical-align: middle;">
                                            <img src="<?= base_url('/upload/' . $gb['image']); ?>" class="img-thumbnail" width="80">
                                        </td>
                                        <td style="vertical-align: middle;"><?= $gb['nama_kategori']; ?></td>
                                        <td style="vertical-align: middle;"><?= $gb['pengarang']; ?></td>
                                        <td style="vertical-align: middle;"> <?= $gb['penerbit']; ?></td>
                                        <td style="vertical-align: middle;"><?= $gb['isbn']; ?></td>
                                        <td style="vertical-align: middle;"><?= $gb['tahun_terbit']; ?></td>
                                        <td style="vertical-align: middle;">
                                            <span class="d-inline">
                                                <button type="button" data-delete-url="<?= site_url('admin/hapus_buku/' . $gb['id']); ?>" onclick="deleteConfirm(this)" title="hapus" class="btn btn-danger">Hapus </button>
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
            text: 'Apakah kamu yakin menghapus data buku ini?',
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
                <h5 class="modal-title" id="modalTambahLabel">TAMBAH DAFTAR BUKU </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?= form_open_multipart('admin/tambah_buku'); ?>
                <div class="form-group row">
                    <label for="id_kategori" class="col-sm-3 col-form-label">Kategori</label>
                    <div class="col-sm-9">
                        <select class="custom-select" name="id_kategori" required>
                            <option selected disabled value="">Pilih kategori</option>
                            <?php foreach ($kategori_buku as $kb) : ?>
                                <option value="<?= $kb['id_kategori']; ?>"><?= $kb['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                            <div class="invalid-feedback"><?= form_error('id_kategori'); ?></div>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="judul_buku" class="col-sm-3 col-form-label">Judul</label>
                    <div class="col-sm-9">
                        <input type="text" name="judul_buku" value="<?= set_value('judul_buku'); ?>" class="form-control <?= form_error('judul_buku') ? 'is-invalid' : ''; ?>" id="judul_buku" required>
                        <div class="invalid-feedback"><?= form_error('judul_buku'); ?></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pengarang" class="col-sm-3 col-form-label">Pengarang</label>
                    <div class="col-sm-9">
                        <input type="text" name="pengarang" value="<?= set_value('pengarang'); ?>" class="form-control <?= form_error('pengarang') ? 'is-invalid' : ''; ?>" id="pengarang" required>
                        <div class="invalid-feedback"><?= form_error('pengarang'); ?></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="penerbit" class="col-sm-3 col-form-label">Penerbit</label>
                    <div class="col-sm-9">
                        <input type="text" name="penerbit" value="<?= set_value('penerbit'); ?>" class="form-control <?= form_error('penerbit') ? 'is-invalid' : ''; ?>" id="penerbit" required>
                        <div class="invalid-feedback"><?= form_error('penerbit'); ?></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="isbn" class="col-sm-3 col-form-label">ISBN</label>
                    <div class="col-sm-9">
                        <input type="number" name="isbn" value="<?= set_value('isbn'); ?>" class="form-control <?= form_error('isbn') ? 'is-invalid' : ''; ?>" id="isbn" required>
                        <div class="invalid-feedback"><?= form_error('isbn'); ?></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tahun_terbit" class="col-sm-3 col-form-label">Tahun terbit</label>
                    <div class="col-sm-9">
                        <input type="number" name="tahun_terbit" value="<?= set_value('tahun_terbit'); ?>" class="form-control <?= form_error('tahun_terbit') ? 'is-invalid' : ''; ?>" id="tahun_terbit" required>
                        <div class="invalid-feedback"><?= form_error('tahun_terbit'); ?></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="image" class="col-sm-3 col-form-label">Gambar</label>
                    <div class="col-sm-9">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Belum ada file dipilih</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Buku</button>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>