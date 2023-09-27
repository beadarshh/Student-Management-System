<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['sturecmsstuid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$sid=$_SESSION['sturecmsstuid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$sql ="SELECT StuID FROM tblstudent WHERE StuID=:sid and Password=:cpassword";
$query= $dbh -> prepare($sql);
$query-> bindParam(':sid', $sid, PDO::PARAM_STR);
$query-> bindParam(':cpassword', $cpassword, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);

if($query -> rowCount() > 0)
{
$con="update tblstudent set Password=:newpassword where StuID=:sid";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':sid', $sid, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();

echo '<script>alert("Your password successully changed")</script>';
} else {
echo '<script>alert("Your current password is wrong")</script>';

}
}
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>GJIMT || Student Change Password</title>
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="vendors/select2/select2.min.css">
    <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css" />
    <script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
}   

</script>
  </head>
  <body>
    <div class="container-scroller">
     <?php include_once('includes/header.php');?>
      <div class="container-fluid page-body-wrapper">
      <?php include_once('includes/sidebar.php');?>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Change Password </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Change Password</h4>
                   
                    <form class="forms-sample" name="changepassword" method="post" onsubmit="return checkpass();">
                      
                      <div class="form-group">
                        <label for="exampleInputName1">Current Password</label>
                        <input type="password" name="currentpassword" id="currentpassword" class="form-control" required="true">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">New Password</label>
                        <input type="password" name="newpassword"  class="form-control" required="true">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Confirm Password</label>
                        <input type="password" name="confirmpassword" id="confirmpassword" value=""  class="form-control" required="true">
                      </div>
                      
                      <button type="submit" class="btn btn-primary mr-2" name="submit">Change</button>
                     
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
         <?php include_once('includes/footer.php');?>
        </div>
      </div>
    </div>
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="vendors/select2/select2.min.js"></script>
    <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <script src="js/typeahead.js"></script>
    <script src="js/select2.js"></script>
  </body>
</html><?php }  ?>