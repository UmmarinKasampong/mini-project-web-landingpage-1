<?php
    
    session_start();
    require_once 'DB_connect.php';

    $filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
    $extension  = pathinfo( $_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION ); // jpg

    $basename   = $filename . "." . $extension; // 5dab1961e93a7_1571494241.jpg
    $target_dir = "Image/Product_Img/";

    $target_file = $target_dir . $basename;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


  
  



    
    // Check if image file is a actual image or fake image
    // if(isset($_POST["submit"])) {
    //   if($_FILES["fileToUpload"]["name"]){
    //       $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    //       if($check !== false) {
    //         echo "File is an image - " . $check["mime"] . ".";
    //         $uploadOk = 1;
    //       } else {
    //         echo "File is not an image.";
    //         $uploadOk = 0;
    //       }

    //   }else {
    //     $_SESSION['error'] = 'กรุณาใส่รูปสินค้า';
    //     header("Location: ../Components/Add_item_PAGE/add_item.php");
    //   }
    
    // }
    
    // // Check if file already exists
    // if (file_exists($target_file)) {
    //   echo "Sorry, file already exists.";
    //   $uploadOk = 0;
    // }
    
    // // Check file size
    // if ($_FILES["fileToUpload"]["size"] > 500000) {
    //   echo "Sorry, your file is too large.";
    //   $uploadOk = 0;
    // }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        header("Location: ../Components/Add_item_PAGE/add_item.php");
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }



    // ---------------------END Uploade File -----------------------------------

    if(isset($_POST['submit'])){
      $product_name = $_POST['item-name'];
      $product_type = $_POST['type_item'];
      $product_des = $_POST['item-des'];
      $product_owner = $_SESSION['user_login'];

      
      if(empty($product_name)) {
          $_SESSION['error'] = 'กรุณาใส่ชื่อสินค้า';
          header("Location: ../Components/Add_item_PAGE/add_item.php");
      }else if(empty($product_des)) {
          $_SESSION['error'] = 'กรุณากรอกรายละเอียดสินค้า';
          header("Location: ../Components/Add_item_PAGE/add_item.php");
      }else {
        echo "ทำงานนนนนนนนนนนนนนนนนนนน";
        try {
          $sql = "INSERT into stores(item_name, item_description, item_type, item_img, create_by) 
          VALUES(:item_name, :item_description, :item_type, :item_img, :create_by)";
      
          $Insert_item = $conn->prepare($sql);
          
          $Insert_item->bindParam(":item_name" , $product_name);
          
          $Insert_item->bindParam(":item_description" , $product_des);
          
          $Insert_item->bindParam(":item_type" , $product_type);
          
          $Insert_item->bindParam(":item_img" , $basename);
          
          $Insert_item->bindParam(":create_by" , $product_owner);


          $Insert_item->execute();

          $_SESSION['success'] = 'สินค้าใหม่ของคุณถูกสร้างเรียบร้อยแล้ว';

          header("Location: ../Components/Add_item_PAGE/add_item.php");                       


        }catch(PDOException $e){
          echo $e -> getMessage();
        }
      }


    }else {
      $_SESSION['error'] = 'ไม่มีข้อมูลส่งมา';
      header("Location: ../Components/Add_item_PAGE/add_item.php");      
    }




?>