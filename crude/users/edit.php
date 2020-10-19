 <?php

    include('../connection.php');
    $id = $_REQUEST['id'];
    $record = $db->query("SELECT * FROM `users` WHERE id = $id");
    // print_r($record);
    $row = $record->fetch_object();
    $hobbies = explode(', ', $row->hobby);
    print_r($hobbies);


    if (isset($_REQUEST['submit'])) {
        $name = $_REQUEST['name'];
        $gender = $_REQUEST['gender'];
        $hobby = $_REQUEST['hobby'];
        $hobbies = implode(', ', $hobby);
        $city = $_REQUEST['city'];
        $mobile = $_REQUEST['mobile'];
        $email = $_REQUEST['email'];




        $update = "UPDATE `users` SET 
            `name` = '$name',
            `gender` = '$gender',
            `hobby` = '$hobbies',
            `city` = '$city',
            `mobile` = '$mobile',
            `email` = '$email' WHERE `id` = $id ";
        echo $update;
        if ($db->query($update)) {
            header('location:index.php');
        } else {
            echo "something went wrong";
            echo  "<p>Error: " . $update . "<br>" . $db->error . "</p>";
        }
    }

    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script type="text/javascript">
         var pass_return = '';

         function validate() {
             if (document.registration.name.value == '') {
                 alert('Please enter Your Name');
                 return false;
             } else if (document.registration.gender.value == '') {
                 alert('Please select Gender');
                 return false;
             } else if (document.getElementById('eating').checked == false &&
                 document.getElementById('dancing').checked == false &&
                 document.getElementById('traveling').checked == false &&
                 document.getElementById('coding').checked == false) {
                 alert('Check atleast one hobby');
                 return false;
             } else if (document.registration.city.value == '') {
                 alert('Please select your city');
                 return false;
             } else if (document.registration.mobile.value == '') {
                 alert('Please enter your contact number');
                 return false;
             } else if (document.registration.email.value == '') {
                 alert('Please enter your Email');
                 return false;
             } else if (document.getElementById('password').value == '' && document.getElementById('confirm_password').value == '') {
                 alert('Enter Password!');
                 return false;
             } else if (pass_return == false) {
                 return false;
             } else {
                 return true;
             }
         }
     </script>
     <link rel="stylesheet" href="style.css">
     <title>Update user</title>
 </head>

 <body>
     <div class="container1">
         <form action="" method="post" name="registration" enctype="multipart/form-data" onsubmit="return(validate());">
             <div class="header">
                 <h1>Registration Form</h1>
             </div>
             <table>
                 <tr>
                     <td>Name</td>
                     <td><input type="text" name="name" placeholder="Enter your name" value="<?php echo $row->name; ?>"></td>
                 </tr>

                 <tr>
                     <td>Gender</td>
                     <td>
                         <input type="radio" name="gender" id="male" value="male" <?php if ($row->gender == 'male') {
                                                                                        echo "checked";
                                                                                    }; ?>>
                         <label for="male">Male</label><br />
                         <input type="radio" name="gender" id="female" value="female" <?php if ($row->gender == 'female') {
                                                                                            echo "checked";
                                                                                        }; ?>>
                         <label for="female">Female</label>
                         <input type="radio" name="gender" id="other" value="other" <?php if ($row->gender == 'other') {
                                                                                        echo "checked";
                                                                                    }; ?>>
                         <label for="other">Other</label>
                     </td>
                 </tr>

                 <tr>
                     <td>Hobby</td>
                     <td>
                         <input type="checkbox" name="hobby[]" id="eating" value="eating" <?php
                                                                                            if (in_array('eating', $hobbies)) {
                                                                                                echo "checked";
                                                                                            }
                                                                                            ?>>
                         <label for="eating">I love eating!</label>
                         <input type="checkbox" name="hobby[]" id="dancing" value="dancing" <?php
                                                                                            if (in_array('dancing', $hobbies)) {
                                                                                                echo "checked";
                                                                                            }
                                                                                            ?>>
                         <label for="dancing">I love dancing!</label><br />
                         <input type="checkbox" name="hobby[]" id="traveling" value="traveling" <?php
                                                                                                if (in_array('traveling', $hobbies)) {
                                                                                                    echo "checked";
                                                                                                }
                                                                                                ?>>
                         <label for="traveling">I love traveling!</label>
                         <input type="checkbox" name="hobby[]" id="coding" value="coding" <?php
                                                                                            if (in_array('coding', $hobbies)) {
                                                                                                echo "checked";
                                                                                            }
                                                                                            ?>>
                         <label for="coding">I love coding!</label>
                     </td>
                 </tr>

                 <tr>
                     <td>City</td>
                     <td>
                         <select name="city">
                             <option value="">Select city</option>
                             <option value="surat" <?php if ($row->city == 'surat') {
                                                        echo "selected";
                                                    } ?>>Surat</option>
                             <option value="ahmedabad" <?php if ($row->city == 'ahmedabad') {
                                                            echo "selected";
                                                        } ?>>Ahmedabad</option>
                             <option value="rajkot" <?php if ($row->city == 'rajkot') {
                                                        echo "selected";
                                                    } ?>>Rajkot</option>
                             <option value="gandhinagar" <?php if ($row->city == 'gandhinagar') {
                                                                echo "selected";
                                                            } ?>>Gandhinagar</option>
                             <option value="navsari" <?php if ($row->city == 'navsari') {
                                                            echo "selected";
                                                        } ?>>Navsari</option>
                             <option value="other" <?php if ($row->city == 'other') {
                                                        echo "selected";
                                                    } ?>>Other</option>
                         </select>
                     </td>

                 </tr>

                 <tr>
                     <td>Mobile No.</td>
                     <td>

                         <input type="tel" name="mobile" placeholder="Enter mobile number" value="<?php echo $row->mobile; ?>">
                         <!--pattern=" [0-9]{10}||[0-9]{11}"-->
                     </td>
                 </tr>
                 <tr>
                     <td>Email</td>
                     <td>
                         <input type="email" name="email" placeholder="example@gmail.com" value="<?php echo $row->email; ?>">
                     </td>
                 </tr>
                 <tr>
                     <td>Profile Image</td>
                     <td><input type="file" id="user_image" name="user_image"></td>
                 </tr>





                 <tr>
                     <td colspan="2" style="text-align:center;"><br />
                         <input type="submit" name="submit" id="btn" value="Confirm">
                     </td>
                 </tr>

             </table>
         </form>
     </div>

 </body>

 </html>


 <!-- 
CREATE TABLE users1(
	`id` INT(6) AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(30),
    `gender` ENUM('male','female','other'),
    `hobby` VARCHAR(40),
    `city` VARCHAR(30),
    `mobile` VARCHAR(20) UNIQUE KEY,
    `email` VARCHAR(40) UNIQUE KEY,
    `password` VARCHAR(60) 
) -->