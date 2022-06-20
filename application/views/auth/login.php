<div class="row justify-content-center">
  <div class="col-lg-7 col-md-7 col-sm-10">
    <div class="login-container">

      <div class="row align-content-center justify-content-center">
        <div class="col-lg-10 col-md-10">
          <div class="login-body__content">
            <div class="login-body__info">
              <h3 class="mb-0 text-capitalize ">Selamat datang di pustaka booking </h3>
              <p>Akses buku lebih mudah dan cepat dengan menggunakan aplikasi <strong>pustaka booking.</strong></p>

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

              <div class="alert alert-warning mt-2" role="alert">
                <h4 class="alert-heading">Member Login!</h4>
                <p>Gunakan Alamat email yang sudah teregistrasi di sistem. <br> Apabila akun tidak aktif segera verifikasi akun tesebut.</p>
              </div>
            </div>
            <div class="login-body__form">
              <?= form_open('auth', 'class="user"'); ?>
              <div class="form-group">
                <input type="text" name="email" value="<?= set_value('email'); ?>" class="form-control  <?= form_error('email') ? 'is-invalid' : ''; ?>  form-control-user" placeholder="Alamat email" required>
                <div class="invalid-feedback ml-2"><?= form_error('email'); ?></div>
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control <?= form_error('password') ? 'is-invalid' : ''; ?>  form-control-user" placeholder="Password">
                <div class="invalid-feedback ml-2"><?= form_error('password'); ?></div>
              </div>
              <button type="submit" class="btn btn-primary btn-user btn-block">
                Login
              </button>
              <!-- </form> -->
              <?= form_close(); ?>
              <hr>
              <div class="text-center">
                <a class="small" href="#">Lupa Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?= site_url('auth/register'); ?>">Belum mempunyai akun? buat sekarang</a>
              </div>

            </div>

          </div>
        </div>
      </div>

    </div>

  </div>



</div>