<div class="container-fluid">

    <div class="setting-container">
        <div class="row">
            <div class="col">
                <header id="header">
                    <?php if ($this->session->flashdata('message_success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('message_success'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('message_error')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('message_error'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                </header>

            </div>




        </div>

        <div class="main">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="box-wrapper">
                        <h3 class="mb-3">My Profile </h3>
                        <hr class="sidebar-divider">

                        <div class="row ">
                            <div class="col mb-3">
                                <div class="akun-info-profil mb-3">
                                    <!-- <img src="<?= base_url('upload/' . $get_sesi_user['image']); ?>" class="img-fluid" width="300" style="max-width: 100%;"> -->
                                    <img src="<?= base_url('upload/' . $get_user['image']); ?>" class="img-fluid img-thumbnail" width="350" style="max-width: 100%;">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-8 col-lg-8 col-sm-10 col-md-10">
                                <div class="form-akun-info p-2 pt-3">
                                    <?= form_open_multipart('users/setting_profile/' . $get_user['id_user']); ?>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" value="<?= htmlentities($get_user['email']); ?>" name="email" id="email" autofocus readonly>
                                            <div class="invalid-feedback"><?= form_error('email'); ?></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">Nama akun</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control <?= form_error('name') ? 'is-invalid' : ''; ?>" value="<?= htmlentities($get_user['name']); ?>" name="name" id="name" required>
                                            <div class="invalid-feedback"><?= form_error('name'); ?></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="image" class="col-sm-3 col-form-label">Foto upload <em><a href="#info" class="text-dark" data-toggle="modal" data-target="#info"> <i class="fas fa-info "></i></a></em> </label>
                                        <div class="col-sm-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image" value="<?= $get_user['image']; ?>">
                                                <label class="custom-file-label" for="image">Belum memilih file</label>
                                            </div>
                                            <div class="invalid-feedback"><?= form_error('image'); ?></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="info_akun" class="col-sm-3 col-form-label">Terdaftar</label>
                                        <div class="col-sm-9">
                                            <p><?= date('d M Y ', $get_user['created_at']); ?></p>
                                        </div>
                                    </div>


                                    <button type="submit" class="btn btn-dark ">Simpan perubahan</button>
                                    <?= form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <div class="modal fade" id="info" tabindex="-1" aria-labelledby="infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoLabel">Pemberitahuan!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="info-show">
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Pemberitahuan <i class="fas fa-info"></i></h4>
                            <ol class="pt-3">
                                <li>Pilih gambar bertipe jpg/jpeg & PNG.</li>
                                <li>ukuran gambar tidak boleh dari 2 MB</li>
                            </ol>

                            <p class="inner-text">Terima kasih</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>