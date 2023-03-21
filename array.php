<?php  
    //indexed array
    $personDetails = ["Kamal", 123, TRUE, NULL];
    echo "<pre>";
    var_dump($personDetails);
    print_r($personDetails);
    echo "</pre>";
    echo $personDetails[0]."<br>";
    $totalInfo = count($personDetails);

    for ($i=0; $i < $totalInfo; $i++) { 
        echo $personDetails[$i]."<br>";
    }

    foreach($personDetails as $pd){
        echo $pd."<br>";
    }

    //associative array
    $countryDetails = ["Name" => "Bangladesh", "Capital" => "Dhaka", "Currency" => "Taka", "Population" => 180000000];

    echo "<pre>";
    var_dump($countryDetails);
    print_r($countryDetails);
    echo "</pre>";

    echo $countryDetails["Capital"]."<br>";

    foreach($countryDetails as $in => $cd){
        echo "$in : $cd <br>";
    }

    //multidimontional array

    $students = [
        ["Kamal", "Dhaka", 85], 
        ["Jamal", "Khulna", 33],
        ["Tomal", "Bogura", 25],
        ["Akmal", "Jossore", 45],
    ];
    echo "<pre>";
    var_dump($students);
    print_r($students);
    echo "</pre>";
    echo $students[1][1]."<br>";

    $sentences = [" lives in ", " and his age is ", "."];

    foreach($students as $student){
        $i = 0;
        foreach($student as $st){
            echo "$st$sentences[$i]";
            ++$i;
        }
        echo "<br>";
    }

?>