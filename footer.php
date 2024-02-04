<?php
if(isset($_POST['emailsubscibe']))
{
$subscriberemail=$_POST['subscriberemail'];
$sql ="SELECT SubscriberEmail FROM tblsubscribers WHERE SubscriberEmail=:subscriberemail";
$query= $dbh -> prepare($sql);
$query-> bindParam(':subscriberemail', $subscriberemail, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<script>alert('Already Subscribed.');</script>";
}
else{
$sql="INSERT INTO  tblsubscribers(SubscriberEmail) VALUES(:subscriberemail)";
$query = $dbh->prepare($sql);
$query->bindParam(':subscriberemail',$subscriberemail,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Subscribed successfully.');</script>";
}
else
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}
}
?>

<footer>
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-md-6">
          <h6><u style="color:SteelBlue;">Cyborg's Car Rental</u></h6>
          <ul>


          <li><a style="color:Khaki;" href="page.php?type=aboutus">Regarding Us</a></li>
            <li><a style="color:Khaki;" href="page.php?type=faqs">Frequently Asked Questions</a></li>
            <li><a style="color:Khaki;" href="page.php?type=privacy">Privacy Regulations</a></li>
          <li><a style="color:Khaki;" href="page.php?type=terms">Clauses</a></li>
               <li><a style="color:Khaki;" href="admin/">Admin</a></li>
          </ul>
        </div>

       
        </div>
      </div>
    </div>
  </div></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  

        


      </div>
    </div>
  </div>
</footer>
