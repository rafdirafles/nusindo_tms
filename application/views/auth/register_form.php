
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <h1><b>TMS</b>Nusindo</h1>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Buat Akun <?= $akun; ?></p>

      <form action="<?= base_url('auth/aksi_register'); ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" id="user_id" name="user_id" class="form-control" placeholder="Masukkan username anda" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <small class="text-danger"><?= form_error('user_id')?></small>
        <div class="input-group mb-3">
          <input type="text" id="email" name="email" class="form-control" placeholder="Masukkan email anda" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="password1" name="password1" class="form-control" placeholder="Masukkan password anda" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="password2" name="password2" class="form-control" placeholder="Masukkan ulang password anda">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <!-- Inputan Hidden auto to Role id -->
        <input type="hidden" name="flg_aprv" value="N"/>
        <input type="hidden" name="role_id" value="<?= $this->uri->segment(3); ?>"/>
        <input type="hidden" name="flg_used" value="Y"/>

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-success btn-block">Register</button>
          </div>
        </div>
      </form>
        <hr>
        <div class="row">
          <div class="col-12">
            <a href="<?php echo base_url('auth'); ?>" class="text-center">Sudah Punya Akun ? Login Disini</a>
          </div>
        </div>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
