<?php
    $db = new mysqli('localhost','root','','products');
    $select = "SELECT * FROM `products1`";
    $result = $db->query($select);
    echo "<style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }</style>
    <table>
    <tr>
        <td>Name</td>
        <td>Description</td>
        <td>Price</td>
        <td>Category</td>
        <td>Is Available</td>
        <td>Material</td>
        <td>Color</td>
    </tr>
    ";
    
    if($result){
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["name"];
            $field2name = $row["description"];
            $field3name = $row["price"];
            $field4name = $row["category"];
            $field5name = $row["is_available"]; 
            $field6name = $row["material"]; 
            $field7name = $row["color"]; 
    
            echo '<tr> 
                      <td>'.$field1name.'</td> 
                      <td>'.$field2name.'</td> 
                      <td>'.$field3name.'</td> 
                      <td>'.$field4name.'</td> 
                      <td>'.$field5name.'</td> 
                      <td>'.$field6name.'</td> 
                      <td>'.$field7name.'</td> 
                  </tr>';
        
        }
        
        echo "</table>";

    }


?>
