<?php
include('config.php');
$db = new mysqli('localhost', 'root', '', 'Registrations');
$fetched = $db->query("SELECT * FROM `user`");

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $hobbies = implode(", ", $_POST['hobby']);
    $password = $_POST['password'];


    $filename = $_FILES['user_image']['name'];
    $tempname = $_FILES['user_image']['tmp_name'];
    $destination = "assets/user_image/" . $filename;

    //print_r($_FILES['user_image']);

    move_uploaded_file($tempname, $destination);


    $db->query("INSERT INTO `user` (`name`,`email`,`gender`,`hobby`,`password`,`image`) VALUES ( '$name','$email','$gender','$hobbies','$password','$filename')");
    header('location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajax-crude</title>
    <link rel="stylesheet" href="<?php get_path('assets/css/bootstrap.min.css'); ?>">
</head>

<body>
    <div class="container mt-5">
        <form action="" id="user-form" method="post" enctype="multipart/form-data">
            <div class="row d-flex justify-content-center">

                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>

                    <label for="male" class="mt-2">Male</label>
                    <input type="radio" name="gender" id="male" value="male" class="mr-4">

                    <label for="female">Female</label>
                    <input type="radio" name="gender" id="female" value="female" required>
                    <br />
                    <input type="checkbox" name="hobby[]" id="dance" value="dance">
                    <label for="dance">Dance</label>
                    <input type="checkbox" name="hobby[]" id="music" value="music">
                    <label for="music">Music</label>
                    <br>
                    <label for="image"></label>
                    <input type="file" class="form-control-file" name="user_image" id="image">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                    <input type="hidden" name="add" value="add">
                    <input type="submit" value="submit" class="btn btn-primary mt-2">
                </div>



            </div>

        </form>

    </div>

    <div class="container">
        <div class="row">
            <table class="displaytable table table-striped">

            </table>

        </div>
    </div>
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script>
        function loadall() {
            $.ajax({
                url: 'http://localhost:8000/laravel/ajax/ajax.php?getall=all',
                method: 'GET',
                dataType: 'JSON',
                success: function(successData) {
                    records = `<tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Gender</th>
                    <th>Hobby</th>
                    <th>Action</th>
                    <th>Multi-delete</th>
                </tr>`;

                    for (i = 0; i < successData.length; i++) {
                        records += `
                        <tr>
                            <td>${successData[i].name}</td>
                            <td>${successData[i].email}</td>
                            <td><img src="assets/user_image/${successData[i].image}" alt=" " height="50"></td>
                            <td>${successData[i].gender}</td>
                            <td>${successData[i].hobby}</td>
                            <td><a href="delete.php?id=${successData[i].id}" class=" alert-link">
                                    Delete
                                </a></td>
                            <td></td>
                        </tr>`

                    }
                    $('.displaytable').html(records);
                },
                error: function(errorData) {

                }
            })
        }

        $(document).ready(function() {
            loadall();
            $('#user-form').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    url: 'http://localhost:8000/laravel/ajax/ajax.php',
                    method: 'POST',
                    data: $('#user-form').serialize(),
                    success: function(successData) {
                        console.log(successData)
                        $('#user-form')[0].reset();
                        loadall();
                    },
                    error: function(errorData) {

                    }
                });


            });

            function singledelete(e) {
                $()
            }
        });
    </script>
</body>

</html>