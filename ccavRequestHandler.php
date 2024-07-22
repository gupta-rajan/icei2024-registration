<html>
<head>
<title> Non-Seamless-kit</title>
<!-- fevicon -->
<link rel="icon" href="images/logo.png" type="image/gif" />
</head>
<body>
<center>

<?php include('Crypto.php')?>
<?php 

   session_start();
   $_SESSION['testcomplete'] = 'yes';


	error_reporting(0);
	
	$merchant_data='2';
	$working_key='49C16B167402F3D3EA6746C05052CA6E';//Shared by CCAVENUES
	$access_code='AVIR79KF77BN63RINB';//Shared by CCAVENUES

	
	foreach ($_POST as $key => $value){		
		if ($key=='register_id')
		{$register_id = $value;
		}
		else if ($key=='order_id')
		{$order_id = $value;
			break;
		}		
	}
	include('db.php');
	$get_oid_sql = mysqli_query($conn,"select `order_id` from register_info where `order_id` = '$order_id'");
	$row_oid = mysqli_fetch_array($get_oid_sql);
	$order_id_db = $row_oid["order_id"];

	$sql_amnt  = mysqli_query($conn, "SELECT amount FROM `register_info` WHERE `register_id` = '$register_id';");	
	$row = mysqli_fetch_assoc($sql_amnt);
	$amount = $row['amount'];

	foreach ($_POST as $key => $value){
		if ($key=='amount')
		{$merchant_data.=$key.'='.$amount.'&';}
		else
		{
		$merchant_data.=$key.'='.$value.'&';}
		
	}

	if ($order_id_db!=$order_id) {
	
	$sql_update_order_id1 = "UPDATE `register_info` SET `order_id`='$order_id' WHERE `register_id`='$register_id'";
	$sql_update_order_id2 = "UPDATE `payment_info` SET `order_id`='$order_id' WHERE `register_id`='$register_id'";
	$sql_add_order_id = "INSERT INTO `order_id_info`(`order_id`,`register_id`) VALUES ('$order_id','$register_id')";
	mysqli_query($conn,$sql_update_order_id1);
	mysqli_query($conn,$sql_update_order_id2);
	mysqli_query($conn,$sql_add_order_id);

	}
		
	mysqli_close($conn);
	$encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.

?>
<form method="post" name="redirect" action="https://www.onlinesbi.sbi/sbicollect/icollecthome.htm?corpID=3407756 "> 
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>";
?>
</form>
</center>
<script language='javascript'>document.redirect.submit();</script>
</body>
</html>