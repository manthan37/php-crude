<?php
include('../connection.php');
if (isset($_GET['status']) && $_GET['status'] == 'success') {
    echo "Record deleted successfully!";
}
$select = "SELECT * FROM `users`";
$result = $db->query($select);


// for($i=0;$i<count($_POST['multidelete']);$i++)
// {
//  $row_no=$_POST['multidelete'][$i];
//  if($db->query("delete from user_detail where id='$row_no'")){
//      echo "successfully deleted!!";
//  }
// }
// print_r($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>index</title>
</head>

<body>
    <div class="container1" style="display: inline-table;">
        <table border="2" style=" border-collapse: collapse ; margin: 20px;">
            <tr>
                <th>Select</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Hobby</th>
                <th>City</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>User Image</th>
                <th colspan="2">Action</th>

            </tr>
            <form action="multidelete.php" method="post">
                <?php

                while ($row = $result->fetch_object()) { ?>
                    <tr>
                        <td><input type="checkbox" name="multidelete[]" value="<?php echo $row->id; ?>" id="<?php echo $row->id; ?>"></td>
                        <td><?php echo $row->name; ?></td>
                        <td><?php echo $row->gender; ?></td>
                        <td><?php echo $row->hobby; ?></td>
                        <td><?php echo $row->city; ?></td>
                        <td><?php echo $row->mobile; ?></td>
                        <td><?php echo $row->email; ?></td>
                        <td><img src="../assets/uploaded_files/<?php echo $row->user_image; ?>" height="30px"></td>

                        <td>
                            <a href="show.php?id=<?php echo $row->id ?>">
                                show</a>
                        </td>
                        <td>
                            <a href="edit.php?id=<?php echo $row->id; ?>">Update</a>
                            <a href="delete.php?id=<?php echo $row->id; ?>" onclick="return confirm('Really want to delete?');">Delete</a>


                        </td>



                    </tr>
                <?php } ?>
                <a href="delete.php"><button onclick="return confirm('are you sure??')">Delete selected</button></a>
            </form>
            <td colspan="10" style="text-align: center;">
                <a href="create.php"><button id="btn">Create user</button></a>


            </td>


            </tr>
        </table>
    </div>
</body>

</html>