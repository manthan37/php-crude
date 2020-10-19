<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: lato;
        }
    </style>

</head>
<body>
    <?php
    date_default_timezone_set("Asia/Kolkata");
    echo "using d: ".date("d")."<br/>";
    echo "using D: ".date("D")."<br/>";
    echo "using j: ".date("j")."<br/>";
    echo "using l: ".date("l")."<br/>";
    echo "using N: ".date("N")."<br/>";
    echo "using jS: ".date("jS")."<br/>";
    echo "using z: ".date("z")."<br/>";
    echo "using F: ".date("F")."<br/>";
    echo "using m: ".date("m")."<br/>";
    echo "using M: ".date("M")."<br/>";
    echo "using t: ".date("t")."<br/>";
    echo "using o: ".date("o")."<br/>";
    echo "using y: ".date("y")."<br/>";
    echo "using Y: ".date("Y")."<br/>";
    echo "using a: ".date("a")."<br/>";
    echo "using A: ".date("A")."<br/>";
    echo "using g: ".date("g")."<br/>";
    echo "using G: ".date("G")."<br/>";
    echo "using h: ".date("h")."<br/>";
    echo "using H: ".date("H")."<br/>";
    echo "using i: ".date("i")."<br/>";
    echo "using e: ".date("e")."<br/>";
    echo "using s: ".date("s")."<br/>";
    echo "using c: ".date("c")."<br/>";
    echo "using r: ".date("r")."<br/>";
    echo "using U: ".date("U")."<br/>";
    

    print_r(localtime());





    ?>
</body>
</html>