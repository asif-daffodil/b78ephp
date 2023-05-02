<?php  
    include_once("./header.php");
    if(isset($_SESSION['userName'])){
        header("location: ./");
    }
?>
    <div class="container">
        <div class="row min-vh-100 d-flex">
        <?php  
                if(isset($_POST['login'])){
                    $uemail = $_POST['uemail'];
                    $upass = $_POST['upass'];
            
                    $check = $conn->query("SELECT * FROM `users` WHERE `email` = '$uemail' AND `pass` = '$upass'");
            
                    if($check->num_rows != 1){
                        echo "<script>toastr.warning('Something went wrong!')</script>";
                    }else{
                        $userData = $check->fetch_object();
                        $_SESSION['userName'] = $userData->name;
                        $_SESSION['userEmail'] = $userData->email;
                        echo "<script>toastr.success('login successfull!');setTimeout(()=>{location.href='./'},2000)</script>";
                    }
                }
            ?>
            <div class="col-md-6 m-auto">
                <h2 class="mb-3">Login Form</h2>
                <form action="" method="post">
                    <div class="mb-3">
                        <input type="email" class="form-control" name="uemail" placeholder="Your Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="upass" placeholder="Your Password" required>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary btn-sm" name="login">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php  
    include_once("./footer.php");
?>
    
    