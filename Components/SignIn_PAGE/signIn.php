<?php
 session_start();
include_once '../../DB/DB_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign IN</title>
    <link rel="stylesheet" href="signIn.css">
</head>
<body>
    <div class="signIn">
        <div class="signIn-warpper">
            <div class="signIn-container">
                <h3>เข้าสู่ระบบ</h3>
                
            
                <form action="../../DB/signIN_DB.php" method="post">
                    <?php if(isset($_SESSION['error'])){ ?>
                            <div class="alert-errorr">
                                <p>
                                    <?php 
                                    echo $_SESSION['error'];
                                    unset($_SESSION['error']);
                                    
                                    ?>
                                </p>
                            </div>
                    <?php } ?>


                    <?php if(isset($_SESSION['success'])){?>
                        <div class="alert-success">
                                <p>
                                    <?php 
                                    echo $_SESSION['success'];
                                    unset($_SESSION['success']);
                                    
                                    ?>
                                </p>
                        </div>
                      
                    <?php } ?>
                        
                        <div class="signIn-form-item">
                            <input type="email" name="email" placeholder="email*">
                        </div>
                        
                        <div class="signIn-form-item">
                            <input type="password" name="password" placeholder="password*">
                        </div>
        
                     
        
                        <div class="submit-signIn">
                            <button name="login-btn">เข้าสู่ระบบ</button>    
                        </div>
        
        
                        <hr>
        
                        <div class="signUp-footer">
                            <p>คุณยังไม่มีบัญชีใช่ไหม <a href="../SignUp_PAGE/signUP.php">สมัครสมาชิก</a></p>
                        </div>
                
        
                </form>
            </div>
        </div>
        
       
            

       

    </div>
   
</body>
</html>