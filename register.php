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
<title>ICEI 2024 REGISTRATION</title>
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
<body>

	
<?php 
$merchant_id = "2581325";
include 'db.php';


function randString($length, $charset='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')
{
    $str = '';
    $count = strlen($charset);
    while ($length--) {
        $str .= $charset[mt_rand(0, $count-1)];
    }

    return $str;
}

$unique_id1 = randString(7);
$unique_id2 = randString(7);  
while(mysqli_num_rows(mysqli_query($conn, "SELECT register_id FROM register_info WHERE register_id = '".mysqli_real_escape_string($conn, $unique_id1)."'")) > 0) { 
   $unique_id1 = randString(7);   
}
while(mysqli_num_rows(mysqli_query($conn, "SELECT order_id FROM order_id_info WHERE order_id = '".mysqli_real_escape_string($conn, $unique_id2)."'")) > 0) { 
  $unique_id2 = randString(7);   
}

session_start();
$_SESSION['register_id']= $unique_id1;
$_SESSION['order_id']= $unique_id2;
if (isset($_SESSION['block']) and $_SESSION['block']===true ) {
  $_SESSION['block']=false;
    header('Location: ./register.php');
}
?>
<script>
  var block = localStorage.getItem("block");

window.addEventListener("beforeunload", function() {
    if (block === 1) {
        const block = true;
    }
});

if (block) {
    const inputs = document.getElementsByTagName('input');
    for (input of inputs) {
        input.value = '';
    }
}
</script>


<script>
  // Function to disable the submit button
  function disableSubmitButton() {
    document.getElementById("submitBtn").disabled = true;
    document.getElementById("submitBtn").value = "Please wait ..";
  }
</script>



  <div class="login_section"> 
    
    <div class="row">
    <div class="container">
      
     <div style="text-align: center; margin-top:20px; ">
     
   <h3 style="font-size: 40px; color: #061165; display: inline;"><b>ICEI 2024 :</b>  </h3><h3 style="font-size: 40px; color:#3667b0; display: inline ;"><b> REGISTER HERE</b></h3>
</div>
<div>
  <p style="text-align:center; color:black;"><b>If you have already registered, check your registration status </b><a href="checkStatus.php"><u>here</u></a>.</p>
