<?php  
    // $GLOBALS

    $x = 100;
    function y () {
        // return $x;
        $z = 200;
        return $z;
    }
    y();
    // echo $z;

    $a = 123;
    function b() {
        return $GLOBALS["a"];
    }

    echo b()."<br>";

    // $_SERVER
    echo $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    echo "<pre>";
    print_r($_SERVER);
    echo "</pre>";
?>