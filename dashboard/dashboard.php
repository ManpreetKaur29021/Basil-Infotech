<?php
session_start();
 require("../signup/function.php");
// include("../signup/signin.php");

if(!isset($_SESSION["IS_LOGIN"])){
    redirect("../signup/signin.php");
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboardcss.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title>Document</title>
</head>

<body>
    <nav class="navbar">
        <div class="title"> B-PAY</div>
        

        <div class="navbar">
            <ul >
                <li>
                    <div class="click" style="background: #f8ba57;">
                     <a href="#">   
                         <i class="fa fa-user" aria-hidden="true"></i>
                       My Account 
                     </a>  
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    
    <div  class="account invi">
       <div class="first ">
           <div class="middle">
            <i class="fa fa-building" style="font-size: xxx-large;" aria-hidden="true"></i>
            <div class="merchant">
             <h2><?php echo $_SESSION['ADMIN_USER'] ?></h2>
             <h5><?php echo $_SESSION['userid'] ?></h5>
            </div>
           </div>
       </div>  
       <div>
           <div class="second">
            <h3>Loged In as</h3>
            <div class="email">
             <i class="fas fa-user-circle"></i>
             <h5 style="display: inline;"><?php echo  $_SESSION["email"]?></h5>
            </div>
         <a href="../logout.php" style=" text-decoration: none"><button class="button">Log Out</button></a>
         <!-- <button class="button">Log Out</button> -->
           </div>
       </div>
    </div>
    <hr>
    
    <span class="side">
        <nav class="sidebar">

            <div class="menu-bar">
                <div class="menu">
                    <ul class="menu-links">
                        <li class="nav-links">
                            <a href="./dashboard.php">
                                <i class="fa fa-home icon" aria-hidden="true"></i>
                                <span class="text nav-text text ">
                                    Home
                                </span>
                            </a>
                        </li>
                        <li class="nav-links">
                            <a href="./transaction/transaction.php">
                                <i class="fa fa-reply-all icon" aria-hidden="true"></i>
                                <span class="text nav-text text ">
                                    Transactions
                                </span>
                            </a>
                        </li>
                        <li class="nav-links">
                            <a href="./settlements/settlements.php">
                                <i class="fa fa-bars icon" aria-hidden="true"></i>
                                <span class="text nav-text text ">
                                    Settlements
                                </span>
                            </a>
                        </li>
                        <li class="nav-links">
                            <a href="#">
                                <i class="fa fa-window-restore icon" aria-hidden="true"></i>
                                <span class="text nav-text text ">
                                    Invoices
                                </span>
                            </a>
                        </li>
                        <li class="nav-links">
                            <a href="./Payment_Link/Payment_Link-1.html">
                                <i class="fa fa-link icon" aria-hidden="true"></i>
                                <span class="text nav-text text ">
                                    Payment Links
                                </span>
                            </a>
                        </li>
                        <li class="nav-links">
                            <a href="./payment_page/payment_page.html">
                                <i class="fa fa-envelope-open icon" aria-hidden="true"></i>
                                <span class="text nav-text text ">
                                    Payment Pages
                                </span>
                            </a>
                        </li>
                        <li class="nav-links">
                            <a href="./payment_button/index.html">
                                <i class="fa fa-tasks icon" aria-hidden="true"></i>
                                <span class="text nav-text text ">
                                    Payment Buttons
                                </span>
                            </a>
                        </li>
                        <li class="nav-links">
                            <a href="./route_pages/RoutePage.html">
                                <i class="fa fa-map-marker icon" aria-hidden="true"></i>
                                <span class="text nav-text text ">
                                    Route
                                </span>
                            </a>
                        </li>
                        <li class="nav-links">
                            <a href="#"><i class="fa fa-bell icon" aria-hidden="true"></i>
                                <span class="text nav-text text ">
                                    Subscriptions
                                </span>
                            </a>
                        </li>
                        <li class="nav-links">
                            <a href="#">
                                <i class="fa fa-qrcode icon" aria-hidden="true"></i>
                                <span class="text nav-text text ">
                                    QR Codes
                                </span>
                            </a>
                        </li>
                        <li class="nav-links">
                            <a href="#">
                                <i class="fa fa-upload icon" aria-hidden="true"></i>
                                <span class="text nav-text text ">
                                    Smart Collect
                                </span>
                            </a>
                        </li>
                        <li class="nav-links">
                            <a href="#">
                                <i class="fa fa-users icon" aria-hidden="true"></i>
                                <span class="text nav-text text ">
                                    Customers
                                </span>
                            </a>
                        </li>
                        <li class="nav-links">
                            <a href="#">
                                <i class="fa fa-shopping-bag icon" aria-hidden="true"></i>
                                <span class="text nav-text text ">
                                    Offers
                                </span>
                            </a>
                        </li>
                        <li class="nav-links">
                            <a href="#">
                                <i class="fa fa-shopping-cart icon" aria-hidden="true"></i>
                                <span class="text nav-text text ">
                                    Checkout Rewards
                                </span>
                            </a>
                        </li>
                        <li class="nav-links">
                            <a href="#">
                                <i class="fa fa-sticky-note icon" aria-hidden="true"></i>
                                <span class="text nav-text text ">
                                    Reports
                                </span>
                            </a>
                        </li>
                        <li class="nav-links">
                            <a href="#">
                                <i class="fa fa-home icon" aria-hidden="true"></i>
                                <span class="text nav-text text ">
                                    My Account
                                </span>
                            </a>
                        </li>
                        <li class="nav-links">
                            <a href="#">
                                <i class="fa fa-cogs icon" aria-hidden="true"></i>
                                <span class="text nav-text text ">
                                    Settings
                                </span>
                            </a>
                        </li>
                        <li class="nav-links">
                            <a href="#">
                                <i class="fa fa-download icon" aria-hidden="true"></i>
                                <span class="text nav-text text ">
                                    App Store
                                </span>
                            </a>
                        </li>
                    </ul>
                </span>
        </nav>
        
        <span class="dash">

            <h1 class="display">Hey! <?php echo $_SESSION['ADMIN_USER'] ?>, explore more and scale your buisness</h1>

            <div class="parent">
                <div class="div1"> 
                    <a href="./Payment_Link/Payment_Link-1.html" style= "text-decoration:none " ><button>
                        <img src="link.png" />
                        <div>
                            <h3>Payment Links</h3>
                            <p> Start sharing payment links <br> and speed up your payments</p>
                        </div>
                        <div>
                            <img src="arrow.png" />
                    </button></a>
                </div>

                <div class="div2">
                   <a href="./payment_page/payment_page.html" style= "text-decoration:none " ><button>
                        <img src="connection.png" />
                        <div>
                            <h3>Payment Pages</h3>
                            <p>Create online pages to accept <br> payments with in seconds</p>
                        </div>
                        <div>
                            <img src="arrow.png" />
                    </button></a> 
                </div>

                <div class="div3">
                    <button>
                        <img src="www.png" />
                        <div>
                            <h3>Payment Gateway</h3>
                            <p>Accept payments through <br> your apps or websites</p>
                        </div>
                        <div>
                            <img src="arrow.png" />
                    </button>
                </div>

                <div class="div4">
                    <img src="bpay.png" height="300px">
                </div>

                <div class="div5">
                    <button type="button" class="button5">
                        <h2 id="btn">Submit KYC</h2>
                    </button>
                </div>

            </div>
        </span>
        <script>
            $(".click").click(function(){
        $(".account").toggle();
    })
    $("body").click(function(){
        $(".account").addClass("invi");
    })
        </script>
          

   

    
</body>

</html>