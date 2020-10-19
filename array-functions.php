<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Functions</title>
</head>
<body>
    <?php

    //doubts - array reduce
    echo "<pre>";
    $team = array('csk'=>10,'mi'=>33,'rr'=>22);
    print_r($team);

    echo "<br><h3>Different array functions</h3>";

    //change case of key
    print_r(array_change_key_case($team,CASE_UPPER));

    //array chunk
    print_r(array_chunk($team,2));

    //returning single column in array
    $info = array(
        array(
          'id' => 0001,
          'first_name' => 'abc',
          'last_name' => 'def',
        ),
        array(
          'id' => 0002,
          'first_name' => 'ghi',
          'last_name' => 'jkl',
        ),
        array(
          'id' => 0003,
          'first_name' => 'mno',
          'last_name' => 'pqr',
        )
      );
      
      $last_names = array_column($info, 'last_name');
      print_r($last_names);


      //combine array i.e. key, value
      //array_combine($keys, $values);

      //fill array
      $a = array_fill(0,4,"hello");
      print_r($a);
      
      //intersect
      $b = array("hello","hii");
      print_r(array_intersect($a,$b));

      //array key exists
      echo array_key_exists("2",$a);

      //get array values
      print_r(array_keys($a,"hello"));

      //get array values
      print_r(array_values($a));

      //array_map function - sends each value of an array to a user-made function, and returns an array with new values
      function my_fun($v){
          return $v*$v;
      }
      $a = [1,2,3,4,5,6];
      print_r(array_map("my_fun",$a));

      //array_merge - merge arrays
      // array_merge_recursive - merge array with nested array if same key exists.

      //multisort
      $sorted = array_multisort($a,SORT_DESC);
      print_r($a);

      //add elements to array
      
      print_r(array_pad($a,10,00));

      //array pushing & poping
      $a = [];
      print_r($a);
      array_push($a,"1","2","3");
      print_r($a);
      array_pop($a);
      print_r($a);
      array_push($a,4,5,6,7,8,9);
      

      //get random array key
      echo $a[array_rand($a)]."<br/>";

      //array to string
      function artost($v1,$v2){
            return $v1 . " ".$v2;
      }
      $a=array("Dog","Cat","Horse");
      print_r(array_reduce($a,"artost"));

      //replace
      echo "<br/>";
      $b = array('hello','how','are');
      $c = array_replace($a,$b);
      print_r($c);
      

      //array_reverse($a);
      //array_search("value",$array);
       echo array_shift($b);
       echo "<br/>";
       print_r($b);

       //slice
       print_r(array_slice($a,0,1));
       print_r($a);

       //sum of the array
       $a = [1,2,3,4,5,6,7,8,9,10];
       echo array_sum($a);

       //asort() - ascending order
       //arsort() - descending order
       //krsort() - descending according to key
       //ksort() - ascending according to key


       















    ?>
</body>
</html>