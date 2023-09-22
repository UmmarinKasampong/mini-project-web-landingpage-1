<?php 
    session_start();
    require_once '../../DB/DB_connect.php';
    
    $sql = "SELECT * FROM stores";
    $sql_total_grid = "SELECT 
    (SELECT COUNT(item_type)  from stores WHERE item_type = 'Man & Woman Fashion') as total_fashion ,
    (SELECT COUNT(item_type)  from stores WHERE item_type = 'Electronic') as total_electronic ,
    (SELECT COUNT(item_type)  from stores WHERE item_type = 'Jewellery Accessories') as total_jewellery
    ";

    $getData = $conn->prepare($sql);
    $getOnlyOne = $conn->prepare($sql_total_grid);
    
    $getData->execute();
    $getOnlyOne->execute();

    $rowData = $getData->fetchAll();
    $signgleRow = $getOnlyOne->fetch();

    // echo "Nummmmmmmmmmmmm " .  $signgleRow['total_fashion'];

    $prev_id = 0;
    $round = 0;
    // echo $signgleRow['total_row'];
    // foreach($rowData[0] as $row){
    //     echo $row['total_row'];
    // }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="index.css">
    <title>Home</title>
</head>
<body>

  
    <div class="banner-bg">

        <div class="list-side-bar" id="list-side-bar">
                    <i class="fa fa-times" aria-hidden="true" onclick="sidebarClose()"></i>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="../Add_item_PAGE/add_item.php">Add Item</a></li>
                        <li><a href="#">Fashion</a></li>
                        <li><a href="#">Electronic</a></li>
                        <li><a href="#">Jewellery</a></li>
                    </ul>
        </div>


        <div class="header-container">
       

            <div class="list-sevices-top">
                <ul>
                    <li><a href="#">Best seller</a></li>
                    <li><a href="#">Gift Ideas</a></li>
                    <li><a href="#">New Releases</a></li>
                    <li><a href="#">Today's Deals</a></li>
                    <li><a href="#">Customer Service</a></li>
                </ul>
            </div>

            <div class="header-logo">
                <h1>Eflyer</h1>
            </div>

            <div class="navbar-container">
                <ul>
                    <li>
                        <a onclick="humbergerClick();"><i class="fa fa-bars" id='icon-bar' aria-hidden="true"></i>
                        </i></a>
                    </li>

                    <li>
                        <select class="dropdown1"">
                            <option value="action" selected>Action</option>
                            <option value="auther_action">Auther action</option>
                            <option value="something else here">Something else here</option>
                        
                        </select>
                    
                    </li>

                    <li>
                        <div class="search-bar">
                            <input type="search" placeholder="ค้นหาสินค้าอะไรดี ? " id="search">

                            <label for="search">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </label>
                           
                        </div>
                    </li>

                    <li>
                        <select class="dropdown2"">
                            <option value="english" selected>English</option>
                            <option value="french">French</option>
                        </select>
                        
                    </li>

                    <li class="cart">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <a href="#">Cart</a>
                    
                    </li>

                    <li class="log-out">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        <a href="../../DB/Logout.php">log out</a>
                        
                    </li>
                </ul>
            </div>

        </div>

       <div class="silde-header">
            <div class="silde-container">

                <div class="swiper swiper0">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide">
                            <div class="silde-show-item">
                                <h1>GET START YOUR FAVRIOT SHOPING1</h1>
                                <button>buy now</button>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="silde-show-item">
                                <h1>GET START YOUR FAVRIOT SHOPING2</h1>
                                <button>buy now</button>
                            </div>

                        </div>
                        <div class="swiper-slide">
                            
                            <div class="silde-show-item">
                                <h1>GET START YOUR FAVRIOT SHOPING3</h1>
                                <button>buy now</button>
                            </div> 
                            
                        </div>
                        ...
                    </div>

                     <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
          
                </div>

