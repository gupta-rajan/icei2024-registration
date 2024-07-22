<?php
include 'db.php';
$configs = include('config.php');

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

$target_dir_student = "uploads/students/";
$target_dir_ieee = "uploads/ieee/";

$student_id_card = "";
$ieee_membership_card = "";

// Check if student ID card is uploaded
if (isset($_FILES["student_id_card"]) && $_FILES["student_id_card"]["error"] == 0) {
    $target_file_student = $target_dir_student . basename($_FILES["student_id_card"]["name"]);
    move_uploaded_file($_FILES["student_id_card"]["tmp_name"], $target_file_student);
    $student_id_card = $target_file_student;
}

// Check if IEEE membership card is uploaded
if (isset($_FILES["ieee_membership_card"]) && $_FILES["ieee_membership_card"]["error"] == 0) {
    $target_file_ieee = $target_dir_ieee . basename($_FILES["ieee_membership_card"]["name"]);
    move_uploaded_file($_FILES["ieee_membership_card"]["tmp_name"], $target_file_ieee);
    $ieee_membership_card = $target_file_ieee;
}

$registration_type = $configs['registration_type'];

if ($registration_type==0)
 {  $rti='early_amount_INR';
	$isca_fee='early_amount_ISCA';
 }
else
{   $rti='normal_amount_INR';
	$isca_fee='normal_amount_ISCA';	
}


$result = mysqli_query($conn, "SELECT * FROM reg_category"); 

while ($row = mysqli_fetch_array($result)) { 
	 $category_list[] = $row['category_name'];   
     $amount_list_inr[] = $row[$rti];
	 $amount_list_isca[] = $row[$isca_fee];	 	 
}

