<?php

$email = $_GET['email'];
include('../connection.php');
$result = $db->query("SELECT * FROM users where `email`='$email'");

if ($result->num_rows == 0) {
    echo "0";
} else {
    echo "1";
}
