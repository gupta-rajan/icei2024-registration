<?php  

session_start();
if (isset($_SESSION["testcomplete"]) && $_SESSION["testcomplete"] == 'yes') {
    header('Location: ./register.php');
}


function randString($length, $charset='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')
{
    $str = '';
    $count = strlen($charset);
    while ($length--) {
        $str .= $charset[mt_rand(0, $count-1)];
    }

    return $str;
}


if (isset($_POST['pay_again_btn']) && !empty($_POST))
{
    $register_id = $_POST['register_id'];
	
	include 'db.php';
		

	$order_id = randString(7);  
	while(mysqli_num_rows(mysqli_query($conn, "SELECT order_id FROM order_id_info WHERE order_id = '".mysqli_real_escape_string($conn, $order_id)."'")) > 0) { 
         $order_id = randString(7);   
        }
		

	$sql = "SELECT `name`, `email`, `phone`, `num_papers`,`paper_id1`,`paper_id2`,`paper_id3`,`paper_id4`,`paper_id5`,`paper_id6`,`paper_id7`,`paper_id8`,`paper_id9`,`paper_id10`,`paper_id11`,`paper_id12`,`paper_id13`,`paper_id14`,`paper_id15`,`country_name`, `category`,`amount`,`currency`, `isca_id` ,`register_status` FROM register_info WHERE `register_id` = '$register_id' ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {		
		// output data of each row
		  while($row = $result->fetch_assoc()) {
			  $attendee_name = $row["name"];	
			  $attendee_email = $row["email"];
			  $phone = $row["phone"];
			//   $country_cat = $row["country_cat"];
			  $country_name = $row["country_name"];
			  $category = $row["category"];
			  $num_paper = $row["num_papers"];
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
			  $amount = $row["amount"];
			  $currency = $row["currency"];

		  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>REGISTRATION HERE</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">	
<!-- bootstrap css -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!-- style css -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- Responsive-->
<link rel="stylesheet" href="css/responsive.css">
<!-- fevicon -->
<link rel="icon" href="images/logo.png" type="image/gif" />
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
<!-- Tweaks for older IEs-->
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<!-- owl stylesheets --> 
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesoeet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

</head>
<script>
	window.onload = function() {
		var d = new Date().getTime();
		document.getElementById("tid").value = d;
	};
	localStorage.setItem("block", 1);
</script>

</head>
<body>
<!-- <div class="login_section">  -->
<div style="text-align: center; margin-top:20px; ">
   <h3 style="font-size: 40px; color:green; display: inline;"><b>ICEI 2024:</b>  </h3><h3 style="font-size: 40px; color:#062631; display: inline ;"><b> REGISTRATION DETAILS</b></h3>
</div>
	<form method="post" name="customerData" action="ccavRequestHandler.php" style="margin-left:25px; margin-right:25px; ">
	<div class="card card-signin my-5" style="background-color: #f5ffbb;">
	<div class="card-body">
		<!-- <table width="80%" height="0"  border='1' align="center"><caption><font size="6" color="green"><b>SPECOM 2023: Registration Details</b></font></caption></table> -->
			<table width="100%" height="100" border='0' align="center">
			<tr><h3 style="color:black;"><b>Your Registration ID is <span style="color:red;"><?php echo $register_id; ?></span>. Please save this for the future reference.</b></h3></tr>	
			<tr>
					<td>Attendee Name :</td><td width="80%"><div class="form-group"><input type="text"  class="form-control" value="<?php echo $attendee_name; ?>" readonly /></div></td>
				</tr>
				<tr>
					<td>Email :</td><td width="80%"><div class="form-group"><input type="text"  class="form-control" value="<?php echo $attendee_email; ?>" readonly /></div></td>
				</tr>
				<?php
				 if($phone!="N/A"){
				?>
				<tr>
					<td>Mobile Number :</td><td width="80%"><div class="form-group"><input type="text"  class="form-control" value="<?php echo $phone; ?>" readonly /></div></td>
				</tr>
				<?php } ?>

				<?php 
				for($n =1; $n<=$num_paper;$n++){
					$paperid='paperid'.$n;
					$paper_id =$$paperid ;
					// echo $paper_id;
				 if($paper_id!= "N/A") { ?> 
				<tr>
					<td>Paper ID <?php echo $n; ?>:</td><td width="70%"><div class="form-group"><input type="text"  class="form-control" value="<?php echo $paper_id?>" readonly /></div></td>
				</tr>
				<?php } } ?>
				<!-- <tr>
					<td>Country Category :</td><td width="70%"><div class="form-group"><input type="text"  class="form-control" value="<?php echo $country_cat; ?>" readonly /></div></td>
				</tr> -->
				<tr>
					<td>Country Name :</td><td width="70%"><div class="form-group"><input type="text"  class="form-control" value="<?php echo $country_name; ?>" readonly /></div></td>
				</tr>
				
				<tr>
					<td>Registration Category :</td><td width="70%"><div class="form-group"><input type="text"  class="form-control" value="<?php echo $category; ?>" readonly /></div></td>
				</tr>
				<?php 
				if($iscaid!= "N/A") { ?> 
				<tr>
					<td>ISCA ID :</td><td width="70%"><div class="form-group"><input type="text"  class="form-control" value="<?php echo $iscaid?>" readonly /></div></td>
				</tr>
				<?php }  ?>
				
				<tr>
					<div class="form-group"><input type="hidden"  class="form-control" name="tid" id="tid" readonly /></div></td>
				</tr>
				<tr>
					<td><div class="form-group"><input type="hidden"  class="form-control" name="merchant_id" value="2581325" readonly/></div></td>
				</tr>
				<tr>
					<td></td><td><div class="form-group"><input type="hidden"  class="form-control" name="register_id" value="<?php echo $register_id; ?>" readonly/></div></td>
				</tr>
				<tr>
					<td></td><td><div class="form-group"><input type="hidden"  class="form-control" name="order_id" value="<?php echo $order_id; ?>" readonly/></div></td>
				</tr>
				<tr>
					<td>Amount	:</td><td width="70%"><div class="form-group"><input type="text"  class="form-control" name="amount" value="<?php echo $amount;?>" readonly/></div></td>
				</tr>
				<tr>
					<td>Currency	:</td><td width="70%"><div class="form-group"><input type="text"  class="form-control" name="currency" value="INR" readonly/></div></td>
				</tr>				
					<td></td><td><input type="hidden" name="redirect_url" value="https://specom2023-registration.iitdh.ac.in/ccavResponseHandler.php"/></td>
				</tr>
			 	<tr>
					<td></td><td><input type="hidden" name="cancel_url" value="https://specom2023-registration.iitdh.ac.in/register.php"/></td>
			    </tr>
			 	<!-- <tr>
					<td>Language	:</td><td><input type="text" name="language" value="EN"/></td>
				</tr> -->
		     	<!-- <tr>
		     		<td colspan="2">Billing information(optional):</td>
		     	</tr>
		        <tr>
		        	<td>Billing Name	:</td><td><input type="text" name="billing_name" value="Charli"/></td>
		        </tr>
		        <tr>
		        	<td>Billing Address	:</td><td><input type="text" name="billing_address" value="Room no 1101, near Railway station Ambad"/></td>
		        </tr>
		        <tr>
		        	<td>Billing City	:</td><td><input type="text" name="billing_city" value="Indore"/></td>
		        </tr>
		        <tr>
		        	<td>Billing State	:</td><td><input type="text" name="billing_state" value="MP"/></td>
		        </tr>
		        <tr>
		        	<td>Billing Zip	:</td><td><input type="text" name="billing_zip" value="425001"/></td>
		        </tr>
		        <tr>
		        	<td>Billing Country	:</td><td><input type="text" name="billing_country" value="India"/></td>
		        </tr>
		        <tr>
		        	<td>Billing Tel	:</td><td><input type="text" name="billing_tel" value="9876543210"/></td>
		        </tr>
		        <tr>
		        	<td>Billing Email	:</td><td><input type="text" name="billing_email" value="test@test.com"/></td>
		        </tr>
		        <tr>
		        	<td colspan="2">Shipping information(optional)</td>
		        </tr>
		        <tr>
		        	<td>Shipping Name	:</td><td><input type="text" name="delivery_name" value="Chaplin"/></td>
		        </tr>
		        <tr>
		        	<td>Shipping Address	:</td><td><input type="text" name="delivery_address" value="room no.701 near bus stand"/></td>
		        </tr>
		        <tr>
		        	<td>shipping City	:</td><td><input type="text" name="delivery_city" value="Hyderabad"/></td>
		        </tr>
		        <tr>
		        	<td>shipping State	:</td><td><input type="text" name="delivery_state" value="Andhra"/></td>
		        </tr>
		        <tr>
		        	<td>shipping Zip	:</td><td><input type="text" name="delivery_zip" value="425001"/></td>
		        </tr>
		        <tr>
		        	<td>shipping Country	:</td><td><input type="text" name="delivery_country" value="India"/></td>
		        </tr>
		        <tr>
		        	<td>Shipping Tel	:</td><td><input type="text" name="delivery_tel" value="9876543210"/></td>
		        </tr>
		        <tr>
		        	<td>Merchant Param1	:</td><td><input type="text" name="merchant_param1" value="additional Info."/></td>
		        </tr>
		        <tr>
		        	<td>Merchant Param2	:</td><td><input type="text" name="merchant_param2" value="additional Info."/></td>
		        </tr>
				<tr>
					<td>Merchant Param3	:</td><td><input type="text" name="merchant_param3" value="additional Info."/></td>
				</tr>
				<tr>
					<td>Merchant Param4	:</td><td><input type="text" name="merchant_param4" value="additional Info."/></td>
				</tr>
				<tr>
					<td>Merchant Param5	:</td><td><input type="text" name="merchant_param5" value="additional Info."/></td>
				</tr>
				<tr>
					<td>Promo Code	:</td><td><input type="text" name="promo_code" value=""/></td>
				</tr>
				<tr>
					<td>Vault Info.	:</td><td><input type="text" name="customer_identifier" value=""/></td>
				</tr>
		        <tr> -->
		        	<td></td><td><INPUT class="btn btn-success" TYPE="submit" value="Pay Now"></td>
					
		        </tr>
	      	</table>
</div>
</div>
	      </form>
				</div>
	</body>
</html>
<?php }
}
else
{
	header('Location: ./register.php');
}
?>

