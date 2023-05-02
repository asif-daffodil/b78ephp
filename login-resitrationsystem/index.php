<?php  
    include_once("./header.php");
    if(!isset($_SESSION['userName'])){
        header("location: ./login.php");
    }
?>
    <div class="container">
        <div class="row min-vh-100 d-flex">
            <div class="col-md-6 m-auto alert alert-primary text-center">
                Welccome
            </div>
        </div>
    </div>
<?php  
    include_once("./footer.php");
?>
    
    