if (isset($_POST["submit1"]) && !empty($_POST))
{	
	// echo "POST";
	session_start();
	$_SESSION['block'] = true;
	$country_pcode = "N/A";
	$phone = "N/A";
	$num_paper = 0;
	$paper_ids= array();	
	$paper_id1="N/A";
	$paper_id2="N/A";
	$paper_id3="N/A";
	$paper_id4="N/A";
	$paper_id5="N/A";
	$paper_id6="N/A";
	$paper_id7="N/A";
	$paper_id8="N/A";
	$paper_id9="N/A";
	$paper_id10="N/A";
	$paper_id11="N/A";
	$paper_id12="N/A";
	$paper_id13="N/A";
	$paper_id14="N/A";
	$paper_id15="N/A";

	$isca_id="N/A";
	$order_id = $_SESSION['order_id'];
	$register_id = $_SESSION['register_id'];

	$name = $_POST['name'];
	$email = $_POST['email'];
	if(isset($_POST['countryCode']))
	{	$country_pcode = $_POST['countryCode'];}
	
	if(isset($_POST['phone']) and trim($_POST['phone']) != '')
	{	$phone = $_POST['phone'];}

	if(isset($_POST['num_paper']))
	{	$num_paper = $_POST['num_paper'];}

	if(isset($_POST['paper_ids']))
	{	$paper_ids = $_POST['paper_ids'];}
	
	$gender = $_POST['gender'];
	$address = $_POST['address'];
	$category_id = $_POST['category'];	
	
	// echo "<script>console.log('cat_id " . $category_id . "');</script>";
	
	if($num_paper > 0 and trim($_POST["paper_ids"][0] != '')) {
		$paper_id1 = $paper_ids[0];
	}
	if($num_paper > 1 and trim($_POST["paper_ids"][1] != '')) {
		$paper_id2 = $paper_ids[1];
	}
	if($num_paper > 2 and trim($_POST["paper_ids"][2] != '')) {
		$paper_id3 = $paper_ids[2];
	}
	if($num_paper > 3 and trim($_POST["paper_ids"][3] != '')){
		$paper_id4 = $paper_ids[3];
	}
	if($num_paper > 4 and trim($_POST["paper_ids"][4] != '')){
		$paper_id5 = $paper_ids[4];
	}
	if($num_paper > 5 and trim($_POST["paper_ids"][5] != '')){
		$paper_id6 = $paper_ids[5];
	}
	if($num_paper > 6 and trim($_POST["paper_ids"][6] != '')){
		$paper_id7 = $paper_ids[6];
	}
	if($num_paper > 7 and trim($_POST["paper_ids"][7] != '')){
		$paper_id8 = $paper_ids[7];
	}
	if($num_paper > 8 and trim($_POST["paper_ids"][8] != '')){
		$paper_id9 = $paper_ids[8];
	}
	if($num_paper > 9 and trim($_POST["paper_ids"][9] != '')) {
		$paper_id10 = $paper_ids[9];
	}
	if($num_paper > 10 and trim($_POST["paper_ids"][10] != '')) {
		$paper_id11 = $paper_ids[10];
	}
	if($num_paper > 11 and trim($_POST["paper_ids"][11] != '')) {
		$paper_id12 = $paper_ids[11];
	}
	if($num_paper > 12 and trim($_POST["paper_ids"][12] != '')) {
		$paper_id13 = $paper_ids[12];
	}
	if($num_paper > 13 and trim($_POST["paper_ids"][13] != '')) {
		$paper_id14 = $paper_ids[13];
	}
	if($num_paper > 14 and trim($_POST["paper_ids"][14] != '')) {
		$paper_id15 = $paper_ids[14];
	}

	// $country_id = $_POST['country_cat'];

	$np=0;
	if($num_paper==0)
	{ $np=1; }
	else
	{ $np=$num_paper; }

	$currency="INR";

	if (isset($_POST["isca_id"]) and $_POST['isca_id']!=NULL) {
		$isca_id = $_POST['isca_id'];
		// echo "<script>console.log('cat_id " . $category_id . "');</script>";
		$amount=$amount_list_isca[$category_id-1]*$np;
		// echo "<script>console.log('Amount: " . $amount . "');</script>";
	}
	else{
		// echo "<script>console.log('cat_id " . $category_id . "');</script>";
		$amount=$amount_list_inr[$category_id-1]*$np;
		// echo "<script>console.log('Amount: " . $amount . "');</script>";
	}

	// if ($country_id==0){
	// 	$country_cat= "SAARC"; }
	// else {   
	// 	$country_cat = "Other"; }

	$country_name = $_POST['country_name'];
	
	$category_id = $_POST['category'];
	$category = $category_list[$category_id-1];	


	//Create an instance; passing `true` enables exceptions
	$mail = new PHPMailer(true);
	$sql = "INSERT INTO `register_info`(`register_id`,`name`, `email` ,`country_pcode`, `phone`, `gender` ,  `address`,`num_papers`,`paper_id1`,`paper_id2`,`paper_id3`,`paper_id4`,`paper_id5`,`paper_id6`,`paper_id7`,`paper_id8`,`paper_id9`,`paper_id10`,`paper_id11`,`paper_id12`,`paper_id13`,`paper_id14`,`paper_id15`, `country_name`, `category`, `amount`,`currency`,`order_id`,`isca_id`,`student_id_card_path`, `ieee_membership_card_path`) VALUES ('$register_id','$name','$email','$country_pcode','$phone','$gender','$address','$num_paper','$paper_id1','$paper_id2','$paper_id3','$paper_id4','$paper_id5','$paper_id6','$paper_id7','$paper_id8','$paper_id9','$paper_id10','$paper_id11','$paper_id12','$paper_id13','$paper_id14','$paper_id15','$country_name','$category','$amount','$currency','$order_id','$isca_id','$student_id_card', '$ieee_membership_card')";
	$sql_pay ="INSERT INTO `payment_info`(`register_id`,`order_id`,`amount`) VALUES ('$register_id','$order_id', '$amount')";
	$sql_order_id ="INSERT INTO `order_id_info`(`order_id`,`register_id`) VALUES ('$order_id','$register_id')";
	$sql_mail = "UPDATE `register_info` SET `mail_status`=1 WHERE `order_id`='$order_id'";
	
	if(mysqli_query($conn,$sql) and mysqli_query($conn,$sql_pay) and mysqli_query($conn,$sql_order_id) )

	{
		try {
			//Server settings
			// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'icei2024_registration@iitdh.ac.in';                     //SMTP username
			$mail->Password   = 'jyoyulibjqyadgaq';                               //SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
			$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
		
			//Recipients
			$mail->setFrom('icei2024@iitdh.ac.in', 'ICEI 2024 Registration');
			$mail->addAddress($email, $name);     //Add a recipient
			
			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'ICEI 2024 Registration Details';
			$mail->Body    = " Dear $name, <br> <br>
		
						  Thank you for registering for ICEI 2024. Your registration ID is '<b>$register_id</b>'.
						  Kindly use it for future reference. <br> <br>

						  <b>REGISTRATION CATEGORY: </b> $category
						  <br> <br>
						  <b>REGISTRATION AMOUNT: </b> INR $amount
						  <br> <br>

						  After payment, you can use this registration ID to generate the payment receipt.
						  Looking forward to meeting you at the conference. 
						  
						  <br> <br>
		
						  Best Regards,<br>
						  ICEI 2024 Organizing Committee
		
		
						   ";
			// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		
			$mail->send();
			mysqli_query($conn,$sql_mail);
			// header('Location: ./payment_new.php');

			// echo 'Message has been sent';
		} catch (Exception $e) {
			// echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}  	
		
		
	}
	else
	{
		// echo "error: ".mysqli_error($conn);
		echo "<script>alert('Error! Try Again')</script>"; 
		header('Location: ./register.php');
	}
	mysqli_close($conn);
}
else
{   header('Location: ./register.php');
	// echo "NO POST";
}




?>


