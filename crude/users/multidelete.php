<?php
include('../connection.php');

for ($i = 0; $i < count($_POST['multidelete']); $i++) {
    $row_no = $_POST['multidelete'][$i];
    $delete = "DELETE FROM users WHERE id='$row_no'";
    $db->query($delete);
    header('location:index.php?status=success');
}
