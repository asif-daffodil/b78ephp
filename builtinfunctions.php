<?php  
    //string related functions

    $x = "Dhaka is a small city!";
    
    echo strlen($x)."<br>";
    echo str_word_count($x)."<br>";
    echo strrev($x)."<br>";
    echo str_replace("small", "big", $x )."<br>";
    echo str_shuffle($x)."<br>";
    echo substr($x, 0, 5)."<br>";
    echo substr($x, -5)."<br>";

    //math related functions
    echo min(0, 150, 30, 20, -8, -200)."<br>"; 
    echo max(0, 150, 30, 20, -8, -200)."<br>"; 
    echo abs(-6.7)."<br>";
    echo sqrt(81)."<br>";
    echo round(0.60)."<br>"; 
    echo round(0.49)."<br>";  
    echo ceil(2.01)."<br>";  
    echo floor(2.89)."<br>";  
    echo rand()."<br>";  
    echo rand(10, 20)."<br>";  

    //array realted functions
    $x = ["Kamal", "Jamal", "Tomal", "Akmal"]; 

    array_push($x, "Rakib", "Sakib");
    print_r($x);
    echo "<br>";
    array_pop($x);
    print_r($x);
    echo "<br>";
    array_shift($x);
    print_r($x);
    echo "<br>";
    array_unshift($x, "Kuddus");
    print_r($x);
    echo "<br>";
    echo array_search("Tomal", $x);
    echo "<br>";
    function arrFunc ($data) {
        echo $data." ";
    }
    array_map("arrFunc", $x);
?>