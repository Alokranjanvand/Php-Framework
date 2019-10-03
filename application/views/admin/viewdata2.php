<?php include('header.php');?>
<script>
function delete_confirm(){
    if($('.checkbox:checked').length > 0){
        var result = confirm("Are you sure to delete selected users?");
        if(result){
            return true;
        }else{
            return false;
        }
    }else{
        alert('Select at least 1 record to delete.');
        return false;
    }
}

$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
  
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
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
                 
                   

<!-- Display the status message -->
<?php if(!empty($statusMsg)){ ?>
<div class="alert alert-success"><?php echo $statusMsg; ?></div>
<?php } ?>

<!-- Users data list -->
<form name="bulk_action_form" action="" method="post" onSubmit="return delete_confirm();"/>
    <table class="bordered">
        <thead>
        <tr>
            <th><input type="checkbox" id="select_all" value=""/></th>        
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
        </thead>
        <?php if(!empty($users)){ foreach($users as $row){ ?>
        <tr>
            <td align="center"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row['id']; ?>"/></td>        
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
        </tr>
        <?php } }else{ ?>
            <tr><td colspan="5">No records found.</td></tr>
        <?php } ?>
    </table>
    <input type="submit" class="btn btn-danger" name="bulk_delete_submit" value="DELETE"/>
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
<link rel="stylesheet" href="calcss/jquery-ui.css">
<script src="calcss/jquery-ui.js"></script>
<script type="text/javascript">
$( document ).ready(function() {
    $(".datepicker").datepicker({
    changeMonth : true,
        changeYear : true,
        yearRange : "2018:2020",
        dateFormat : "dd-m-yy",
        showOtherMonths : true,
        selectOtherMonths : true    
    });

    $('.datepicker').mask('00/00/0000');
});
</script>
</body>

</html>