<?php
$db = new mysqli('localhost', 'root', '', 'products');
if (isset($_POST['submit'])) {
    echo "hello";
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $is_available = $_POST['is_available'];
    $material = $_POST['material'];
    $materialstr = implode(',', $material);
    $color = $_POST['color'];

    $insert = "INSERT INTO `products1`(`name`,`description`,`price`,`category`,`is_available`,`material`,`color`) VALUES ('$name','$description','$price','$category','$is_available','$materialstr','$color') ";

    if ($db->query($insert)) {
        echo "Inserted Successfully!";
    } else {
        echo $db->error;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="form">
        <form action="" method="post">
            <table>
                <tr>
                    <td>Product Name</td>
                    <td>
                        <input type="text" name="name" id="name" placeholder="Enter Product name">
                    </td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>
                        <textarea name="description" cols="30" rows="10" placeholder="Description"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>
                <tr>
                <td>Image</td>
                <td>
                    <input type="file" name="image" id="">
                </td>
            </tr>
                <tr>
                    <td>Category</td>
                    <td>
                        <select name="category">
                            <option value="">Select Category</option>
                            <option value="sarees">Sarees</option>
                            <option value="jeans">Jeans</option>
                            <option value="pyjama">Pyjama</option>
                            <option value="suits">suits</option>
                            <option value="dresses">dresses</option>
                            <option value="other">other</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Available or Not</td>
                    <td>
                        <input type="radio" name="is_available" value="yes" id="yes">
                        <label for="yes">Yes</label>
                        <input type="radio" name="is_available" value="no" id="no">
                        <label for="no">No</label>

                    </td>
                </tr>
                <tr>
                    <td>Material</td>
                    <td>
                        <input type="checkbox" name="material[]" id="silk" value="silk">
                        <label for="silk">silk</label>
                        <input type="checkbox" name="material[]" id="cotton" value="cotton">
                        <label for="cotton">cotton</label><br/>
                        <input type="checkbox" name="material[]" id="polyster" value="polyster">
                        <label for="polyster">polyster</label>
                        <input type="checkbox" name="material[]" id="semi-polyster" value="semi-polyster">
                        <label for="semi-polyster">semi-polyster</label>
                    </td>
                </tr>
                <tr>
                    <td>Color</td>
                    <td>
                        <input type="color" name="color" id="">
                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="text-align: center ;">
                        <input type="submit" value="submit" name="submit">
                    </td>
                </tr>
            </table>
        </form>
        <form action="result1.php" style="margin-left: 140px;">

            <tr>
                <td >
                    <input type="submit" value="View Products">
                </td>
            </tr>
        </form>
    </div>
</body>

</html>

<!-- CREATE TABLE `products1` (
    `id` INT(5) PRIMARY KEY AUTO_INCREMENT,
	`name` VARCHAR(40),
    `description` VARCHAR(100),
    `price` INT(6),
    `category` ENUM('sarees','jeans','pyjama','suits','dresses','other'),
    `is_available` ENUM('yes','no'),
    `material` VARCHAR(100),
    `color` VARCHAR(20)
) -->