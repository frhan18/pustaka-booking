<div class="row justify-content-center">
  <div class="col-xl-7 col-sm-10">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <!-- <form class="user"> -->
              <?= form_open('auth/register', 'class="user"'); ?>
              <div class="form-group">
                <input type="text" name="name" value="<?= set_value('name'); ?>" class="form-control <?= form_error('name') ? 'is-invalid' : ''; ?> form-control-user" placeholder="Nama lengkap" autofocus>
                <div class="invalid-feedback ml-2"><?= form_error('name'); ?></div>
              </div>
              <div class="form-group">
                <input type="text" name="email" value="<?= set_value('email'); ?>" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?> form-control-user" placeholder="Alamat email">
                <div class="invalid-feedback ml-2"><?= form_error('email'); ?></div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="password" name="password1" class="form-control <?= form_error('password1') ? 'is-invalid' : ''; ?> form-control-user" placeholder="Password">
                  <div class="invalid-feedback ml-2"><?= form_error('password1'); ?></div>
                </div>
                <div class="col-sm-6">
                  <input type="password" name="password2" class="form-control <?= form_error('password2') ? 'is-invalid' : ''; ?> form-control-user" placeholder="Ulangi password">
                  <div class="invalid-feedback ml-2"><?= form_error('password2'); ?></div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-user btn-block">
                Register Account
              </button>
              <!-- </form> -->
              <?= form_close(); ?>
              <hr>
              <div class="text-center">
                <a class="small" href="#">Lupa Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?= site_url('auth/index'); ?>">Sudah punya akun? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>