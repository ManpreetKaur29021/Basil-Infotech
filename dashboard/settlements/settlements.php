<?php
  session_start();
  $id=$_SESSION['userid'];

  include("../../signup/function.php");
  include("../../signup/server.php");
  date_default_timezone_set("Asia/Kolkata");


  $count="0";
  $sid="";
  $sql = "SELECT * FROM settlements WHERE  id='$id'";
  if(isset($_POST['submit'])){
     $sid=get_safe_real($_POST['sid']);
    $count=get_safe_real($_POST['count']);
    if($sid !="") {
        $sql .= " AND sid='$sid'";
      }
    } 
    $result=mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="navv.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Document</title>
</head>
<body style="background-color: #e6e6e6;">
    <nav class="navbar">
        <div class="title"> B-PAY</div>
        

        <div class="navbar" style="background: #f8ba57;">
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
            <a href="../../logout.php" style=" text-decoration: none"><button class="button">Log Out</button></a>
           </div>
       </div>
    </div>
    <hr>
<div class="col col-sm-2">
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
                         <a href="./settlements.php">
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
                         <a href="../Payment_Link/Payment_Link-1.html">
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
</div>
    <div class="row justify-content-end" style="margin-left:-300px; margin-right:20px;">
        <div class="col col-sm-8">
            <div class="conainer" style="background-color: #b7b3b3; border-bottom:3px solid grey;margin-left: 0px;">
                    <div class="col col-sm-12">
                        <div class="col col-sm-3" style="margin-left: 0px;padding: 20px;">
                            <h5>Current Balance: Rs 0.00</h5>
                        </div>
                   </div>
            </div>
        </div>
</div>
<br>
<div class="row justify-content-end"style="margin-left:-300px; margin-right:20px;">
        <div class="col col-sm-8">
            <div class="conainer" style="background-color: #d3dbd5; border-bottom:3px solid grey">
                    
                        <div class="col col-sm-3" style="margin-left: 0px; background-color:#e6e6e6;padding-bottom: 2px;align-items: center;">
                            <h3>Settlements</h3>
                        </div>
                   
            </div>
        </div>
</div>
<div class="row justify-content-end" style="margin-left:-300px; margin-right:20px;">
    <div class=" col col-sm-8">
        <div class="cont2" style="background-color:#d3dbd5;padding-top: 30px;padding-bottom: 30px;">
            <form method= "POST" style="margin-left: 20px;">
                <div class="form-group row">
                    <label class="col-md-2" style="padding-right: 0px;"><b>Settlement Id</b></label>
                    <div class="col-8 col-md-2">
                     <input name="sid" class="form-control input-sm"  value="">
                    </div>
                    <label class="col-md-1"><b>Count</b></label>
                    <div class="col-2 col-md-1" style="padding-bottom: 5px;">
                        <input name="count" min="1" max="100" type="number" class="form-control input-sm" value="">   
                    </div>
                    <br>
                    <div class="col-md-1" style="padding-left: 50px;">
                        <button name = "submit" type="Submit" class="btn btn-warning" style="width:100px">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    <div class="row justify-content-end"  style="margin-left:-300px; margin-right:20px;">
        <div class="col col-sm-8">
        <div class="data-table ">
            <div class="table-responsive">


                <table class="table table-hover table-striped undefined">
                    <thead style="background-color: #b7b3b3;">
                        <tr>
                            <th>Settlement Id</th>
                            <th>Amount</th>
                            <th>Fees</th>
                            <th>Tax</th>
                            <th>Created At</th>
                            <th class="status-col">Status</th>
                            
                        </tr>
                    </thead>
                    <tbody  class="description empty-table-message" style="background-color: grey;background-color:#d3dbd5;">
      <?php if(mysqli_num_rows($result)>0){
                    //$i=1;
                        if(intval($count)!=0){
                            $num=$count;
                        while($row=mysqli_fetch_assoc($result) and $num>0){

                    ?>
                <tr>
                    <td><?php echo $row["sid"]?></td>
                    <td><?php echo $row["amt"]?></td>
                    <td><?php echo $row["fee"]?></td>
                    <td><?php echo $row["tax"]?></td>
                    <td><?php echo $row["createe"]?></td>
                    <td class="status-col"><?php echo $row["status"]?></td>  
                </tr>

            <?php $num--;}}else{
                while($row=mysqli_fetch_assoc($result)){?>
                <tr>
                    <td><?php echo $row["sid"]?></td>
                    <td><?php echo $row["amt"]?></td>
                    <td><?php echo $row["fee"]?></td>
                    <td><?php echo $row["tax"]?></td>
                    <td><?php echo $row["createe"]?></td>
                    <td class="status-col"><?php echo $row["status"]?></td>  
                </tr>
           <?php }} ?>
    <?php }
    else {?>            
                <tr>
                    <td>
                        <h4 class="empty-table-message" style="text-align: center;background-color:#d3dbd5;padding: 130px;">No Refunds Found!</h4>
                    </td>
                </tr>
    <?php }?>            
             </tbody>

            <!-- </div class="description">
            <h4 class="empty-table-message" style="text-align: center;background-color:#d3dbd5;padding: 50px;">No settlements found!</h4>
           </div> -->
            </div>
        </div>
        </div>
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