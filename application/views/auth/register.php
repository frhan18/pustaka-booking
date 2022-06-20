<div class="row justify-content-center">
  <div class="col-lg-7 col-md-10 col-sm-10">

    <div class="register-container">

      <div class="row justify-content-center align-content-center">
        <div class="col">
          <div class="register-account__info">
            <h3 class="mb-0 text-capitalize">Buat akun baru</h3>
          </div>
          <hr>

          <div class="register-account__process">
            <?= form_open('auth/register', 'class="user"'); ?>
            <div class="form-group">
              <input type="text" name="name" value="<?= set_value('name'); ?>" class="form-control <?= form_error('name') ? 'is-invalid' : ''; ?> form-control-user" placeholder="Masukan Nama Kamu" autofocus required>
              <div class="invalid-feedback ml-2"><?= form_error('name'); ?></div>
            </div>
            <div class="form-group">
              <input type="text" name="email" value="<?= set_value('email'); ?>" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?> form-control-user" placeholder="Alamat email" required>
              <div class="invalid-feedback ml-2"><?= form_error('email'); ?></div>
            </div>
            <div class="form-group ">
              <input type="password" name="password1" class="form-control <?= form_error('password1') ? 'is-invalid' : ''; ?> form-control-user" placeholder="Password" required>
              <div class="invalid-feedback ml-2"><?= form_error('password1'); ?></div>
            </div>
            <div class="form-group">
              <input type="password" name="password2" class="form-control <?= form_error('password2') ? 'is-invalid' : ''; ?> form-control-user" placeholder="Konfirmasi password" required>
              <div class="invalid-feedback ml-2"><?= form_error('password2'); ?></div>
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