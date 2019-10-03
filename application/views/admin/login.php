<?php include('header.php');?>
<div class="bghome">
  <div class="overlay">
  <div class="container h-70">
    <div class="page">
    <div class="col-md-4 col-sm-12 offset-md-4 offset-sm-0 ">
      
      <div class="login-form">
  <div class="main-div">
      <div class="panel">
     <h2 class="font-weight-bold">Provast Service Portal</h2>
     </div>
      <p style="color: red;"><?php echo $this->session->flashdata('Login_failed'); ?></p>
        
        <?php echo form_open('login/index'); ?>
        
          <div class="form-group">

              <input type="text" class="form-control" name="user_name" id="inputEmail" placeholder="User Id" value="<?php echo set_value('user_name')?>">
              <div>
                  <?php  echo form_error('user_name');  ?>
              </div>

          </div>

          <div class="form-group">

              <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" value="<?php echo set_value('password')?>">
              <div>
                  <?php  echo form_error('password');  ?>
              </div>

          </div>
          <div class="forgot">
          <a href="forgot_password.html">Forgot password?</a>
  </div>
          <button type="submit" class="btn btn-primary">Login</button>

  
      </div>
  </div>
    </div>

  </div>
  </div>
</div><!-- overlay -->
</div>
<?php include('footer.php');?>
<script src="<?php echo base_url('assets/js/clock.js');?>"></script>
</body>
</html>