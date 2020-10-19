<?php
    include('../connection.php');
    $id = $_GET['id'];
    $delete = "DELETE FROM `users` WHERE id='$id'";
    if($db->query($delete)){
        
        header('location:index.php?status=success');
    }else{
        echo "something went wrong";
    }

?>