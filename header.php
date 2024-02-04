
<header>
  <div class="default-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-2">
<div class="logo"> <a href="index.php"><img src="assets\images\logg.jpg" alt="image"/></a> </div>
        </div>

 <div class="col-sm-9 col-md-10">
          <div class="header_info">
            <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
              <p style="color:DarkGreen;" class="uppercase_text">Support Mail Id: </p>
              <a style="color:Maroon;" href="mailto:cyborgflames@gmail.com">Cyborgflames@gmail.com</a> </div>

   <?php   if(strlen($_SESSION['login'])==0)
	{
?>
 <div class="login_btn"> <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login / Register</a> </div>
<?php }
else{

echo "Welcome To Cyborg's Car Rental";
 } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="header_wrap">
        <div class="user_login">
          <ul>
            <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i>
<?php
$email=$_SESSION['login'];
$sql ="SELECT FullName FROM tblusers WHERE EmailId=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
	{

	 echo htmlentities($result->FullName); }}?><i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="dropdown-menu">
           <?php if($_SESSION['login']){?>
              <li><a href="update-password.php">Update Password</a></li>
            <li><a href="my-booking.php">My Car Bookings</a></li>
            <li><a href="rent.php">Rent Your Car</a></li>
<li><a href="sell.php">Sell a Car</a></li>
            <li><a href="rent-bookings.php">My Rent Bookings</a></li>
<li><a href="trackings.php">My Purchasing Requests</a></li>
<li><a href="sell-trackings.php">My Selling Requests</a></li>
            <li><a href="post-testimonial.php">Feedback</a></li>
          <li><a href="my-testimonials.php">My Feedback</a></li>
            <li><a href="logout.php">Sign Out</a></li>
            <?php } else { ?>
              <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Update Password</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">My Car Bookings</a></li>
<li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Rent Your Car</a></li>
<li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Sell a Car</a></li>
<li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">My Rent Bookings</a></li>
<li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">My Purchasing Requests</a></li>
<li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">My Selling Requests</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Feedback</a></li>
          <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">My Feedback</a></li>
            <li><a href="#loginform"  data-toggle="modal" data-dismiss="modal">Sign Out</a></li>
            <?php } ?>
          </ul>
            </li>
          </ul>
        </div>
        
      </div>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a>    </li>

          <li><a href="page.php?type=aboutus">Regarding Us</a></li>
          <li><a href="car-listing.php">Available Cars</a>
<li><a href="car-listing1.php">Buy a Car</a>
          <li><a href="page.php?type=faqs">Frequently Asked Questions</a></li>
<li><a href="page.php?type=terms">Clauses</a>
          <li><a href="contact-us.php">Call To Action</a></li>

        </ul>
      </div>
    </div>
  </nav>
  <!-- Navigation end -->

</header>
