<?php

$db = new mysqli("localhost", 'root', '', 'country');
$join = "SELECT countries.name,states.name as state_name, cities.name as city_name FROM countries JOIN states WHERE countries.id=states.country_id JOIN cities  WHERE states.id=cities.state_id";
$counter = 0;
$result = $db->query($join);
while ($row = $result->fetch_object) {
    echo $row->name;
    echo $row->state_name;
    echo $row->city_name;
}

echo $db->error;
