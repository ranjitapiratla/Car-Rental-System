<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_REQUEST['eid']))
	{
$eid=intval($_GET['eid']);
$status="2";
$sql = "UPDATE tblrent SET Status=:status WHERE  id=:eid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':eid',$eid, PDO::PARAM_STR);
$query -> execute();

$msg=" Request has been successfully cancelled";
}


if(isset($_REQUEST['aeid']))
	{
$aeid=intval($_GET['aeid']);
$status=1;

$sql = "UPDATE tblrent SET Status=:status WHERE  id=:aeid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
$query -> execute();

$msg=" Request has been successfully processed";
}


 ?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Cyborg's Car Rental | Admin | Manage Rent Users  </title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
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
	<?php include('includes/header.php');?>

	<div style="background-color:Beige;" class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 style="color:OrangeRed;" class="page-title"><u>Manage Users Requests(Rent)</u></h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Users Requests(Rent)</div>
							<div class="panel-body">
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
											<th style="color:DeepPink;">Name</th>
											<th style="color:DeepPink;">Email</th>
											<th style="color:DeepPink;">TOC</th>
                                                                                	<th style="color:DeepPink;">FUEL</th> 
                                                                                	<th style="color:DeepPink;">RDOC</th>
                                                                                	<th style="color:DeepPink;">FEATURES</th>
<th style="color:DeepPink;">Aadhar Number</th>
<th style="color:DeepPink;">Driving License Number</th>
                                                                                        <th style="color:DeepPink;">HOMESERVICE</th>
                                                                                        <th style="color:DeepPink;">Status</th>
                                                                                        <th style="color:DeepPink;">Posting date</th>
											<th style="color:DeepPink;">Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
										<th>#</th>
											<th style="color:DeepPink;">Name</th>
											<th style="color:DeepPink;">Email</th>
											<th style="color:DeepPink;">TOC</th>
                                                                                	<th style="color:DeepPink;">FUEL</th> 
                                                                                	<th style="color:DeepPink;">RDOC</th>
                                                                               	        <th style="color:DeepPink;">FEATURES</th>
<th style="color:DeepPink;">Aadhar Number</th>
<th style="color:DeepPink;">Driving License Number</th>
                                                                                        
                                                                                       
                                                                                      <th style="color:DeepPink;">HOMESERVICE</th>
                                                                                       <th style="color:DeepPink;">Status</th>                      
                                                                                       <th style="color:DeepPink;">Posting date</th>
											<th style="color:DeepPink;">Action</th>
										</tr>
									</tfoot>
									<tbody>

									<?php $sql = "SELECT tblusers.FullName,tblrent.UserEmail,tblrent.TOC,tblrent.FUEL,tblrent.RDOC,tblrent.FEATURES,tblrent.aadharno,tblrent.drivinglicensenumber,tblrent.HOMESERVICE,tblrent.PostingDate,tblrent.Status,tblrent.id from tblrent join tblusers on tblusers.Emailid=tblrent.UserEmail";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($result->FullName);?></td>
											<td><?php echo htmlentities($result->UserEmail);?></td>
											<td><?php echo htmlentities($result->TOC);?></td>
                                                                                        <td><?php echo htmlentities($result->FUEL);?></td>
                                                                                        <td><?php echo htmlentities($result->RDOC);?></td>
                                                                                        <td><?php echo htmlentities($result->FEATURES);?></td>
 <td><?php echo htmlentities($result->aadharno);?></td>
 <td><?php echo htmlentities($result->drivinglicensenumber);?></td>
                                                                                        <td><?php echo htmlentities($result->HOMESERVICE);?></td>
											
										<td><?php 
if($result->Status==0)
{
echo htmlentities('Not Confirmed yet');
} else if ($result->Status==1) {
echo htmlentities('Confirmed');
}
 else{
 	echo htmlentities('Cancelled');
 }
										?></td>
											<td><?php echo htmlentities($result->PostingDate);?></td>
										<td><a href="manage-rent-users.php?aeid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Confirm this booking')"> Confirm</a> /


<a href="manage-rent-users.php?eid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Cancel this Booking')"> Cancel</a>
</td>
										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>
<u><b style="color:Tomato;">Note- </b></u><i><p style="color:Navy;"> The aadhar no. & driving license no. provided by the users can be verified at: <u><a style="color:DarkGreen;" href="https://resident.uidai.gov.in/verify">1) Aadhar No. Verification</a></u><p></i><p><i><u><a style="color:DarkGreen;" href="https://www.https://parivahan.gov.in/rcdlstatus/?pur_cd=101com/"> 2) Driving License No. Verification</a></u></p></i> 
						

							</div>
						</div>

					

					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>
