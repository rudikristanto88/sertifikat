
  <div class="login-logo">
    <a href="<?php echo base_url()?>"><b>Lembaga Sertifikasi Organik
<br>
</b>Provinsi Jawa Tengah</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="<?php echo base_url() . "welcome/dologin"?>" method="post">
      <div class="form-group has-feedback">
        <input type="username" name="username" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
 
    <a href="<?php echo base_url() . "welcome/lupapassword"?>">I forgot my password</a><br>
    <a href="<?php echo base_url() . 'welcome/register'?>" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->