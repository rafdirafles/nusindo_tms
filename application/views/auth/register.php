
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <h1><b>TMS</b>Nusindo</h1>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Pilih Profil Kamu : </p>
      <?= $this->session->flashdata('message'); ?>
      <form action="" method="post">
        <div class="input-group mb-3">
          <a href="<?= base_url('auth/form/tns20000'); ?>" class="btn btn-primary btn-block">Technician</a>
        </div>
        <div class="input-group mb-3">
          <a href="<?= base_url('auth/form/tns30000'); ?>" class="btn btn-primary btn-block">Marketing</a>
        </div>
        <div class="input-group mb-3">
          <a href="<?= base_url('auth/form/tns40000'); ?>" class="btn btn-primary btn-block">Customer</a>
        </div>
        <hr>
        <div class="row">
          <div class="col-12">
            <a href="<?php echo base_url('auth'); ?>" class="text-center">Sudah Punya Akun ? Login Disini</a>
          </div>
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
