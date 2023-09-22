<?php
    session_start();
    require_once 'DB_connect.php';
    // Insert User

    if(isset($_POST['login-btn'])){
       
        $email = $_POST['email'];
        $password = $_POST['password'];
     
        // header('Location: ../Components/SignUp_PAGE/signIn.php');

        if(empty($email)) {
            $_SESSION['error'] = 'กรุณากรอกอีเมล';
            header('Location: ../Components/SignIn_PAGE/signIn.php');
        }else if(empty($password)) {
            $_SESSION['error'] = 'กรุณากรอก Password';
            header('Location: ../Components/SignIn_PAGE/signIn.php');
        }else {
            echo "ทำงาน";
            try {
                $check_data = $conn->prepare("SELECT * FROM users WHERE email = :email");
                $check_data->bindParam(":email", $email);
                $check_data->execute();
                $row = $check_data->fetch(PDO::FETCH_ASSOC);

                if ($check_data->rowCount() > 0) {
                    
                    if(password_verify($password , $row['password'])){
                     
                        $_SESSION['user_login'] = $row['id'];
                        header('Location: ../Components/Main_PAGE/index.php');
                    }else {
                        $_SESSION['error'] = "รหัสผ่านผืด";
                        header('Location: ../Components/SignIn_PAGE/signIn.php');
                    }
                    
                   
                } else {
                    
                    

                    $_SESSION['error'] = 'ไม่มีบัญชี นี้อยู่ใน ฐานข้อมูล';
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