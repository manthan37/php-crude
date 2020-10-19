<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
  <?php  
  //single line comment
  /*multiline 
  comment*/
  for ($i = 5; $i >= 1; $i--) {
    for ($j = 5; $j >= $i; $j--) {
        echo "&nbsp";
    }
    for ($k = 1; $k <= $i; $k++) {
        echo "*";
    }
    echo "<br>";
    }
    for ($p = 2; $p <= 5; $p++) {
        for ($q = 5; $q >= $p; $q--) {
            echo "&nbsp";
        }
        for ($st = 1; $st <= $p; $st++) {
            echo "*";
        }
        echo "<br/>";
}
echo "<hr/>";
$var1 = "hello";
echo var_dump($var1);
?>
    </div>
</body>
</html>