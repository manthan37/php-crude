<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            width: 50%;
            margin: auto;
            font-family: lato;
            text-align: center;
            text-transform: uppercase;
            border-collapse: collapse;
            border: 2px solid gray;
            font-size: larger;
        }

        td,
        th {
            padding: 3px 0px 3px 0px;
        }

        tr:nth-child(even) {
            background-color: grey;
            color: white;
        }

        tr:nth-child(odd) {
            background-color: whitesmoke;
        }

        th {
            background-color: black;
            color: white;
        }

        tr:nth-child(even):hover {
            background-color: white;
            color: black;

        }

        tr:nth-child(odd):hover {
            background-color: grey;
            color: white;

        }
    </style>
</head>

<body>
    <?php
    echo "<pre>";
    $team = ['csk' => 11, 'mi' => 15, 'rr' => 29, 'rcb' => 11, 'kkr' => 24, 'srh' => 29, 'kixp' => 30, 'dc' => 23, 'ind' => 30, 'pk' => 28];
    // print_r($team);
    // echo array_sum($team);
    array_multisort($team, SORT_DESC);
    // // print_r($team);
    // $index = array_keys($team);
    // print_r($index);
    // $values = array_values($team);
    // print_r($values);
    ?>


    <table border="1">

        <tr>
            <th>Rank</th>
            <th>Team</th>
            <th>Score</th>
        </tr>
        <?php
        $count = 1;
        foreach ($team as $x => $values) {
            if ($count == 4) {
                break;
            }

            echo "<tr><td>" . $count . "</td><td>" . $x . "</td><td>" . sprintf("%.2f", $values) . "</td></tr>";
            $count += 1;
        }
        ?>


    </table>
</body>

</html>