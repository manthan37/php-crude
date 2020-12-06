<?php
include('config.php');
$db = new mysqli('localhost', 'root', '', 'Registrations');
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $hobbies = implode(", ", $_POST['hobby']);
    $password = $_POST['password'];

    if (isset($_FILES['user_image'])) {
        $filename = $_FILES['user_image']['name'];
        $tempname = $_FILES['user_image']['tmp_name'];
        $destination = get_path('assets/user_image/') . $tempname;
        move_uploaded_file($tempname, $destination);
    } else {
        $tempname = "";
    }

    $db->query("INSERT INTO `user` (`name`,`email`,`gender`,`hobby`,`password`,`image`) VALUES ( '$name','$email','$gender','$hobbies','$password','$tempname')");
    echo "INSERT INTO `user` (`name`,`email`,`gender`,`hobby`,`password`) VALUES ( '$name','$email','$gender','$hobbies','$password')";

    echo $db->error;
}
if (isset($_REQUEST['getall'])) {
    $result = $db->query("SELECT * FROM `user`");
    $users = [];
    $count = 0;
    while ($row = $result->fetch_object()) {

        $users[$count]['id'] = $row->id;
        $users[$count]['name'] = $row->name;
        $users[$count]['email'] = $row->email;
        $users[$count]['image'] = $row->image;
        $users[$count]['gender'] = $row->gender;
        $users[$count]['hobby'] = $row->hobby;
        $count++;
    }
    echo json_encode($users);
}
