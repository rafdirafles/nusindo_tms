<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TMS Nusindo | Registration</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page dark-mode">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <h1><b>TMS</b>Nusindo</h1>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="<?php echo base_url(''); ?>Reguser/regiscust" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="user_id" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="cust_id" class="form-control" placeholder="Customer ID" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label>Category Customer</label>
          <select class="form-control" id="category_id" name="category_id" required>
              <option value='1'>RS Dinas</option>
              <option value='2'>RS Swasta</option>
              <option value='3'>Laboratorium</option>
              <option value='4'>Perusahaan Farmasi</option>
              <option value='5'>Dinas Pemerintah</option>
          </select>
        </div>
        <div class="input-group mb-3">
          <input type="tel" name="branch_id" class="form-control" placeholder="Branch Name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="textarea" name="address" class="form-control" placeholder="Address" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-map-marker-alt"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <select class="form-control" id="provinsi" name="prov_id" required data-live-search="true">
            <option value="">Pilih Provinsi</option>
            <?php foreach($mst_prov as $row):?>
              <option value="<?php echo $row->prov_id;?>"> <?php echo $row->prov_name;?> </option>
            <?php endforeach;?>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-building"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <select class="form-control" id="kota" name="city_id" required>
            <option>Pilih Kota / Kabupaten </option>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-building"></span>
            </div>
          </div>
        </div>
        <input type="hidden" name="flg_aprv" value="N"/>
        <input type="hidden" name="role_id" value="<?= $this->uri->segment(3); ?>"/>
        <input type="hidden" name="flg_used" value="Y"/>
        <div class="row">
          <div class="col-8">
            <a href="<?php echo base_url(); ?>index.php/Reguser" class="text-center">Back</a>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?php echo base_url(''); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(''); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(''); ?>assets/dist/js/adminlte.min.js"></script>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
      $('#provinsi').change(function(){
        var id=$(this).val();
        $.ajax({
          url : "<?php echo site_url('Reguser/get_city');?>",
          method : "POST",
          data : {id: id},
          async : true,
          dataType : 'json',
          success: function(data){
            var html = '';
            var i;
            for(i=0; i<data.length; i++){
              html += '<option value='+data[i].city_id+'>'+data[i].city_name+'</option>';
            }
            $('#kota').html(html);
          }
        });
        return false;
      });
    });
</script>

<!-- BATAS ATAS -->
<!-- BATAS BAWAH -->
</body>
</html>
