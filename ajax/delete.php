<?php
$db = new mysqli('localhost', 'root', '', 'Registrations');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $db->query("DELETE FROM `user`  WHERE id = $id");
    header('location:index.php');
}

if (isset($_POST['multi'])) {
    print_r($_POST);

    for ($i = 0; $i < count($_POST['multi_delete']); $i++) {
        $did = $_POST['multi_delete'][$i];
        $db->query("DELETE FROM `user` WHERE id = $did");
    }
    header('location:index.php');
}