<!-- 
                <div class="change-silde-btn">
                    <div class="left-btn" onclick="">
                        <a ><</a>
                    </div>

                    <div class="right-btn" onclick="">
                        <a >></a>
                    </div>
                
                </div> -->

            </div>
           
       </div>
    </div>

    <div class="main-contents">
        <div class="main-container">
            <div class="fashion-products">
                <h1>Man & Woman Fashion</h1>
                
                <div class="swiper swiper1">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            
                        
                            <?php for($i = 0 ; $i < ceil($signgleRow['total_fashion'] / 3); $i++){?>
                                <div class="swiper-slide">
                                    <div class="fashion-grids">
                                
                                        <?php foreach($rowData as $row) { ?>
                                            <?php 

                                                if($row['item_type'] === 'Man & Woman Fashion'){
                                                            // $prev_id = $row['id'];
                                                    if(($round != 3)){
                                                        if($row['id'] >= $prev_id){
                                                        
                                                                echo "
                                                                
                                                                <div class='fashion-item'>
                                                                    <div class='fashion-name'>
                                                                        <h4>$row[item_name]</h4>
                                                                        <span>Price $ 30</span>
                                                                    </div>
                            
                                                                    <img src='../../DB/Image/Product_Img/$row[item_img]'>
                            
                                                                    <div class='fashion-footer'>
                                                                        <a>Buy Now</a>
                                                                        <a>See More</a>
                                                                    </div>
                                                                </div>
                                                            
                                                            " ;
                                                            $round++;
                                                        }
                                                        

                                                    }else {
                                                
                                                        $round = 0;
                                                        $prev_id = $row['id'];
                                                        // echo "บันทึก Id " . $prev_id;
                                                        break;
                                                    }

                                                }               
                                            
                                            ?>
                                    
                                                
                                        <?php }  ?>

                                    </div>
                                </div>
                            <?php } $round = 0; $prev_id = 0;?> 
                            ...
                        </div>
              
           
                </div>

                <div class="product-silde-btn">
                            <div class="prev-btn1 prev-btn-style" onclick="">
                                <a ><</a>
                            </div>

                            <div class="next-btn1 next-btn-style" onclick="">
                                <a >></a>
                            </div>
                        
                </div>
                   
                    
                    
            </div>
                    

            





            <div class="electonic-products">
                <h1>Electronic</h1>

                <div class="swiper swiper2">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            
                        
                            <?php for($i = 0 ; $i < ceil($signgleRow['total_fashion'] / 3); $i++){?>
                                <div class="swiper-slide">
                                    <div class="electonic-grids">
                                
                                        <?php foreach($rowData as $row) { ?>
                                            <?php 

                                                if($row['item_type'] === 'Electronic'){
                                                            // $prev_id = $row['id'];
                                                    if(($round != 3)){
                                                        if($row['id'] >= $prev_id){
                                                        
                                                                echo "
                                                                
                                                                <div class='electonic-item'>
                                                                    <div class='electonic-name'>
                                                                        <h4>$row[item_name]</h4>
                                                                        <span>Price $ 30</span>
                                                                    </div>
                            
                                                                    <img src='../../DB/Image/Product_Img/$row[item_img]'>
                            
                                                                    <div class='electonic-footer'>
                                                                        <a>Buy Now</a>
                                                                        <a>See More</a>
                                                                    </div>
                                                                </div>
                                                            
                                                            " ;
                                                            $round++;
                                                        }
                                                        

                                                    }else {
                                                
                                                        $round = 0;
                                                        $prev_id = $row['id'];
                                                        // echo "บันทึก Id " . $prev_id;
                                                        break;
                                                    }

                                                }               
                                            
                                            ?>
                                    
                                                
                                        <?php }  ?>

                                    </div>
                                </div>
                            <?php } $round = 0; $prev_id = 0;?> 
                            ...
                        </div>
              
           
                </div>
                

                <div class="product-silde-btn">
                    <div class="prev-btn2 prev-btn-style" onclick="">
                        <a ><</a>
                     </div>

                    <div class="next-btn2 next-btn-style" onclick="">
                        <a >></a>
                    </div>
                
                </div>


            </div>

            <div class="jewellery-products">
                <h1>Jewellery Accessories</h1>
                
                <div class="swiper swiper3">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            
                        
                            <?php for($i = 0 ; $i < ceil($signgleRow['total_fashion'] / 3); $i++){?>
                                <div class="swiper-slide">
                                    <div class="electonic-grids">
                                
                                        <?php foreach($rowData as $row) { ?>
                                            <?php 

                                                if($row['item_type'] === 'Jewellery Accessories'){
                                                            // $prev_id = $row['id'];
                                                    if(($round != 3)){
                                                        if($row['id'] >= $prev_id){
                                                        
                                                                echo "
                                                                
                                                                <div class='electonic-item'>
                                                                    <div class='electonic-name'>
                                                                        <h4>$row[item_name]</h4>
                                                                        <span>Price $ 30</span>
                                                                    </div>
                            
                                                                    <img src='../../DB/Image/Product_Img/$row[item_img]'>
                            
                                                                    <div class='electonic-footer'>
                                                                        <a>Buy Now</a>
                                                                        <a>See More</a>
                                                                    </div>
                                                                </div>
                                                            
                                                            " ;
                                                            $round++;
                                                        }
                                                        

                                                    }else {
                                                
                                                        $round = 0;
                                                        $prev_id = $row['id'];
                                                        // echo "บันทึก Id " . $prev_id;
                                                        break;
                                                    }

                                                }               
                                            
                                            ?>
                                    
                                                
                                        <?php }  ?>

                                    </div>
                                </div>
                            <?php } $round = 0; $prev_id = 0;?> 
                            ...
                        </div>
              
           
                </div>

                <div class="product-silde-btn">
                    <div class="prev-btn3 prev-btn-style" onclick="">
                        <a ><</a>
                     </div>

                    <div class="next-btn3 next-btn-style" onclick="">
                        <a >></a>
                    </div>
                
                
                </div>
               


            </div>


        

        </div>
    </div>


    <div class="footer-content">
        <div class="footer-container">
            
            <div class="footer-logo">
                <h1>Eflyer</h1>
            </div>


            <div class="subscript">
                <form >
                    <input type="email" placeholder="Your Email">
                    <label for="btn-send-sub">Subscript</label>
                    <input type="submit" id="btn-send-sub" style="display: none;" value="subscript">
                </form>
            
            </div>


            
            <div class="footer-menu">
                <ul>
                    <li><a href="#">Best seller</a></li>
                    <li><a href="#">Gift Ideas</a></li>
                    <li><a href="#">New Releases</a></li>
                    <li><a href="#">Today's Deals</a></li>
                    <li><a href="#">Customer Service</a></li>
                </ul>
            
            </div>


            <div class="footer-contact">
                <p>Help Line Number : +1 1800 1200 1200</p>
            </div>


            <div class="footer-end-credit">
                <p>© 2020 All Rights Reserved. Design by Free html Templates</p>
            </div>


        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <script>
        var humberger = false;
   
        
        var icon = document.getElementById('icon-bar');
        var sidebar = document.getElementById('list-side-bar');
    

        //  Product sildes

        const swiper = new Swiper('.swiper0', {
            
            autoplay: {
                delay : 3000 , 
                disableOnInteraction : false , 
            },

 
            loop: true,

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

         
        });

        
        const swiper1 = new Swiper('.swiper1', {

            autoplay: {
                delay : 3000 , 
                disableOnInteraction : false , 
            },

            loop: true,

            // // If we need pagination
            // pagination: {
            //     el: '.swiper-pagination',
            //     clickable : true , 
            // },

            // Navigation arrows
            navigation: {
                nextEl: '.next-btn1',
                prevEl: '.prev-btn1',
            },

        });


               
        const swiper2 = new Swiper('.swiper2', {

            autoplay: {
                delay : 3000 , 
                disableOnInteraction : false , 
            },

            loop: true,

            // // If we need pagination
            // pagination: {
            //     el: '.swiper-pagination',
            //     clickable : true , 
            // },

            // Navigation arrows
            navigation: {
                nextEl: '.next-btn2',
                prevEl: '.prev-btn2',
            },

        });

        const swiper3 = new Swiper('.swiper3', {

            autoplay: {
                delay : 3000 , 
                disableOnInteraction : false , 
            },

            loop: true,

            // // If we need pagination
            // pagination: {
            //     el: '.swiper-pagination',
            //     clickable : true , 
            // },

            // Navigation arrows
            navigation: {
                nextEl: '.next-btn3',
                prevEl: '.prev-btn3',
            },

        });
                    
        function sidebarClose(){
            sidebar.style.display ='none';
          
        }

     
        function humbergerClick(){
            sidebar.style.display ='inline-block';
        }

        
        function plusSlides(n) {
           showSlides(slideIndex += n);
        }


    </script>
</body>
</html>