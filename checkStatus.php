<?php include('Status_API.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Status</title>
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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css">

</head>
<body>

<div style="text-align: center; margin-top:20px; ">
   <h3 style="font-size: 40px; color:#061165; display: inline;"><b>ICEI 2024:</b>  </h3><h3 style="font-size: 40px; color:#5cb1e9; display: inline ;"><b> REGISTRATION STATUS</b></h3>
	<div class="card-body card-signin my-4">
     <form action="" method="post" autocomplete="off">
        <input type="text" class="form-control" name="register_id" id ="register_id" placeholder=" Enter Registration ID" required>
        <br>
        <input type="submit" name='checkStatus' class="btn btn-primary" value="Check Status"  />    
     </form>
	</div>    
</div>
    
</body>
</html>

<?php
session_start();
unset($_SESSION['testcomplete']);

include 'db.php';
if (isset($_POST['checkStatus']))
{  
	$register_id = $_POST['register_id'];

	$get_oid_sql1 = mysqli_query($conn,"select `order_id` from order_id_info where `register_id` = '$register_id' ORDER BY s_no DESC LIMIT 1;");
	$get_oid_sql2 = mysqli_query($conn,"select `order_id` from register_info where `register_id` = '$register_id'");
	$get_oid_sql3 = mysqli_query($conn,"select `order_id` from payment_info where `register_id` = '$register_id'");
	
	if ($get_oid_sql1->num_rows > 0){
	$row_oid = mysqli_fetch_array($get_oid_sql1);	
	$order_id = $row_oid["order_id"];
	}
	else if ($get_oid_sql2->num_rows > 0){
		$row_oid = mysqli_fetch_array($get_oid_sql2);	
		$order_id = $row_oid["order_id"];
	}
	else if ($get_oid_sql3->num_rows > 0){
			$row_oid = mysqli_fetch_array($get_oid_sql3);	
			$order_id = $row_oid["order_id"];
			}
	else
	{$order_id="N/A"; ?> <center> <br> <div class="alert alert-danger" role="alert"> <?php
		echo "Kindly contact the website admin. ";
	  
		?> </div> <?php 
	}
	
    
	$data_api = statusAPI($order_id);
	// echo $data_api->order_status;
    if ($data_api)
	{ if($data_api->order_status ==="Shipped")
		{   $order_status_api="Success";
			
		}
	  else if($data_api->order_status ==="Initiated" || $data_api->order_status ==="Awaited")
		{   $order_status_api="Pending";
			
		}
		else if($data_api->order_status ==="Unsuccessful")
		{   $order_status_api="Failure";			
		}
		else
		{
			$order_status_api=$data_api->order_status;
		}
	}
	else
	{ $order_status_api="No_data";
		// echo "No_data";
	}
	
	// echo $order_status_api;
	
	$sql = "SELECT register_info.`name`, register_info.`email`, register_info.`phone`, register_info.`num_papers`,register_info.`paper_id1`,register_info.`paper_id2`,register_info.`paper_id3`,register_info.`paper_id4`,register_info.`paper_id5`,register_info.`paper_id6`,register_info.`paper_id7`,register_info.`paper_id8`,register_info.`paper_id9`,register_info.`paper_id10`,register_info.`paper_id11`,register_info.`paper_id12`,register_info.`paper_id13`,register_info.`paper_id14`,register_info.`paper_id15`, register_info.`country_cat`, register_info.`category`, register_info.`isca_id`,register_info.`register_status`, payment_info.`transaction_id`,payment_info.`bank_ref_no`,payment_info.`currency`, payment_info.`billing_name`, payment_info.`amount`,payment_info.`payment_status`, payment_info.`date` FROM register_info CROSS JOIN payment_info WHERE register_info.`order_id`= payment_info.`order_id` AND payment_info.`order_id` = '$order_id' ";
	$result = $conn->query($sql);

    if ($result->num_rows > 0) 
	{		
		// echo "db";
        while($row = $result->fetch_assoc()) 
		{
            $attendee_name = $row["name"];	
	        $attendee_email = $row["email"];
	        $reg_category = $row["category"];
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
			$register_status = $row["register_status"];
			$order_status_db = $row["payment_status"];
			//  echo $register_status;
			//  echo $order_status_db;
			

			if ( ($order_status_db != $order_status_api or $register_status != $order_status_api)  && $order_status_api!="No_data")
			{   $transaction_id = $data_api->reference_no;
				$bank_ref_no = $data_api->order_bank_ref_no;
				$amount = $data_api->order_amt;				
				$trans_date = $data_api->order_date_time;
				$billing_name = $data_api->order_bill_name;
				$sql1 = "UPDATE `payment_info` SET `transaction_id` = '$data_api->reference_no', `bank_ref_no` = '$data_api->order_bank_ref_no', `billing_name`='$data_api->order_bill_name', `amount`= '$data_api->order_amt', `payment_status`='$order_status_api' 
	            WHERE `order_id`='$order_id'";
                $sql2 = "UPDATE `register_info` SET `register_status`='$order_status_api' WHERE `order_id`='$order_id'";
                if(mysqli_query($conn,$sql1) and mysqli_query($conn,$sql2))
				     {  $order_status_db =$order_status_api;
					 }
				else { echo "Error: " . $sql1 . "<br>" . $conn->error; }                                    
                                
			}
			else 
			{   $transaction_id = $row["transaction_id"];
				$bank_ref_no = $row["bank_ref_no"];
				$amount = $row["amount"];
				$currency = $row["currency"];
				$trans_date = $row["date"];
				$billing_name = $row["billing_name"];}    	
			
        }		
	    
	    	$conn->close();
	    
	    	?>
	    	<div class="container">
	    	<div class="row">
	    	<!-- </div> -->
	    	<div class="col-md-12 col-sm-12 col-lg-7 text-center col-md-offset-3">
	    	<?php
	    	echo "<center>";
	    	if($order_status_db==="Success")
	    	   {    
	    			?><br> <div class="alert alert-success" role="alert"> <?php
	    			echo "Your transaction was successful.";
	    			?> </div>
	    			<?php
	    		}
	    	
	    	else if($order_status_db==="Aborted")
	    	   {   ?><br> <div class="alert alert-danger" role="alert"> <?php
	    		    echo "This transaction was aborted.";
	    		    ?> </div>
	    		    <?php
	    	    }
    
	    	else if($order_status_db==="Pending")
	    	   {   ?><br> <div class="alert alert-warning" role="alert"> <?php
	    		   echo "Payment is pending." ;
	    		   ?> </div>
	    		   <?php
	    	    }
    
	    	else if($order_status_db==="Failure")
	    	   {   ?><br> <div class="alert alert-danger" role="alert"> <?php
	    		   echo "Please Try Again! The transaction has been declined.";
	    		   ?> </div>
	    		   <?php
	    	    }
    
	    	else
	    	   {  ?><br> <div class="alert alert-danger" role="alert"> <?php
	    		  echo "Sorry, no information can be found with this registration ID. Please register again.";
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
	    	
	    if($order_status_db!="Success")
	        { echo"
	    	
	    	    <table class='table'>
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
	                	<th>Status</th>
	                	<td>$order_status_db</td>
	                  </tr>
	                  <tr>
	                	<th>IEEE Membership ID (if any)</th>
	                	<td>$iscaid</td>
	                  </tr>
	                </tbody>
	            </table>
	    
	            <form method='post' name='' action='payment_again.php'>
	            <input type='hidden'  name='register_id' value=$register_id readonly/>
	      
	            <input type='submit' name='pay_again_btn' class='btn btn-success' value='Proceed to payment' />
	            <button class='btn btn-secondary' onclick='window.location.href=`register.php`'>Back to Home</button>
	            </form>
	            <hr>
	            " ; 
	    	}
	    else if($order_status_db==="Success") { 
	    	echo"
	    	
	    	    <table class='table'>
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
	                	<th>Status</th>
	                	<td>$order_status_db</td>
	                  </tr>
	                  <tr>
	                	<th>ISCA ID (if any)</th>
	                	<td>$iscaid</td>
	                  </tr>
					  <tr>
	                    <th>Transaction ID</th>
	                    <td>$transaction_id</td>
                      </tr>
                      <tr>
                        <th>Bank Reference No.</th>
                        <td>$bank_ref_no</td>
                      </tr>
                      <tr>
                        <th>Amount</th>
                        <td>$amount / INR </td>
                      </tr>
                      <tr>
                        <th>Trasaction Datetime</th>
                        <td>$trans_date </td>
                      </tr>
	                </tbody>
	            </table>
	    
	      
	            <button class='btn btn-warning' onclick='window.print()'>Print payment receipt</button>
	            <button class='btn btn-secondary' onclick='window.location.href=`register.php`'>Back to Home</button>	        
	            <hr>
	            " ; 
	        }
	    
    
    } 
    
    else{   
		try{ 
			// echo "api";
			   error_reporting(0);
			   $working_key = '49C16B167402F3D3EA6746C05052CA6E'; //Shared by CCAVENUES
			   $access_code = 'AVIR79KF77BN63RINB';
		   
			   $merchant_json_data =
			   array(
			   	'order_no' => $order_id,
			   	'reference_no' =>''
			   );
		   
			   $merchant_data = json_encode($merchant_json_data);
			   $encrypted_data = encrypt($merchant_data, $working_key);
			   $final_data = 'enc_request='.$encrypted_data.'&access_code='.$access_code.'&command=orderStatusTracker&request_type=JSON&response_type=JSON&version=1.2';
			   
			   $ch = curl_init();
			//    echo $merchant_data;
		   
			   curl_setopt($ch, CURLOPT_URL, "https://apitest.ccavenue.com/apis/servlet/DoWebTrans");
			   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			   curl_setopt($ch, CURLOPT_VERBOSE, 1);
			   // curl_setopt($ch, CURLOPT_HTTPHEADER,'Content-Type: application/json') ;
			   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			   curl_setopt($ch, CURLOPT_POST, 1);
			   curl_setopt($ch, CURLOPT_POSTFIELDS, $final_data);
		   
			   // Get server response ...
			   // echo "result: ";
			   $result = curl_exec($ch);
			   //echo $result;
			   curl_close($ch);
			   $status = '';
			   $information = explode('&', $result);
			   $dataSize = sizeof($information);
			   for ($i = 0; $i < $dataSize; $i++) 
			     {
			   	   $info_value = explode('=', $information[$i]);
			   	   if($info_value[0] == 'enc_response') 
				      { $status = decrypt(trim($info_value[1]), $working_key); }
			      }
		      
			    // echo 'Status revert is: '.'<pre>';
			    $obj = json_decode($status);
			    
			    $transaction_id_api = $obj->reference_no;
			    $bank_ref_no_api = $obj->order_bank_ref_no;
			    $payment_mode_api = $obj->payment_mode;
			    $order_status_api = $obj->order_status;
			    $amount_api = $obj->order_amt;
			    $currency_api = $obj->order_currncy;
			    $billing_name_api=$obj->order_bill_name;
			    $order_date_time_api = $obj->order_date_time;
			   ?>
		    <div class="container">
		        <div class="row"></div>
	            <div class="col-md-6 col-sm-6 col-lg-6 col-6 text-center col-md-offset-3">
		            <?php
		               echo "<center>";
		               if($order_status_api==="Shipped")
		               { $order_status_api='Success';
		               	 ?><br> <div class="alert alert-success" role="alert"> <?php
		               	 echo "Your transaction was successful.";
		               	 ?> </div>
		               	 <?php		
		                }	
    
		               else if($order_status_api==="Aborted")
		               { ?><br> <div class="alert alert-danger" role="alert"> <?php
		               	 echo "Please Register Again! This transaction was aborted. <br>";
						 echo "<button class='btn btn-warning' onclick='window.location.href=`register.php`'>Register here</button>";
		               	 ?> </div>
		               	 <?php
		                } 
		               
		               else if($order_status_api==="Failure")
		               { ?><br> <div class="alert alert-danger" role="alert"> <?php
		               	 echo "Please Register Again! the transaction has been declined. <br> ";
						 echo "<button class='btn btn-warning' onclick='window.location.href=`register.php`'>Register here</button>";
		               	 ?> </div>
		               	 <?php
		                }
    
		               else if($order_status_api==="Initiated")
		               { $order_status_api='Pending';   
		               	 ?><br> <div class="alert alert-warning" role="alert"> <?php
		               	 echo "Please Register Again! <br>";
						 echo "<button class='btn btn-warning' onclick='window.location.href=`register.php`'>Register here</button>";
		               	 ?> </div>
		               	 <?php
		                }
    
		               else
		               { ?><br> <div class="alert alert-danger" role="alert"> <?php
		               	 echo "No information can be found with this registration ID. Please register again. <br>";
						 echo "<button class='btn btn-warning' onclick='window.location.href=`register.php`'>Register here</button>";
		               	 ?> </div>
		               	 <?php
		                }
						

		               if($order_status_api=="Success"){
		               echo"<table class='table'>
	                           <thead>
	                              <tr>
	                           	    <th>Registeration ID</th>
	                           	    <th> $register_id </th>
	                               </tr>
	                           </thead>
	                           <tbody>	
	                               <tr>
	                                 <th>Transaction ID</th>
	                                  <td>$transaction_id_api</td>
                                   </tr>
                                 	<tr>
                                 	  <th>Bank Reference No.</th>
                                 	  <td>$bank_ref_no_api</td>
                                 	</tr>
                                 	<tr>
                                 	  <th>Status</th>
                                 	  <td>$order_status_api</td>
                                 	</tr>
		    						<tr>
                                 	  <th>Total Amount</th>
                                 	  <td>$amount_api / $currency_api </td>
                                 	</tr>
                                 	<tr>
                                 	  <th>Billing Name</th>
                                 	  <td>$billing_name_api </td>
                                    </tr>
                                 	<tr>
                                 	  <th>Transaction Date</th>
                                 	  <td>$order_date_time_api</td>
                                 	</tr>
		    						
		    					</tbody>
                            </table>
                                 	  
                            <button class='btn btn-warning' onclick='window.print()'>Print payment receipt</button>
                            <button class='btn btn-secondary' onclick='window.location.href=`register.php`'>Back to Home</button>
	                        <hr>" ; 

							include 'db.php';
							
							$sql3 ="INSERT INTO `payment_info`(`register_id`,`order_id`,`transaction_id`, `bank_ref_no`, `billing_name`, `amount`, `payment_status`) 
							VALUES ('$register_id','$order_id','$transaction_id_api','$bank_ref_no_api', '$billing_name_api', '$amount' , '$order_date_time_api')";
                                
							if(mysqli_query($conn,$sql3))
								{ echo "COPYRIGHT @ SPECOM-2023"; }
							
							else { echo "Kindly contact the website admin."; }
                            mysqli_close($conn);
					   
	                    
	                    		
	        }
		}
	        catch (Exception $e){ echo "Kindly contact the website admin."; }
	    }
}


?>
