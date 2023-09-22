<?php
    session_start();





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add_item.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Add Item</title>
</head>
<body>
    <div class="additem-page">
        <div class="additem-container">
            <div class="additem-navbar">
                <ul>
                    <li><a href="../Main_PAGE/index.php">Home</a></li>
                    <li><a href="../../DB/Logout.php">Log out</a></li>
                </ul>
            </div>

            <div class="additem-main">
                <h1>เพิ่มสินค้า</h1>
                <form action="../../DB/Add_item.php" method="post" enctype="multipart/form-data">
                    <div class="allmenu-container">
                        <div class="additem-menu preview-img">
                            <img src="https://images.unsplash.com/photo-1682685796852-aa311b46f50d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="" id="preview-img">
                        </div>


                        <?php if(isset($_SESSION['error'])){ ?>
                            <div class="additem-menu alert-error">
                                <p>
                                    <?php 
                                    echo $_SESSION['error'];
                                    unset($_SESSION['error']);
                                    
                                    ?>
                                </p>
                            </div>
                        <?php } ?>

                        <?php if(isset($_SESSION['success'])){?>
                            <div class="additem-menu alert-success">
                                    <p>
                                        <?php 
                                        echo $_SESSION['success'];
                                        unset($_SESSION['success']);
                                        
                                        ?>
                                    </p>
                            </div>
                      
                        <?php } ?>
                        


                        <div class="additem-menu add-img-name">
                        
                            <label for="fileToUpload">
                                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                            </label>
                            <input type="file" id="fileToUpload" name="fileToUpload" onchange="showPreviewImg()" style="display: none;">

                            <input type="text" class="item-name" name="item-name" placeholder="กรุณาใส่ชื่อสินค้า">

                        </div>

                        <div class="additem-menu additem-tag">

                            <label for="type">Choose a product type:</label>

                            <select name="type_item" id="type">
                                <option value="Man & Woman Fashion">Man & Woman Fashion</option>
                                <option value="Electronic">Electronic</option>
                                <option value="Jewellery Accessories">Jewellery Accessories</option>
                    
                            </select>

                        </div>

                        <div class="additem-menu item-des">
                            <textarea name="item-des" id="item-des" placeholder="กรุณาใส่ ข้อมูลสินค้า" ></textarea>
                        </div>
                        

                        <div class="additem-menu btn-save">
                            <input type="submit" value="Upload Image" name="submit">
                        </div>
        


                    </div>

               
                </form>

            </div>
        </div>
        
    </div>

    <script>

        const showPreviewImg = () => {
            if(event.target.files.length > 0){
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("preview-img");
            preview.src = src;
            // preview.style.display = "block";
        }
        }
    </script>
</body>
</html>