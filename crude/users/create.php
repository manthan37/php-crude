<?php

include('../connection.php');
$status = '';

if (isset($_POST['submit'])) {

    $tempname = $_FILES['user_image']['tmp_name'];
    $filename = $_FILES['user_image']['name'];
    $destination = '../assets/uploaded_files/' . $filename;
    move_uploaded_file($tempname, $destination);


    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $hobby = $_POST['hobby'];
    $hobbies = implode(', ', $hobby);
    $city = $_POST['city'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userimage = $filename;

    $insert = "INSERT INTO `users`(`name`, `gender`, `hobby`, `city`, `mobile`, `email`,`user_image`, `password`) VALUES ('$name','$gender','$hobbies','$city','$mobile','$email','$userimage','$password')";
    if ($db->query($insert)) {
        $status = "Registration Successful!";
        header('location:index.php');
    } else {
        if ($db->error == "Duplicate entry '$email' for key 'email'") {
            $status =  "<p>Already Registered! Email already exists.</p>";
        } else if ($db->error == "Duplicate entry '$mobile' for key 'mobile'") {
            $status = "<p>Already Registered! Mobile number already exists.<?p>";
        } else {
            $status =  "<p>Error: " . $insert . "<br>" . $db->error . "</p>";
        }
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
        var check = function() {
            if (document.getElementById('password').value != '' && document.getElementById('confirm_password').value != '') {
                if (document.getElementById('password').value ==
                    document.getElementById('confirm_password').value) {
                    document.getElementById('password').style.border = '1px solid green';
                    document.getElementById('confirm_password').style.border = '1px solid green';
                    document.getElementById('message').style.color = 'green';
                    document.getElementById('message').innerHTML = 'matching';
                    pass_return = true;

                } else {
                    document.getElementById('password').style.border = '1px solid red';
                    document.getElementById('confirm_password').style.border = '1px solid red';
                    document.getElementById('message').style.color = 'red';
                    document.getElementById('message').innerHTML = 'not matching';
                    pass_return = false;
                }
            }
        }
    </script>
    <link rel="stylesheet" href="style.css">
    <title>Create user</title>
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
                    <td><input type="text" name="name" placeholder="Enter your name"></td>
                </tr>

                <tr>
                    <td>Gender</td>
                    <td>
                        <input type="radio" name="gender" id="male" value="male">
                        <label for="male">Male</label><br />
                        <input type="radio" name="gender" id="female" value="female">
                        <label for="female">Female</label>
                        <input type="radio" name="gender" id="other" value="other">
                        <label for="other">Other</label>
                    </td>
                </tr>

                <tr>
                    <td>Hobby</td>
                    <td>
                        <input type="checkbox" name="hobby[]" id="eating" value="eating">
                        <label for="eating">I love eating!</label>
                        <input type="checkbox" name="hobby[]" id="dancing" value="dancing">
                        <label for="dancing">I love dancing!</label><br />
                        <input type="checkbox" name="hobby[]" id="traveling" value="traveling">
                        <label for="traveling">I love traveling!</label>
                        <input type="checkbox" name="hobby[]" id="coding" value="coding">
                        <label for="coding">I love coding!</label>
                    </td>
                </tr>

                <tr>
                    <td>City</td>
                    <td>
                        <select name="city">
                            <option value="">Select city</option>
                            <option value="surat">Surat</option>
                            <option value="ahmedabad">Ahmedabad</option>
                            <option value="rajkot">Rajkot</option>
                            <option value="gandhinagar">Gandhinagar</option>
                            <option value="navsari">Navsari</option>
                            <option value="other">Other</option>
                        </select>
                    </td>

                </tr>

                <tr>
                    <td>Mobile No.</td>
                    <td>

                        <input type="tel" name="mobile" placeholder="Enter mobile number">
                        <!--pattern="[0-9]{10}||[0-9]{11}"-->
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="email" onblur="checkEmail(this.value)" name="email" placeholder="example@gmail.com">
                    </td>
                </tr>
                <tr class="email-error"></tr>

                <tr>
                    <td>Profile Image</td>
                    <td><input type="file" id="user_image" name="user_image"></td>
                </tr>
                <tr>
                    <td><label>password :</label></td>
                    <td>
                        <input name="password" id="password" type="password" onkeyup='check();' />

                    </td>
                </tr>
                <tr>
                    <td>
                        <lable>Confirm Password</lable>
                    </td>
                    <td>
                        <input type="password" name="confirm_password" id="confirm_password" onkeyup='check();' />

                    </td>
                </tr>
                <tr>
                    <div id="message">
                        <pre><p> </p></pre>
                    </div>
                </tr>

                <tr>
                    <td colspan="2" style="text-align: center;  padding:0;<?php if ($status == 'Registration Successful!') {
                                                                                echo "color:green;";
                                                                            } else {
                                                                                echo "color:red;";
                                                                            } ?>">
                        <?php
                        echo $status;
                        ?></td>
                </tr>

                <tr>
                    <td colspan="2" style="text-align:center;"><br />
                        <input type="submit" name="submit" id="btn" value="Confirm">
                    </td>
                </tr>

            </table>
        </form>
    </div>
    <script src="../../jQuery-3.5.1.min.js"></script>
    <script>
        function checkEmail(email) {
            $.ajax({
                url: 'http://localhost:8000/laravel/crude/users/checkemail.php?email=' + email,
                method: 'GET',
                success: function(successData) {
                    if (successData == 0) {
                        $('.email-error').html(`<td>
                        <pre> </pre>
                    </td>
                    <td><span class="email-message"></span></td>`)
                        $('.email-message').text("All Okay!");
                    } else {
                        $('.email-error').html(`<td>
                        <pre> </pre>
                    </td>
                    <td><span class="email-message"></span></td>`)
                        $('.email-message').text("Went wrong!");
                    }
                },
                error: function() {

                }
            })
        }
    </script>
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