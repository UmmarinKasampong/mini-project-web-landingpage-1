<?php
    session_start();
    require_once '../../DB/DB_connect.php';


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="signUP.css">
</head>
<body>
    <div class="signUp">
        <div class="signUp-warpper">
            <div class="signUP-container">
                <h3>สมัครสมาชิก</h3>
                
            
                <form action="../../DB/signUP_DB.php" method="post">
                        <?php if(isset($_SESSION['error'])){ ?>
                            <div class="alert-error">
                                <p>
                                    <?php 
                                    echo $_SESSION['error'];
                                    unset($_SESSION['error']);
                                    
                                    ?>
                                </p>
                            </div>
                        <?php } ?>


                        <div class="signup-form-item form-flex">
                            <input type="text" name="first-name" placeholder="first name*">
        
                            <input type="text" name="last-name" placeholder="last name*">
                        </div>
        
                        <div class="signup-form-item">
                            <input type="email" name="email" placeholder="email*">
                        </div>
                        
                        <div class="signup-form-item">
                            <input type="password" name="password" placeholder="password*">
                        </div>
        
                        <div class="signup-form-item">
                            <input type="password" name="c_password" placeholder="confirm password*">
                        </div>
        
        
                        <div class="submit-signUp">
                            <button name="create-btn">สมัครสมาชิก</button>    
                        </div>
        
        
                        <hr>
        
                        <div class="signUp-footer">
                            <p>คุณมีรหัสแล้วใช้ไหม <a href="../SignIn_PAGE/signIn.php">เข้าสู่ระบบ</a></p>
                        </div>
        
                </form>
            </div>
        </div>
        
       
            

       

    </div>
   
</body>
</html>