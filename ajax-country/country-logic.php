<?php

$db = new mysqli('localhost', 'root', '', 'country');
$countryId = $_GET['country_id'];

$result = $db->query("SELECT * FROM `states` WHERE `country_id`='$countryId'");
// print_r($result);
// echo $db->error;
while ($row = $result->fetch_object()) {
?>
    <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>

<?php }  ?>