<?php include('header.php');?>
<script>
function checkall(objForm)
{
  //alert("test");
len = objForm.elements.length;
var i=0;
for( i=0 ; i<len ; i++){
if (objForm.elements[i].type=='checkbox') 
objForm.elements[i].checked=objForm.check_all.checked;
}
}
function del_prompt(frmobj,comb)
{
var url="<?php echo base_url('admin/admin/deleteData'); ?>";
if(comb=='Delete'){
if(confirm ("Are you sure you want to delete record(s)"))
{
frmobj.action = "<?php echo base_url('admin/admin/deleteData'); ?>";
frmobj.what.value="Delete";
frmobj.submit();
}
else{ 
return false;
}
}
else if(comb=='Deactivate'){
frmobj.action = "user-del.php";
frmobj.what.value="Deactivate";
frmobj.submit();
}
else if(comb=='Activate'){
frmobj.action = "user-del.php";
frmobj.what.value="Activate";
frmobj.submit();
}
}
</script>

    <div class="addview">
        <h1 class="addcategory">Request Status-Client</h1>
        <div class="float-right">
            
                <button class="btn btn-primary navbg dropdown-toggle" type="button" id="dropdownMenuButton">
                   <a  href="add">PDF</a>
                </button>
                
        </div>

    </div> 
    
    <div class="container">
        <div class="page allchart">
            <div class="row">
                <div class="col-md-12 ">
<?php
$succes=$this->session->flashdata('statusMsg');
$error_Msg=$this->session->flashdata('error_Msg');
$insert_msg=$this->session->flashdata('insertdata');
?> 
<?php if($succes){ ?> 
<div class="alert alert-success">
  <?= $succes; ?>
</div>
<?php } else if ($error_Msg) {
 ?>
<div class="alert alert-danger ">
  <?= $error_Msg; ?>
</div>
<?php } else if($insert_msg) {?>
  <div class="alert alert-success ">
  <?= $insert_msg; ?>
</div>
<?php } ?>
    <form name="frm" method="post" action="" enctype="multipart/form-data">               
<!-- Display the status message -->
<?php echo $this->db->last_query(); ?>
<?=form_open('admin/view');?>

<?php $search = array('name'=>'search','id'=>'search','value'=>'',);?>
<?php $email_search = array('name'=>'email','id'=>'email','value'=>'',);?>
<?=form_input($search);?>
<?=form_input($email_search);?>
<input type=submit value='Search' /></p>
<?=form_close();?>
<table class="table table-bordered">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Password</th>
          <th>User Images</th>
          <th>Edit</th>
          <th>
            <center><input name="check_all" type="checkbox"   id="check_all" onclick="checkall(this.form)" value="check_all" /></center>
          </th>
          
        </tr>
      </thead>
      <tbody>
        <?php 
        foreach($authors as $new) {
        ?>
        <tr>
        <td><?php echo $new->name; ?></td>
        <td><?php echo $new->email; ?></td>
        <td><?php echo $new->password; ?></td>
        <td><img src="<?php echo base_url('/uploads/').$new->user_image; ?>" height="50"></td>
        <td>
        <?=  anchor("admin/editUser/{$new->id}",'Edit',['class'=>'btn btn-default']);  ?></td>
<td align="center">
  
<input type="checkbox" name="ids[]" value="<?php echo $new->id;?>" />
</td>
        </td>
        
       </tr>

       <?php } ?>
       
       <tr><td colspan="10"> <center><input type="hidden" name="what" value="what" />
<input type="submit" name="Submit" value="Activate" class="activebtn" onclick="return del_prompt(this.form,this.value)" />
                            <input type="submit" name="Submit" value="Deactivate" class="activebtn" onclick="return del_prompt(this.form,this.value)" />
                        <input type="submit" name="Submit" value="Delete" class="activebtn" onclick="return del_prompt(this.form,this.value)" />
    </center></td></tr>
       
      </tbody>
    </table>
  </form>
              <p><?php echo $links; ?></p>              

                    </div>
                    <!-- userform -->
                </div>
            </div>
            <!--Row-->
        </div>
    </div>
    <!-- container -->
 
<?php include('footer.php');?>
   <script src="<?php echo base_url('assets/js/clock.js');?>"></script>

</body>

</html>