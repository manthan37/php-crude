<?php
$db = new mysqli('localhost', 'root', '', 'country');
$countryObj = $db->query("SELECT * FROM `countries`");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country</title>
    <link rel="stylesheet" href="../bootstrap.min.css">
</head>

<body>
    <div class="container mt-4 d-flex ">
        <div class="border align-self-center mr-3 p-1 rounded countrycode"></div>
        <select name="country" onchange="countrySelected(this.value)" class="col-2 custom-select" id="country">
            <option value="">Select Country</option>
            <?php while ($countries = $countryObj->fetch_object()) { ?>
                <option value="<?php echo $countries->id; ?>"><?php echo $countries->name; ?></option>
            <?php } ?>

        </select>
        <select name="state" onchange="stateSelected(this.value)" class="col-2 custom-select" id="stateList">

        </select>
        <select name="city" class="col-2 custom-select" id="cityList">

        </select>
    </div>
    <script src="../jquery-3.5.1.min.js"></script>
    <script>
        function countrySelected(x) {
            $('#cityList').html('')
            countryId = x
            $.ajax({
                url: 'http://localhost:8000/laravel/ajax-country/country-logic.php?country_id=' + countryId,
                method: 'GET',
                success: function(successData) {
                    console.log(successData)
                    $('#stateList').html(successData);
                },
                error: function(errorData) {}
            })

        }

        function stateSelected(y) {
            stateId = y
            $.ajax({
                url: 'http://localhost:8000/laravel/ajax-country/state-logic.php?state_id=' + stateId,
                method: 'GET',
                success: function(successData) {
                    $('#cityList').html(successData)
                },
                error: function(errorData) {

                }

            })
        }
    </script>
</body>

</html>