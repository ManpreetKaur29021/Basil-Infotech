<?php
session_start();
require("../../signup/server.php");
date_default_timezone_set("Asia/Kolkata");

$plid = "";
$status = "";
$cno = "";
$cemail = "";
$rid = "";
$bid = "";
$cust = "";
$id=$_SESSION['userid'];
$q = "select * from links where id='$id'";
if(isset($_POST['search']))
{
    if(!empty($_POST['status']) || !empty($_POST['plid']) || !empty($_POST['cno']) || !empty($_POST['cemail']) || !empty($_POST['rid']) || !empty($_POST['bid']))
    {
        $plid = $_POST['plid'];
        $status = $_POST['status'];
        $cno = $_POST['cno'];
        $cemail = $_POST['cemail'];
        $rid = $_POST['rid'];
        $bid = $_POST['bid'];
        $cust = $cno."(".$cemail.")";
        if($plid != "") 
        {
            $q .= " and plid='$plid'";
        }
        if($status != "")
        {
            $q .= " and status ='$status'";
        }
        if(($cno !="") && ($cemail != "")){
            $q .= " and cust='$cust'";
        }
        if($rid != "") 
        {
            $q .= " and rid='$rid'";
        }
    }
}
$res = mysqli_query($con,$q);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="navv.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
   
    <link
    href="https://fonts.googleapis.com/css2?family=DM+Sans&family=Montserrat:wght@100&family=Sunflower:wght@300&display=swap"
    rel="stylesheet">

    <link rel="stylesheet" href="Payment1.css">
    <title>Document</title>
</head>
<body>
    <div class="navo">

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
            <div class="first">
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
                </div>
            </div>
        </div>
    </div>
    <hr>

<div class="side">
    <nav class="sidebar">
    
         <div class="menu-bar">
             <div class="menu">
                 <ul class="menu-links">
                     <li class="nav-links">
                         <a href="../dashboard.php">
                            <i class="fa fa-home icon" aria-hidden="true"></i>
                            <span class="text nav-text text ">
                                Home
                            </span>
                         </a>
                     </li>
                     <li class="nav-links">
                         <a href="../transaction/transaction.php">
                            <i class="fa fa-reply-all icon" aria-hidden="true"></i>
                            <span class="text nav-text text ">
                            Transactions
                            </span>
                         </a>
                     </li>
                     <li class="nav-links">
                         <a href="../settlements/settlements.php">
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
                         <a href="./link.php">
                            <i class="fa fa-link icon" aria-hidden="true"></i>
                            <span class="text nav-text text ">
                                Payment Links
                            </span>
                         </a>
                     </li>
                     <li class="nav-links">
                         <a href="../payment_page/payment_page.html">
                            <i class="fa fa-envelope-open icon" aria-hidden="true"></i>
                            <span class="text nav-text text ">
                                Payment Pages
                            </span>
                         </a>
                     </li>
                     <li class="nav-links">
                         <a href="../payment_button/index.html">
                            <i class="fa fa-tasks icon" aria-hidden="true"></i>
                            <span class="text nav-text text ">
                                Payment Buttons
                            </span>
                         </a>
                     </li>
                     <li class="nav-links">
                         <a href="../route_pages/RoutePage.html">
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
             </div>
    </nav>
</div>

    <div class="container">
        <div class="btn">
            <div> Payment Links</div>
            <button>+ Create Payment Link</button>
        </div>
        <form action="link.php" method="POST">
            <div class="container1">
                <p>
                    <label for="t1">Payment Link Status </label>
                    <select name="status" id="t1" style="width:300px; padding: 2px 2px 2px 2px; border: none; font-size: 1.2rem;">
                        <option value="">All</option>
                        <option value="paid">Paid</option>
                        <option value="unpaid">Unpaid</option>
                        <option value="failed">Failed</option>
                    </select>
                </p>
                <p>
                    <label for="t2">Payment Id</label>
                    <input type="text" name="plid" id="t2">
                </p>
                <p>
                    <label for="t3">Customer Contact</label>
                    <input type="text" name="cno" id="t3">
                </p>
                <p>
                    <label for="t4">Customer Email </label>
                    <input type="text" name="cemail" id="t4">
                </p>
                <p>
                    <label for="t5">Reference Id</label>
                    <input type="text" name="rid" id="t5">
                </p>
                <p>
                    <label for="t6">Batch Id</label>
                    <input type="text" name="bid" id="t6">
                </p>
                <p class="btn">
                    <button type="submit" name="search" class="btn btn-warning" style="width:75px; font-size:1rem">Search</button>
                </p>
                
                <img src="payment.png" alt="Error Loading Image">
            </div>
        </form>
        <br><br>
        <div class="container2">
            <table id="nav">
                <thead>
                    <tr>
                        <th>Payment Link Id</th>
                        <th>Created Date</th>
                        <th>Amount</th>
                        <th>Reference Id</th>
                        <th>Customer</th>
                        <th>Link</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if(mysqli_num_rows($res)>0)
                {
                while($row = mysqli_fetch_array($res))
                {
                echo "<tr>";
                echo "<td>". $row['plid']."</td>";
                echo "<td>". $row['cat']."</td>";
                echo "<td>". $row['amt']."</td>";
                echo "<td>". $row['rid']."</td>";
                echo "<td>". $row['cust']."</td>";
                echo "<td>". $row['link']."</td>";
                echo "<td>". $row['status']."</td>";
                echo "</tr>";
                }
                }
                else { ?>
                    <tr>
                        <td>
                            <h4 style="padding:100px; text-align:center;">No Results Found!</h4>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
        <script>
        // const toggleButton = document.getElementsByClassName('toggle-button')[0]
        // const navbarLinks = document.getElementsByClassName('navbar-links')[0]

        // toggleButton.addEventListener('click', () => {
        //     navbarLinks.classList.toggle('active')
        // })

        $(".click").click(function(){
            $(".account").toggle();
        })
        $("body").click(function(){
            $(".account").addClass("invi");
        })
    </script>
</body>

</html>