</div>
      <div class="col-sm-9 col-md-7 col-lg-10 mx-auto">
        <div class="card card-signin my-5">
        
          <div class="card-body">
          <span style="color:red">* Please fill all mandatory fields</span>
            <h1 class=" text-center"><b>ATTENDEE INFORMATION</b></h1>
            <div class="panel-body">
            
            <form action="payment.php" method="post" enctype="multipart/form-data" autocomplete="off" onsubmit="disableSubmitButton()">
              <div class="form-group">
                <label for="name"> Name</label><span style="color:red"> *</span>
                <input
                  type="text"
                  class="form-control"
                  id="name"
                  name="name"
                  required
                />
              </div>
              <div class="form-group">
                <label for="email">Email</label><span style="color:red"> *</span>
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  name="email"
                  required
                />
              </div>            

            
              <div class="form-group">
                <label for="phone">Phone number</label>
                <div class="row">
                  <div class="col-lg-4">
                    <select class="form-control" id="countryCode" name="countryCode" style="display:inline;">                    
                      <option value="">Select</option>
                      <?php
                      include "db.php";
                      $result = mysqli_query($conn, "SELECT * FROM countries");
                      
                      while ($row = mysqli_fetch_array($result)) {
                      ?>
                      <option value="<?php echo $row["phone"]; ?>"><?php echo $row["name"]." +".$row["phone"]; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                    
                  </div>
                  <div class="col-lg-8">
                  <input
                   type="text"
                   class="form-control"
                   id="phone"
                   name="phone"                   
                  />
                  </div>

                </div>
                
              </div>
              
              <div class="form-group">   
              <label for="gender">Gender</label><span style="color:red"> *</span>             
                <select                  
                  class="form-control"
                  id="gender"
                  name="gender"
                  required
                 >
                 <option selected value=""> Choose your Gender</option>
                <option value="Female">Female</option>
                <option value="Male">Male</option>
                <option value="Other">Other</option>
                </select >
              </div>
              
  
              <div class="form-group">
                <label for="address">Affiliation Address</label><span style="color:red"> *</span>
                <textarea                  
                  class="form-control"
                  id="address"
                  name="address"
                  required
                 ></textarea >
              </div>
              <div>              
              <h1 class="text-center"><b>REGISTRATION INFORMATION</b></h1>
              </div>

              <div class="form-group">
                <label for="paper_id_select">Do you want to register with paper ?</label>
                <input type="checkbox" id="paperBox" />
              </div>
              <div class="row">
              <div class="col-lg-4">
                  <div class="form-group">
                  <label for="num_paper"> Number of Papers</label><span style="color:red"> *</span> 
                  <select                  
                  class="form-control"
                  id="num_paper"
                  name="num_paper"
                  required
                  disabled
                 >
                 <option selected value=""> Select</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                </select >
                    
                  </div>
                  </div>
                  <div class="col-lg-8">
                  <label for="paper_id"> Paper ID</label><span style="color:red"> *</span>
                  <div class="table-responsive">
                    <table class="table" id="dynamic_field">
                      <tr>
                        <!-- <td><input type="text" name="skill[]" placeholder="Enter Paper 1 ID" class="form-control name_list" /></td> -->
                      </tr>
                    </table> 
                  </div>
                  <!-- <div class="col-lg-8">
                  <div class="form-group">
                <label for="paper_id"> Paper ID</label><span style="color:red"> *</span> 
                <input
                  type="text"
                  class="form-control"
                  id="paper_id"
                  name="paper_id"
                  disabled
                  required
                />
                    </div>
                    </div> -->
                </div>
                </div>
              <div class="form-group"> 
                <div class="row">
                  <!-- <div class="col-lg-4">
                  <label for="country_cat">Country Category</label><span style="color:red"> *</span>             
                <select                  
                  class="form-control"
                  id="country_cat"
                  name="country_cat"
                  required
                 >
                 <option selected value=""> Select</option>
                <option value="0">SAARC</option>
                <option value="1">Other</option>
                </select >

                  </div> -->
                  <div class="col-lg-8">
                  <label for="country_name">Country Name</label><span style="color:red"> *</span>             
                <select                  
                  class="form-control"
                  id="country_name"
                  name="country_name"
                  required
                 >
                 <option selected value=""> Choose your Country Name</option>                     
                </select >

                  </div>
                

                </div>  
              
              </div>
              
              <div class="form-group">   
              <label for="category">Registration Category</label> <span style="color:red"> *</span>            
                <select                  
                  class="form-control"
                  id="category"
                  name="category"
                  required
                 >
                <option selected value=""> Choose your  Registration Category</option> 
                </select >
                <br>
                <div id="student_upload" style="display: none;">
                  <label for="student_id_card">Upload Student College ID Card (Image or PDF):</label>
                  <input type="file" id="student_id_card" name="student_id_card" accept="image/*,.pdf">
                </div>
              </div> 
              <div class="form-group">
                <label for="paper_id_select">Are you an IEEE Member ?</label>
                <!-- <span style="color:red ; margin-top:0px">(Applicable only for Non-SAARC country.)</span>  -->
                <input type="checkbox" id="iscaBox" />
                <br> 

                <label for="isca_id"> IEEE Membership ID</label><span style="color:red"> *</span> 
                <input
                  type="text"
                  class="form-control"
                  id="isca_id"
                  name="isca_id"
                  disabled
                  required
                />
                <br>
                <label for="ieee_membership_card">Upload the scanned copy of IEEE membership card (Image/PDF): <span style="color:red"> *</span> </label>
                <input type="file" id="ieee_membership_card" name="ieee_membership_card" accept="image/*,application/pdf" disabled required>
              </div>
              
              <br><br>
              <div class="d-grid gap-2 col-2 mx-auto">
              <input type="hidden" name="submit1">
              <input type="submit" name="submit" id="submitBtn" class="btn btn-primary" value="Next Step">
              </div>
            </form>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    </div>
  </div>
  <!-- login section end-->

  
  <!-- footer section end-->
  <!-- copyright section start-->
  <div class="copyright_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <p class="copyright_text">Copyright 2024 All Right Reserved By <a target=”_blank” href="https://www.iitdh.ac.in/">IIT Dharwad</a></p>
        </div>
        <div class="col-md-6">
          <p class="cookies_text">Cookies, Privacy and Terms</p>
        </div>
      </div>
    </div>
  </div>
  <!-- copyright section end-->

    <script>document.getElementById('paperBox').onchange = function() {
    document.getElementById('num_paper').disabled = !this.checked;
    // document.getElementById("country_cat").selectedIndex = 0;
    // $("#category").html('<option value="">Choose your  Registration Category</option>');
    // $("#country_name").html('<option value=""> Choose your Country Name</option>');
    if(!this.checked)
    {
     document.getElementById("num_paper").selectedIndex = 0;     
      var table = document.getElementById("dynamic_field");
      var rowCount = table.rows.length;
      while(table.rows.length > 0) {
          table.deleteRow(0);
      }
    };
    };
</script>

<script>
  // document.getElementById('country_cat').onchange = function() {
  //   var cc = document.getElementById('country_cat').value;
  
  // if (cc==0)
  //    { document.getElementById('isca_id').value='';
  //     document.getElementById('iscaBox').disabled=true;
  //     document.getElementById('isca_id').disabled=true;
  //     $('#iscaBox').prop('checked', false);}
  //     else
  //     {document.getElementById('iscaBox').disabled=false;}

  // };
  

  document.getElementById('iscaBox').onchange = function() {
      document.getElementById('isca_id').disabled = !this.checked;
      if(!this.checked)
      {document.getElementById('isca_id').value='';};
      document.getElementById('ieee_membership_card').disabled = !this.checked;
  };

  document.getElementById('category').onchange = function() {
  var selectedCategory = this.value;
  var studentUploadSection = document.getElementById('student_upload');
  if (selectedCategory == '4') { // Category value for students
    studentUploadSection.style.display = 'block';
    document.getElementById('student_id_card').required = true;
  } else {
    studentUploadSection.style.display = 'none';
    document.getElementById('student_id_card').value = '';
    document.getElementById('student_id_card').required = false;
  }
};



</script>

<!-- <script>
  document.getElementById('iscaBox').onchange = function() {
    var ieeeUploadSection = document.getElementById('ieee_upload_section');
    if (this.checked) {
      ieeeUploadSection.style.display = 'block';
    } else {
      ieeeUploadSection.style.display = 'none';
      document.getElementById('ieee_membership_card').value = ''; // Clear the file input
    }
  };
</script> -->


    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="js/jquery.fancybox.min.js"></script>
      <script src="js/jquery-3.5.1.min.js"  crossorigin="anonymous"></script>
      <script>
$(document).ready(function(){

$('#num_paper').on('change', function(){
  var table = document.getElementById("dynamic_field");
  var rowCount = table.rows.length;
  // document.getElementById("country_cat").selectedIndex = 0;
  // $("#country_name").html('<option value=""> Choose your Country Name</option>');
  // $("#category").html('<option value="">Choose your  Registration Category</option>');    
  
   while(table.rows.length > 0) {
  table.deleteRow(0);
}

var num_paper = document.getElementById('num_paper').value;

for (var n = 1; n <= num_paper; n++) {
  
  $('#dynamic_field').append('<tr id="row'+n+'"><td style="padding:.375rem; border-top:0px;"><input type="text" name="paper_ids[]" placeholder="Enter Paper '+n+' ID" class="form-control" required /></td></tr>');
}
});
$(document).on('click', '.btn_remove', function(){
var button_id = $(this).attr("id"); 
$('#row'+button_id+'').remove();
});
});
</script> 


     

        <script>
            $(document).ready(function() {
                $.ajax({
                    url: "./get_category.php",
                    type: "POST",
                    data: {
                      all_categories: true
                    },
                    cache: false,
                    success: function(result) {
                        $("#category").html(result);
                    }
                });
            });
        </script>
        <script>
          $(document).ready(function() {
              // Fetch all countries on page load
              $.ajax({
                  url: "./get_countries.php",
                  type: "POST",
                  data: {
                      all_countries: true
                  },
                  cache: false,
                  success: function(result) {
                      $("#country_name").html(result);
                  }
              });
          });
        </script>
</body>
</html>