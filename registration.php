<?php
//error_reporting(0);
if(isset($_POST['signup']))
{
$fname=$_POST['fullname'];
$email=$_POST['emailid']; 
$mobile=$_POST['mobileno'];
$secque=$_POST['secque'];
$secqueans=$_POST['secqueans'];
$Address=$_POST['Address'];
$password=md5($_POST['password']); 
$sql="INSERT INTO  tblusers(FullName,EmailId,ContactNo,secque,secqueans,Address,Password) VALUES(:fname,:email,:mobile,:secque,:secqueans,:Address,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':secque',$secque,PDO::PARAM_STR);
$query->bindParam(':secqueans',$secqueans,PDO::PARAM_STR);
$query->bindParam(':Address',$Address,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Registration successfull. You can login Now');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}

?>


<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}
</script>
<div class="modal fade" id="signupform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Sign Up</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="signup_wrap">
            <div class="col-md-12 col-sm-6">
              <form  method="post" name="signup" onSubmit="return valid();">
                <div class="form-group">
                  <input type="text" class="form-control" name="fullname" pattern="[A-Za-z].{5,20}" placeholder="Full Name" title= "(*Note: Format-Min Count[5] and Max Count[20])" required="required">
                </div>
                      <div class="form-group">
                  <input type="text" class="form-control" name="mobileno" placeholder="Mobile Number" pattern="[6-9]{1}[0-9]{9}"  title= "(Invalid Number)" required="required">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="emailid" id="emailid" onBlur="checkAvailability()" placeholder="Email Address" required="required">
                   <span id="user-availability-status" style="font-size:12px;"></span> 
                </div>
	        <div class="form-group">
                  <input type="text" class="form-control" name="secque" pattern="[A-Za-z].{5,25}" placeholder="Type in your security question?" title= "(*Note: Format-Min Count[5] and Max Count[20])" required="required">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="secqueans" pattern=".{5,10}" placeholder="Type in your security question answer" title= "(*Note: Format-Min Count[5] and Max Count[10])" required="required">
                </div>
              <div class="form-group">
                  <input type=textarea rows="4" class="form-control"  pattern="[A-Za-z1-9].{5,40}" name="Address" placeholder="Address" title= "(*Note: Format-Min Count[5] and Max Count[40])" required="required">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" pattern=".{8,12}" placeholder="Password" title= "(*Note: Your password is too weak/lengthy)" required="required">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" required="required">
                </div>
                <div class="form-group checkbox">
                  <input type="checkbox" id="terms_agree" required="required" checked="">
                  <label for="terms_agree">I accept the <a href="#">Terms of Service</a></label>
                </div>
                <div class="form-group">
                  <input type="submit" value="Sign Up" name="signup" id="submit" class="btn btn-block">
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <p>Already got an account? <a href="#loginform" data-toggle="modal" data-dismiss="modal">Login Here</a></p>
      </div>
    </div>
  </div>
</div>