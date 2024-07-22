<!doctype html>
<html class="no-js" lang="">
	<!-- fevicon -->
<link rel="icon" href="images/logo.png" type="image/gif" />
<title>SPECOM 2023 REGISTRATION</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
<body>
    <div class="container">
    <div class="row">
</div><div class="col-md-6 col-sm-12 col-lg-6 col-6 text-center col-md-offset-3">

<?php include('Crypto.php')?>
<?php



	error_reporting(0);
	
	$workingKey='49C16B167402F3D3EA6746C05052CA6E';		//Working Key should be provided here.
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$order_status="";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);
	echo "<center>";

	for($i = 0; $i < $dataSize; $i++) 
	{
        $information = explode ( '=', $decryptValues [$i] );
        $responseMap [$information [0]] = $information [1];  
	}

    $order_status = $responseMap ['order_status'];
	$order_id = $responseMap ['order_id'];

	include 'db.php';
	$sql2 = "SELECT `register_id`,`name`,`email`,`phone`,`num_papers`,`paper_id1`,`paper_id2`,`paper_id3`,`paper_id4`,`paper_id5`,`paper_id6`,`paper_id7`,`paper_id8`,`paper_id9`,`paper_id10`,`paper_id11`,`paper_id12`,`paper_id13`,`paper_id14`,`paper_id15`,`country_cat`,`category`,`amount`,`isca_id` FROM register_info WHERE `order_id`='$order_id'";
	$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {	
  // output data of each row
  while($row = $result2->fetch_assoc()) {
	$register_id = $row["register_id"];
    $attendee_name = $row["name"];	
	$attendee_email = $row["email"];
	$reg_category = $row["category"];
	$request_amount = $row["amount"];
	$num_papers = $row["num_papers"];
	$paperid1 = $row["paper_id1"];
	$paperid2 = $row["paper_id2"];
	$paperid3 = $row["paper_id3"];
	$paperid4 = $row["paper_id4"];
	$paperid5 = $row["paper_id5"];
	$paperid6 = $row["paper_id6"];
	$paperid7 = $row["paper_id7"];
	$paperid8 = $row["paper_id8"];
	$paperid9 = $row["paper_id9"];
	$paperid10 = $row["paper_id10"];
	$paperid11= $row["paper_id11"];
	$paperid12= $row["paper_id12"];
	$paperid13= $row["paper_id13"];
	$paperid14= $row["paper_id14"];
	$paperid15= $row["paper_id15"];
	$iscaid = $row["isca_id"];	
  }
} else {
  echo "0 results";
}


	$tracking_id = $responseMap ['tracking_id'];
	$bank_ref_no = $responseMap ['bank_ref_no'];
	$order_status = $responseMap ['order_status'];
	$payment_mode = $responseMap ['payment_mode'];
	$card_name = $responseMap ['card_name'];
	$status_code = $responseMap ['status_code'];
	$status_message = $responseMap ['status_message'];
	$currency = $responseMap ['currency'];
	$response_amount = $responseMap ['amount'];
	$billing_name = $responseMap ['billing_name'];
	$billing_address = $responseMap ['billing_address'];
	$billing_city = $responseMap ['billing_city'];
	$billing_state = $responseMap ['billing_state'];
	$billing_zip = $responseMap ['billing_zip'];
	$billing_country = $responseMap ['billing_country'];
	$billing_tel = $responseMap ['billing_tel'];
	$billing_email = $responseMap ['billing_email'];
	$trans_date = $responseMap ['trans_date'];
	$token_eligibility = $responseMap ['token_eligibility'];
	$response_code = $responseMap ['response_code'];
	
	if($order_status==="Success")	
	{ if($request_amount==$response_amount){
		?><br> <div class="alert alert-success" role="alert"> <?php
		echo "
		Thank you for registering with us. Your transaction is successful." 
		;
		?> </div>
		<?php
	  }
	else {
		$order_status="Failure";
		?><br> <div class="alert alert-danger" role="alert"> <?php
		echo "Please Contact Website Admin. Amount did not matched.";
		?> </div>
		<?php
	}

		
	}	 
	
	else if($order_status==="Failure")
	{   ?><br> <div class="alert alert-danger" role="alert"> <?php
		echo "Please Try Again! The transaction has been declined.";
		?> </div>
		<?php
	}
	else if($order_status==="Aborted")
	{   ?><br> <div class="alert alert-danger" role="alert"> <?php
		echo " The transaction has been aborted.";
		?> </div>
		<?php
	}
	else
	{  ?><br> <div class="alert alert-danger" role="alert"> <?php
		echo "Warning !!! Security issues! Due to illegal access no information can be displayed";
		?> </div>
		<?php
	
	}

	$paper_info = '';
	for($p=1;$p<=$num_papers;$p++)
	{   $paperid='paperid'.$p;
		$paper_id =$$paperid ;
		$paper_info=$paper_info . '<tr><th>Paper ID ' .$p.' </th>
							<td>'. $paper_id .'</td>
						</tr>';
  
	}

echo"<table class='table'>
<thead>
	<tr>
	<th>Attendee Name</th>
	<td> $attendee_name </td>
  </tr>
  <tr>
	<th>Registration ID</th>
	<th> $register_id </th>
  </tr>
</thead>
<tbody>
<tr>
	<th>Registration Category</th>
	<td> $reg_category </td>
  </tr>
  <tr>
	<th>Registration Email</th>
	<td> $attendee_email </td>
  </tr> 
  $paper_info 
  <tr>
	<th>Tracking ID</th>
	<td>$tracking_id</td>
  </tr>
  <tr>
	<th>Bank Ref N.o</th>
	<td>$bank_ref_no</td>
  </tr>
  <tr>
	<th>Status</th>
	<td>$order_status</td>
  </tr>
	  <tr>
	<th>Payment Mode</th>
	<td>$payment_mode</td>
  </tr>
	  <tr>
	<th>Card Name</th>
	<td>$card_name</td>
  </tr>

	  <tr>
	<th>Total Amount</th>
	<td>$request_amount / $currency </td>
  </tr>
	  <tr>
	<th>Billing Name</th>
	<td>$billing_name </td>
  </tr>
		  <tr>
	<th>Transaction Date</th>
	<td>$trans_date</td>
  </tr>
  <tr>
	<th>ISCA ID (if any)</th>
	<td>$iscaid</td>
  </tr>
	
	
  
</tbody>
</table>"
  
?>
<button class="btn btn-warning" onclick="window.print()">Print payment receipt</button>
<button class="btn btn-secondary" onclick="window.location.href='register.php'">Back to Home</button>   
<br><hr>

<?php
include 'db.php';
if(!empty($order_id)){
$sql3 = "UPDATE `payment_info` SET `transaction_id` = '$tracking_id', `bank_ref_no` = '$bank_ref_no', `payment_mode` = '$payment_mode', `billing_name`='$billing_name', `amount`= '$response_amount', `payment_status`='$order_status' 
		WHERE `order_id`='$order_id'";
			

$sql4 = "UPDATE `register_info` SET `register_status`='$order_status' WHERE `order_id`='$order_id'";
if(mysqli_query($conn,$sql3) and mysqli_query($conn,$sql4)){
echo "COPYRIGHT @ SPECOM-2023";
} else {
echo "Error: " . $sql3 . "<br>" . $conn->error;
}
mysqli_close($conn);
}
?>
<br><hr>
</div>
</div>
</div>

</body>
</html
