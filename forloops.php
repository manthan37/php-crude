<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <div class="container" style="width: 80%; margin: auto; background-color: grey; color: azure;">
        <h1>Hello</h1>
        <?php
        for ($i = 0; $i < 5; $i++) {
            for ($j = 0; $j <= $i; $j++) {
                echo "* ";
            }
            echo "<br>";
        }
        echo "<hr/>";
        for ($i = 0; $i < 5; $i++) {
            for ($k = 5; $k > $i; $k--) {
                echo "* ";
            }
            echo "<br>";
        }
        echo "<hr/>";

        for ($i = 0; $i < 5; $i++) {
            for ($k = 0; $k < $i; $k++) {
                echo "&nbsp";
            }
            for ($j = 5; $j > $i; $j--) {
                echo "* ";
            }
            echo "<br/>";
        }
        echo "<hr/>";

        for ($i = 0; $i < 5; $i++) {
            for ($j = 0; $j < $i; $j++) {
                echo "&nbsp";
            }
            for ($k = 5; $k > $i; $k--) {
                echo "* ";
            }
            echo "<br/>";
        }
        for ($i = 2; $i < 6; $i++) {
            for ($j = 5; $j > $i; $j--) {
                echo "&nbsp";
            }
            for ($k = 0; $k < $i; $k++) {
                echo "* ";
            }
            echo "<br/>";
        }
        echo "<hr/>";

        for ($i = 0; $i < 6; $i++) {
            for ($j = 5; $j > $i; $j--) {
                echo "&nbsp";
            }
            for ($k = 0; $k < $i; $k++) {
                echo "* ";
            }
            echo "<br/>";
        }

        for ($i = 0; $i < 5; $i++) {
            for ($j = 0; $j <= $i; $j++) {
                echo "&nbsp";
            }
            for ($k = 4; $k > $i; $k--) {

                echo "* ";
            }
            echo "<br/>";
        }


        ?>
    </div>
</body>

</html>