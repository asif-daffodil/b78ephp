<?php  
    echo date("d-m-y h:m:s")."<br>";
    date_default_timezone_set("Asia/Dhaka");
    echo date("d-M-Y D H:m:s a")."<br>";
    echo date("d-F-Y h:m:s A l")."<br>";

    // mktime
    /* hour min sec month day year */

    $myDate = mktime(20, 55, 34, 9, 10, 2026);
    echo date("d-F-Y h:m:s A l", $myDate)."<br>";

    // strtotime
    $time1 = strtotime("next day");
    echo date("d-F-Y h:m:s A l", $time1)."<br>";

    $time2 = strtotime("+2 years +3 month +5 day");
    echo date("d-F-Y h:m:s A l", $time2)."<br>";

    $time3 = strtotime("next friday");
    echo date("d-F-Y h:m:s A l", $time3)."<br>";

    $startDate = strtotime("next friday");
    $endDate = strtotime("+6 weeks", $startDate);
    while ($startDate <= $endDate) {
       echo date("d-F-Y l", $startDate)."<br>";
       $startDate = strtotime("+1 week", $startDate);
    }
?>