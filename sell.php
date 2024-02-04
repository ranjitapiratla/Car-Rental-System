<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
if(isset($_POST['submit']))
  {
$toc=$_POST['toc'];
$fuel=$_POST['fuel'];
$rdoc=$_POST['rdoc'];
$features=$_POST['features'];
$aadharno=$_POST['aadharno'];
$homeservice=$_POST['homeservice'];
$email=$_SESSION['login'];
$status=0;
$sql="INSERT INTO  tblsell(UserEmail,TOC,FUEL,RDOC,FEATURES,aadharno,HOMESERVICE,Status) VALUES(:email,:toc,:fuel,:rdoc,:features,:aadharno,:homeservice,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':toc',$toc,PDO::PARAM_STR);
$query->bindParam(':fuel',$fuel,PDO::PARAM_STR);
$query->bindParam(':rdoc',$rdoc,PDO::PARAM_STR);
$query->bindParam(':features',$features,PDO::PARAM_STR);
$query->bindParam(':aadharno',$aadharno,PDO::PARAM_STR);
$query->bindParam(':homeservice',$homeservice,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Your Request has been succesfully sent.');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}
?>
  <!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Cyborg's Car Rental |Sell A Car</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<!-- SWITCHER -->
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
 <style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>
</head>
<body>

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  
        
<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 
<!--Page Header-->
<section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1 style="color:SandyBrown;"><u>Sell A Car</u></h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a style="color:Cyan;" href="#">Home</a></li>
        <li style="color:Cyan;">Sell a car</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 

<?php 
$useremail=$_SESSION['login'];
$sql = "SELECT * from tblusers where EmailId=:useremail";
$query = $dbh -> prepare($sql);
$query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
          <?php echo htmlentities($result->City);?>&nbsp;<?php echo htmlentities($result->Country); }}?></p>
    <div class="row">
      <div class="col-md-3 col-sm-3">
        <?php include('includes/sidebar.php');?>
      <div class="col-md-6 col-sm-8">
        <div style="background-color:LightYellow;" class="profile_wrap">
          <h5 style="color:MediumOrchid;" class="uppercase underline">Sell A Car</h5>
            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
          <form  method="post">
          
          <div class="form-group">
              <label style="color:Navy;" class="control-label">Type Of Car</label>
              <input class="form-control white_bg" id="toc" name="toc" pattern="[A-Za-z].{3,25}" title= "(*Note: Format-Min Count[3] and Max Count[20])" required="" type="text">
            </div>
           <div class="form-group">
              <label style="color:Navy;" class="control-label">Type Of Fuel</label>
              <input class="form-control white_bg" id="fuel" name="fuel" pattern="[A-Za-z].{3,7}" title= "(*Note: Format-Min Count[3] and Max Count[7])" required="" type="text">
            </div>
           <div class="form-group">
              <label style="color:Navy;" class="control-label">Date Of Vehicle Registration</label>
              <input class="form-control white_bg" id="rdoc" name="rdoc" pattern="(0?[1-9]|[12][0-9]|3[01])/(0?[1-9]|1[012])/\d{4}" title= "The Date Format is incorrect"  placeholder="dd/mm/yy" required="" id="birth-date" type="text">
            </div>
           <div class="form-group">
              <label style="color:Navy;" class="control-label">Features</label>
              <textarea class="form-control white_bg" name="features" pattern="[A-Za-z1-9].{5,40}"  title= "(*Note: Format-Min Count[5] and Max Count[40])" rows="4" required="" ></textarea>
            </div>
	   <div class="form-group">
              <label style="color:Navy;" class="control-label">Aadhar Number</label>
              <input class="form-control white_bg" id="aadharno" name="aadharno" pattern="[2-9]{1}[0-9]{11}" title= "Your Aadhar Number isn't valid" required="" type="text">
            </div>
          <div class="form-group">
              <label style="color:Navy;" class="control-label">Home Service</label>
              <input class="form-control white_bg" id="homeservice" pattern="[A-Za-z]{3}" title= "(*Note: Make sure your format is correct.)" placeholder="Home Service(Yes/Nah)"  name="homeservice" required="" type="text">
            </div>
          <div class="form-group">
              <button style="background-color:Magenta;" type="submit" name="submit" class="btn">Submit Your Request <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>
<!--/Profile-setting--> 

<<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>
<!--/Forgot-password-Form --> 

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>
}
<?php }?>