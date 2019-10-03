<?php include('header.php');?>

<body id="LoginForm">
 
<div class="addview">
<h1 class="addcategory">Change Password</h1>

</div><!-- addview -->
<div class="container h-70">
  <div class="page allchart">
  <div class="row">
   <div class="col-md-6 offset-md-3 ">
<div class="userform">
  <form>
  <div class="form-row">
    
    <?php
	//print_r($data);
	
	?>
	<?php //echo $this->db->last_query(); ?>
    <div class="form-group col-md-12">
      <label for="inputCity">User Id</label>
	  
      <input type="text" class="form-control" placeholder="User Id" value="<?= $data->user_id;?>">
    </div>
    <div class="form-group col-md-12">
      <label for="inputCity">Old Password</label>
      <input type="password" class="form-control" placeholder="Old Password">
    </div>
  </div>
<div class="form-row">
    
    <div class="form-group col-md-12">
      <label for="inputState">New Password</label>
      <input type="password" class="form-control" placeholder="New Password">
    </div>
    <div class="form-group col-md-12">
      <label for="inputState">Confirm Password</label>
      <input type="password" class="form-control" placeholder="Confirm Password">
    </div>
  </div>

  
     <div class="form-group col-md-12">
      <div class="text-center">
  <button type="submit" class="btn btn-primary">Update</button>
  <button type="submit" class="btn btn-primary">Cancel</button>
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
<footer>
  <div class="container">
    <div class="row">
    <div class="col-md-12">
      <div class="copyright">
      <p class="text-center">Copyright &copy; 2018  Provast All rights Reserved </p>
    </div>
    </div>
</div>

</div>
</footer>
<script src="js/clock.js"></script>


</body>
</html>
