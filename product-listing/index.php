<?php

$db = new mysqli('localhost', 'root', '', 'products');
if (isset($_POST['submit'])) {
    $name = $_POST['product-name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $is_available = $_POST['is-available'];
    $material = $_POST['material'];
    $materialstr = implode(', ', $material);
    $color = $_POST['color'];

    $insert = "INSERT INTO `products`(`name`, `description`, `price`, `category`, `is_available`, `material`, `color`) VALUES ('$name','$description','$price','$category','$is_available','$materialstr','$color')";
    if ($db->query($insert)) {
        echo "Inserted Successful!";
    } else {
        echo "$db->$error";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listing</title>
    
</head>

<body>
    <div class="form">
        <form action="" method="post">
            <table>
                <tr>
                    <td>Product Name</td>
                    <td><input type="text" name="product-name" id="product-name" placeholder="Enter Product Name"></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name="description" id="description" cols="30" rows="10" placeholder="Description"></textarea></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type="number" name="price" id="price"></td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><input type="file" name="photo" id="photo"></td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>
                        <select name="category" id="category">
                            <option value="">Select Category</option>
                            <option value="saree">Saree</option>
                            <option value="jeans">Jeans</option>
                            <option value="pyjama">Pyjama</option>
                            <option value="suits">Suits</option>
                            <option value="dresses">Dresses</option>
                            <option value="other">Other</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Available or Not</td>
                    <td><input type="radio" name="is-available" id="yes" value="yes"><label for="yes">Yes</label>
                        <input type="radio" name="is-available" id="no" value="no"><label for="no">No</label></td>
                </tr>
                <tr>
                    <td>Material</td>
                    <td>
                        <input type="checkbox" name="material[]" id="silk" value="silk"><label for="silk">Silk</label>
                        <input type="checkbox" name="material[]" id="cotton" value="cotton"><label for="cotton">Cotton</label><br />
                        <input type="checkbox" name="material[]" id="polyster" value="polyster"><label for="polyster">Polyster</label>
                        <input type="checkbox" name="material[]" id="semi-polyster" value="semipolyster"><label for="semi-polyster">Semi-polyster</label>
                    </td>
                </tr>
                <tr>
                    <td>Color</td>
                    <td><input type="color" name="color" id="color"></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <input type="submit" value="submit" name="submit">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>


<!-- CREATE TABLE `products` (
    `id` INT(10) AUTO_INCREMENT PRIMARY KEY,
	`name` VARCHAR(40),
    `description` VARCHAR(200),
    `price`	INT(10),
    
    `category` ENUM('sarees','jeans','pyjama','suits','dresses','other'),
    `is_available` ENUM('yes','no'),
    `material` ENUM('silk','cotton','polyster','semipolyster'),
    `color` VARCHAR(20)
    
) -->