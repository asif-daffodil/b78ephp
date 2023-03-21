<?php  
    include_once("./header.php");
?>
    <div class="container">
        <div class="row">
        <?php  
        $x = 50;
        if($x < 10){
        ?>        
            <div class="col-md-12 text-center display-5 py-3 text-uppercase">ha ha ha</div>
        <?php    
            }else{
        ?>
            <div class="col-md-12 text-center display-5 py-3 text-uppercase">ho ho ho</div>
        <?php        
            }
        ?>
        </div>
    </div>
    <?php  
    include_once("./footer.php");
?>