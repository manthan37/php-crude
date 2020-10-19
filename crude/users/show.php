<?php
include('../connection.php');
$id = $_GET['id'];

$select = "SELECT * FROM `users` WHERE id=$id";
$result = $db->query($select);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Show</title>
</head>

<body>
    <div class="container1">
        <table border="2" style=" border-collapse: collapse; margin: 20px;">
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Hobby</th>
                <th>City</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
            <?php $row = $result->fetch_object() ?>
            <tr>
                <td><?php echo $row->name ?></td>
                <td><?php echo $row->gender ?></td>
                <td><?php echo $row->hobby ?></td>
                <td><?php echo $row->city ?></td>
                <td><?php echo $row->mobile ?></td>
                <td><?php echo $row->email ?></td>
                <td><?php echo $row->password ?></td>
            </tr>
            <tr>
                <td colspan="7" style="text-align: center;" ><a href="index.php"><button id="btn">Back</button></a></td>
            </tr>
            
        </table>
        
    </div>
</body>

</html>