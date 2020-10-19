<div class="day" style="font-family: sans-serif; text-align: center; width: 100%; font-size: xx-large;">
    <?php
    date_default_timezone_set("Asia/Kolkata");
    $next = mktime(0, 0, 0, 2, 2, 2021);
    echo date("l", $next);
    $curr = time();
    $diff = ($next - $curr);
    $days = round($diff / (60 * 60 * 24));
    echo "<br/>Days remaining: " . $days;

    // alternative way
    // $bday = "2nd February 2021";
    // $remaining_days = round((strtotime($bday) - time()) / (60 * 60 * 24));
    // echo "<br/>Days remaining: " . $remaining_days;

    


    ?>
</div>
