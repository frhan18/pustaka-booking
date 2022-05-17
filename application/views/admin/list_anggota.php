<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="box-wrapper">
        <section>
            <h1 class="h3 mb-4 text-gray-800">Halaman Admin / <?= $title; ?></h1>
            <p>List data anggota</p>

            <button type="button" data-toggle="modal" data-target="#modalTambah" class="btn btn-xs btn-dark mb-3"><i class="fas fa-plus"></i> Tambah Anggota</button>

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
                                    <th>ID User</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Created_at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($user as $row) : ?>

                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['id_user']; ?></td>
                                        <td><?= $row['name']; ?></td>
                                        <td><?= $row['email']; ?></td>
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
                                        <td>
                                            <span class="d-inline">
                                                <button type="button" data-delete-url="<?= site_url('admin/delete_anggota/' . $row['id_user']); ?>" onclick="deleteConfirm(this)" title="hapus" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> </button>
                                                <button type="button" data-toggle="modal" data-target="#modalEdit<?= $row['id_user']; ?>" title="edit" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i> </button>
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
                <h5 class="modal-title" id="modalTambahLabel">TAMBAH ANGGOTA BARU</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?= form_open('admin/insert_anggota'); ?>

                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" name="email" value="<?= set_value('email'); ?>" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" id="email" placeholder="johndoe@gmail.com">
                        <div class="invalid-feedback"><?= form_error('email'); ?></div>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" value="<?= set_value('name'); ?>" class="form-control <?= form_error('name') ? 'is-invalid' : ''; ?>" id="name" placeholder="john doe">
                        <div class="invalid-feedback"><?= form_error('name'); ?></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" value="<?= set_value('password'); ?>" class="form-control <?= form_error('password') ? 'is-invalid' : ''; ?>" id="email" placeholder="Password">
                        <div class="invalid-feedback"><?= form_error('password'); ?></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_role" class="col-sm-3 col-form-label">Role</label>
                    <div class="col-sm-9">
                        <select class="custom-select" name="id_role">
                            <option selected>----Pilih----</option>
                            <option value="1">Administrator</option>
                            <option value="2">Member</option>
                            <div class="invalid-feedback"><?= form_error('id_role'); ?></div>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="is_active" class="col-sm-3 col-form-label">Active user</label>
                    <div class="col-sm-9">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="is_active" value="1" class="custom-control-input" id="is_active" checked>
                            <label class="custom-control-label" for="is_active">Aktifkan anggota / Nonaktifkan?</label>
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Anggota</button>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>




<!-- Modal edit -->
<?php foreach ($user as $row) : ?>



    <div class="modal fade" id="modalEdit<?= $row['id_user']; ?>" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">UBAH ANGGOTA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <?= form_open('admin/update_anggote'); ?>
                    <div class="form-group row">
                        <label for="id_user" class="col-sm-3 col-form-label">ID User</label>
                        <div class="col-sm-9">
                            <input type="text" name="id_user" value="<?= $row['id_user'] ? $row['id_user']  : set_value('id_user'); ?>" class="form-control" id="id_user" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" name="email" value="<?= $row['email'] ? $row['email']  : set_value('email'); ?>" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" id="email">
                            <div class="invalid-feedback"><?= form_error('email'); ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" value="<?= $row['name'] ? $row['name']  : set_value('name'); ?>" class="form-control  <?= form_error('name') ? 'is-invalid' : ''; ?>" id="name">
                            <div class="invalid-feedback"><?= form_error('name'); ?></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_role" class="col-sm-3 col-form-label">Role</label>
                        <div class="col-sm-9">
                            <select class="custom-select <?= form_error('id_role') ? 'is-invalid' : ''; ?>" name="id_role">
                                <option selected>----Pilih----</option>
                                <option value="1" <?php if ($row['id_role'] == 1) echo 'selected'; ?>>Administrator</option>
                                <option value="2" <?php if ($row['id_role'] == 2) echo 'selected'; ?>>Member</option>

                                <div class="invalid-feedback"><?= form_error('id_role'); ?></div>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="is_active" class="col-sm-3 col-form-label">Active user</label>
                        <div class="col-sm-9">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" name="is_active" value="<?= $row['is_active'] ? $row['is_active']  : '1'; ?>" class="custom-control-input" id="is_active" <?= $row['is_active'] ? 'checked' : ''; ?>>
                                <label class="custom-control-label" for="is_active">Aktifkan anggota / Nonaktifkan?</label>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Ubah Anggota</button>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>