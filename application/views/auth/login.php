<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-7 col-sm-10">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
              </div>


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


              <?php if ($this->session->flashdata('message_error')) : ?>
                <div class="notification-fb">
                  <div class="alert alert-danger  alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('message_error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                </div>
              <?php endif; ?>



              <!-- <form class="user"> -->
              <?= form_open('auth', 'class="user"'); ?>
              <div class="form-group">
                <input type="text" name="email" value="<?= set_value('email'); ?>" class="form-control  <?= form_error('email') ? 'is-invalid' : ''; ?>  form-control-user" placeholder="Alamat email" required autofocus>
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