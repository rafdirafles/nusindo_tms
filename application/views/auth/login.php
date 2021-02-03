<!-- Login Body  -->
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <h1><b>TMS</b>Nusindo</h1>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Login to start your session</p>

      <!-- MULAI INPUTAN  -->
      <form action="index3.html" method="post">
        <?= $this->session->flashdata('message'); ?>
          <div class="input-group mb-3">
            <input type="text" name="username" class="form-control" placeholder="Inputkan Username anda" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Inputkan Password anda" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">L O G I N </button>
            </div>
            <!-- /.col -->
          </div>
      </form>
<!-- Akhir Inputan -->
      <p class="mb-1">
        <a href="<?= base_url(); ?>Login/forgot_password" >Lupa Password ? </a>
      </p>
      <hr>
      <p class="mb-0">
        <a href="<?= base_url();?>auth/register" class="btn btn-success btn-block">Register a new membership</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
