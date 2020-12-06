<?php
$db = new mysqli('localhost', 'root', '', 'country');
$stateId = $_GET['state_id'];

$result = $db->query("SELECT * FROM `cities` WHERE `state_id`='$stateId'");
// print_r($result);
// echo $db->error;
while ($row = $result->fetch_object()) {
?>
    <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>

<?php }  ?>