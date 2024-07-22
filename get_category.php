<?php
include "db.php";
// $country_id = $_POST["country_id"];
// $paper_status = $_POST["paper_status"];
// if($paper_status>0)
//  {$full_register=1;}
// else
//  {$full_register=0;}
// $result = mysqli_query($conn, "SELECT * FROM reg_category where full_registeration_status = $full_register ");


$result = mysqli_query($conn, "SELECT * FROM reg_category");
?>
<option value="">Choose your  Registration Category</option>
<?php
while ($row = mysqli_fetch_array($result)) {
    ?>
    <option value="<?php echo $row["s_no"]; ?>"><?php echo $row["category_name"]; ?></option>
    <?php
}
mysqli_close($conn);
?>