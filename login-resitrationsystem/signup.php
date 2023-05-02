<?php  
    include_once("./header.php");
    if(isset($_SESSION['userName'])){
        header("location: ./");
    }
?>
    <div class="container">
        <div class="row min-vh-100 d-flex">
            <?php  
                if(isset($_POST['signup'])){
                    $uname = $_POST['uname'];
                    $uemail = $_POST['uemail'];
                    $upass = $_POST['upass'];
            
                    $insert = $conn->query("INSERT INTO `users` (`name`, `email`, `pass`) VALUES ('$uname', '$uemail', '$upass') ");
            
                    if(!$insert){
                        echo "<script>toastr.warning('Something went wrong!')</script>";
                    }else{
                        echo "<script>toastr.success('Rehistration successfull, please login now');setTimeout(()=>{location.href='./login.php'},2000)</script>";
                    }
                }
            ?>
            <div class="col-md-6 m-auto">
                <h2 class="mb-3">Sign up Form</h2>
                <form action="" method="post">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="uname" placeholder="Your Name" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" name="uemail" placeholder="Your Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="upass" placeholder="Your Password" required>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary btn-sm" name="signup">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php  
    include_once("./footer.php");
?>
    
    