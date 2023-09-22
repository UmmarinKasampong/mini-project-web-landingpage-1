<?php
    session_start();
    require_once 'DB_connect.php';
    // Insert User

    if(isset($_POST['create-btn'])){
        $firstname = $_POST['first-name'];
        $lastname = $_POST['last-name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        $urole = 'user';
        // header('Location: ../Components/SignUp_PAGE/signUP.php');

        // Validate
        if(empty($firstname)){
            $_SESSION['error'] = 'ชื่อต้องไม่ว่าง';
            header('Location: ../Components/SignUp_PAGE/signUP.php');
        }else if(empty($lastname)) {
            $_SESSION['error'] = 'ชื่อต้องไม่ว่าง';
            header('Location: ../Components/SignUp_PAGE/signUP.php');
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = 'เขียนอีเมลผิด';
            header('Location: ../Components/SignUp_PAGE/signUP.php');
        }else if(strlen($password) < 5) {
            $_SESSION['error'] = 'รหัสผ่านต้องมากกว่า 5 ตัวอักษร';
            header('Location: ../Components/SignUp_PAGE/signUP.php');
        }else if($password != $c_password) {
            $_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน';
            header('Location: ../Components/SignUp_PAGE/signUP.php');
        }else {
            echo "ทำงาน";
            try {
                $check_email = $conn->prepare("SELECT email FROM users WHERE email = :email");
                $check_email->bindParam(":email", $email);
                $check_email->execute();
                $row = $check_email->fetch(PDO::FETCH_ASSOC);

                if ($row['email'] == $email) {
                    $_SESSION['error'] = "มีอีเมลนี้อยู่ในระบบแล้ว";
                    header('Location: ../Components/SignUp_PAGE/signUP.php');
                } else {
                    
                    $sql = "INSERT into users(firstname, lastname, email, password, urole) 
                    VALUES(:firstname, :lastname, :email, :password, :urole)";
                    $password_hash = password_hash($password , PASSWORD_DEFAULT);
                    $Insert_user = $conn->prepare($sql);

                    $Insert_user->bindParam(":firstname" , $firstname);
                    
                    $Insert_user->bindParam(":lastname" , $lastname);
                    
                    $Insert_user->bindParam(":email" , $email);
                    
                    $Insert_user->bindParam(":password" , $password_hash);
                    
                    $Insert_user->bindParam(":urole" , $urole);


                    $Insert_user->execute();

                    $_SESSION['success'] = 'บัญชี้ถูกสร้างเรียบร้อย คุณสามารถเข้าสู่ระบบได้แล้วตอนนี้';
                    // header('Location: ../Components/SignUp_PAGE/signUP.php');
                    
                    header('Location: ../Components/SignIn_PAGE/signIn.php');

                }



            }catch(PDOException $e) {
                echo $e -> getMessage();
            }
        }
    }else {
        echo "ไม่มี Data";
    }



?>