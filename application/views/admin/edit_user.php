<?php include('header.php');?>


<div class="addview ">
<h1 class="addcategory">Add Request-Client</h1>
<!-- Example split danger button -->
<!-- <div class="float-right">
<div class="dropdown">
  <button class="btn btn-primary navbg dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Export
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Excel</a>
    <a class="dropdown-item" href="#">Word</a>
    <a class="dropdown-item" href="#">PDF</a>
  </div>
</div>
</div> -->
</div><!-- addview -->
<div class="container h-70">
  <div class="page allchart">
  <div class="row">
   <div class="col-md-8 offset-md-2 ">
<div class="userform">
    <?php echo form_open_multipart("admin/UpdateUser/{$user->id} "); ?>

  <div class="form-row">
    
    <div class="form-group col-md-12">
      <label for="inputPassword4"> Name</label>
      <input type="text" name="name" class="form-control" placeholder="Site Name" value="<?php echo $user->name; ?>">
       <div>
        <?php echo form_error('name','<p class="text-danger text-left">', '</p>');?>
              </div>
    </div>
     <div class="form-group col-md-12">
      <label for="inputPassword4">Email</label>
      <input type="email" name="email" class="form-control" placeholder="Site Name"
      value="<?php echo $user->email; ?>">
      <div>
                <?php echo form_error('email','<p class="text-danger text-left">', '</p>');?>
              </div>
    </div>
     <div class="form-group col-md-12">
      <label for="inputPassword4">Password</label>
      <input type="password" name="password" class="form-control" placeholder="Site Name" value="<?php echo $user->password; ?>">
      <div>
                <?php echo form_error('password','<p class="text-danger text-left">', '</p>');?>
              </div>
    </div>
    <div class="form-group col-md-12">
      <label for="images">Images</label>
      <input type="file" name="picture" class="form-control" placeholder="User Images"><br/>
      <img src="<?= base_url('uploads/'.$user->user_image)?>" height="50">
    </div>
	<div class="form-group col-md-12">
      <label for="images">Gallery</label>
      <input type="file" name="gallery" class="form-control" placeholder="User Gallery"><br/>
      <img src="<?= base_url('uploads/gallery/'.$user->gallery)?>" height="50">
    </div>
     
    <div class="form-group col-md-12">
      <div class="text-center">
        <input type="submit" value="submit" class="btn btn-primary" name="">
    
   </div>
  </div>
  </div>

    
  
  

  
     
  
</form>
 </div>
<!-- userform -->
        </div>
</div><!--Row-->
          </div>
 </div>  
 <!-- container -->

<?php include('footer.php');?>
<script src="<?php echo base_url('assets/js/clock.js');?>"></script>


</body>
</html>
