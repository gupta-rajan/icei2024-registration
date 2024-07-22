<?php
include "db.php";
// $country_id = $_POST["country_id"];
$result = mysqli_query($conn, "SELECT * FROM countries");
?>
<option value=""> Choose your Country Name</option>
<?php
while ($row = mysqli_fetch_array($result)) {
    ?>
    <option value="<?php echo $row["name"]; ?>"><?php echo $row["name"]; ?></option>
    <?php
}
mysqli_close($conn);
?>