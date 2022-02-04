<?php

    session_start();
    include("../../signup/function.php");
    require("../../signup/server.php");
    date_default_timezone_set("Asia/Kolkata");

    // $id=$_SESSION['userid'];
    $id=149;
    $payment_count="0";
    $transfer_count="0";
    $reversal_count="0";
    $account_count="0";
    $batch_count="0";
    
    $sql = "SELECT * FROM route_payments WHERE id='$id'";
    if(isset($_POST['payment_filter'])){
        $payment_id = $_POST['payment_id'];
        $email = $_POST['email'];
        $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
        $duration = $_POST['duration'];
        $notes = $_POST['notes'];
        $payment_count = $_POST['payment_count'];
        if($payment_id!=""){
            $sql .= " AND payment_id = '$payment_id'";
        }
        if($email!=""){
            $sql .= " AND email = '$email'";
        }
        if($status!="All"){
            $sql .= " AND status = '$status'";
        }
        if($duration!=""){
            $sql .= " AND createdAt < '$duration'";
        }
    }
    $payment = mysqli_query($con,$sql);

    $sql = "SELECT * FROM route_transfers WHERE id='$id'";
    if(isset($_POST['transfer_filter'])){
        $transfer_id=$_POST['transfer_id'];
        $transfer_status=filter_input(INPUT_POST,'transfer_status',FILTER_SANITIZE_STRING);
        $settlement_status=filter_input(INPUT_POST,'settlement_status',FILTER_SANITIZE_STRING);
        $recepient_id=$_POST['recepient_id'];
        $transfer_count = $_POST['transfer_count'];
        if($transfer_id!=""){
            $sql .= " AND transfer_id='$transfer_id'";
        }
        if($transfer_status!="All"){
            $sql .= " AND transfer_id='$transfer_status'";
        }
        if($settlement_status!="All"){
            $sql .= " AND transfer_id='$settlement_status'";
        }   
    }
    $transfer = mysqli_query($con,$sql);

    $sql = "SELECT * FROM route_reversals WHERE id='$id'";
    if(isset($_POST['reversal_filter'])){
        $reversal_id = $_POST['reversal_id'];
        $reversal_count = $_POST['reversal_count'];
        if($reversal_id=""){
            $sql .= " AND reversal_id='$reversal_id'";
        }
    }
    $reversal = mysqli_query($con,$sql);

    $sql = "SELECT * FROM route_accounts WHERE id='$id'";
    if(isset($_POST['account_filter'])){
        $account_id = $_POST['account_id'];
        $account_email = $_POST['account_email'];
        $account_count = $_POST['account_count'];
        if($account_id!=""){
            $sql .= " AND account_id = '$account_id'";
        }
        if($account_email!=""){
            $sql .= " AND email='$account_email'";
        }
    }
    $account = mysqli_query($con,$sql);

    $sql = "SELECT * FROM route_batch WHERE id='$id'";
    if(isset($_POST['batches_filter'])){
        $batch_id = $_POST['batch_id'];
        $batch_type = filter_input(INPUT_POST,'batch_status',FILTER_SANITIZE_STRING);
        $batch_count = $_POST['batch_count'];
        if($batch_id!=""){
            $sql .= " AND batch_id='$batch_id'";
        }
        if($batch_type!="All"){
            $sql .= " AND batch_type='$batch_type'";
        }
    }
    $batch = mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="RouteForm.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <title>Route Section!</title>
</head>
<body>
    <div class="wrapper">
        <div class="wrap1">
            
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
            <hr>

        </div>

        <div class="sub-wrap">
            <div class="wrap2">
                <!-- SIDEBAR -->
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
                                         <a href="./routeform.php">
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
                <div>
            </div>

            <div class="wrap3">
                <div class="main">
       
                    <div class="nav">
            
            
                        <div class="item">
                            <p>Payments</p>
                        </div>
                        <div class="item">
                            <p>Transfers</p>
                        </div> 
                        <div class="item">
                            <p>Reversals</p>
                        </div>
                        <div class="item">
                            <p>Accounts</p>
                        </div>
                        <div class="item">
                            <p>Batch Upload</p>
                        </div>
            
                    </div>
                    <hr>
                <form method="post">
                    <div class="form-1">
                        
                        <div class="one">
            
                            <div class="one_a">
            
                                <div class="input-box">
                                    <label class="details">Payment Id</label>
                                    <input type="text" name="payment_id" >
                                </div>
                                <div class="input-box">
                                    <label class="details">Email</label>
                                    <input type="email" name="email" >
                                </div>
                                <div class="input-box">
                                    <label class="details">Status</label>
                                    <select id="status" name="status">
                                        <option value="All">All</option>
                                        <option value="Processed">Processed</option>
                                        <option value="Processing">Processing</option>
                                        <option value="Failed">Failed</option>
                                      </select>
                                      
                                </div>
            
                            </div>
            
                            <div class="one_b">
                                <div class="input-box">
                                    <label class="details">Duration</label>
                                    <input type="date"  name="duration" placeholder="YYYY-MM-DD">
                                </div>
                                <div class="input-box">
                                    <label class="details">Notes</label>
                                    <input type="text" name="notes">
                                </div>
                                <div class="input-box">
                                    <label class="details">Count</label>
                                    <input type="text"  name="payment_count" >
                                </div>
                            </div>
                            
                            <div class="one_c">
                                <div class="input-box">
                                    <button type="submit" name="payment_filter" class="btn">Search</button>
                                </div>
                            </div>
            
                        </div>
            
                    </form>
            
                        <div class="two">
                                <table>
                                <thead >
                                    <tr class="sub-nav">
                                        <th class="item"><p>Payment Id</p></th>
                                        <th class="item"><p>Amount</p></th>
                                        <th class="item"><p>Email</p></th>
                                        <th class="item"><p>Contact</p></th>
                                        <th class="item"><p>Created At</p></th>
                                        <th class="item"><p>Status</p></th>
                                    </tr>
                            </thead>
                            <tbody>
                                    <?php if(mysqli_num_rows($payment)>0){
                                        if((int)($payment_count)!=0){
                                            $a = $payment_count;
                                        while($rows = mysqli_fetch_assoc($payment) and $a>0) {
                                        ?>
                                        <tr class="sub-nav2">
                                            <td class="item2"> <p> <?php echo $rows['payment_id']; ?> </p> </td>
                                            <td class="item2"> <p> <?php echo $rows['amount']; ?> </p> </td>
                                            <td class="item2"> <p> <?php echo $rows['email']; ?> </p> </td>
                                            <td class="item2"> <p> <?php echo $rows['contact']; ?> </p> </td>
                                            <td class="item2"> <p> <?php echo $rows['createdAt']; ?> </p> </td>
                                            <td class="item2"> <p> <?php echo $rows['status']; ?> </p> </td>
                                        </tr>
                                    <?php $a--; } }else{
                                         while($rows = mysqli_fetch_assoc($payment)) {?>
                                         <tr class="sub-nav2">
                                            <td class="item2"> <p> <?php echo $rows['payment_id']; ?> </p> </td>
                                            <td class="item2"> <p> <?php echo $rows['amount']; ?> </p> </td>
                                            <td class="item2"> <p> <?php echo $rows['email']; ?> </p> </td>
                                            <td class="item2"> <p> <?php echo $rows['contact']; ?> </p> </td>
                                            <td class="item2"> <p> <?php echo $rows['createdAt']; ?> </p> </td>
                                            <td class="item2"> <p> <?php echo $rows['status']; ?> </p> </td>
                                        </tr>
                                    <?php }} ?>
                                <?php }else{ ?>
                                    <hr>
                                    <div class="two_a">
                                        <p>No route payments found on selected duration!</p>
                                    </div>
                                <?php } ?>
                                    </tbody>
                                </table>
                        </div>
                        
                    </div>
            
                <form method="post">
                    <div class="form-2">
                        
                        <div class="one">
            
                            <div class="one_a">
            
                                <div class="input-box">
                                    <label class="details">Transfer Id</label>
                                    <input type="text" name="transfer_id">
                                </div>
                                <div class="input-box">
                                    <label class="details">Transfer Status</label>
                                    <select id="transfer_status" name="transfer_status">
                                        <option value="All">All</option>
                                        <option value="Created">Created</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Processed">Processed</option>
                                        <option value="Failed">Failed</option>
                                        <option value="Reversed">Reversed</option>
                                        <option value="Partially Reversed">Partially Reversed</option>
                                      </select>
                                </div>
                                <div class="input-box">
                                    <label class="details">Count</label>
                                    <input type="text" name="transfer_count">
                                </div>
            
                            </div>
            
                            <div class="one_b">
                                <div class="input-box">
                                    <label class="details">Settlement Status</label>
                                    <select id="settlement_status" name="settlement_status">
                                        <option value="All">All</option>
                                        <option value="Processed">Processed</option>
                                        <option value="Processing">Processing</option>
                                        <option value="On hold">On hold</option>
                                    </select>
                                </div>
                                <div class="input-box">
                                    <label class="details">Reciepient Id</label>
                                    <input type="text" name="recepient_id">
                                </div>
                                <div class="input-box">
                                    <button class="btn" name="transfer_filter">Search</button>
                                </div>
                            </div>
            
                        </div>
            
                    </form>
            
                        <div class="two"> 
                            <table>
                                <thead >
                                    <tr class="sub-nav">
                                        <th class="item"><p>Transfer Id</p></th>
                                        <th class="item"><p>Source Id</p></th>
                                        <th class="item"><p>Amount</p></th>
                                        <th class="item"><p>Created At</p></th>
                                        <th class="item"><p>Transfer Status</p></th>
                                        <th class="item"><p>Settlements Status</p></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(mysqli_num_rows($transfer)>0){
                                        if((int)($transfer_count)!=0){
                                            $a = $transfer_count;
                                        while($rows = mysqli_fetch_assoc($transfer) and $a>0) {
                                        ?>
                                        <tr class="sub-nav2">
                                            <th class="item2"><p><?php echo $rows['transfer_id']; ?></p></th>
                                            <th class="item2"><p><?php echo $rows['source_id']; ?></p></th>
                                            <th class="item2"><p><?php echo $rows['amount']; ?></p></th>
                                            <th class="item2"><p><?php echo $rows['createdAt']; ?></p></th>
                                            <th class="item2"><p><?php echo $rows['transfer_status']; ?></p></th>
                                            <th class="item2"><p><?php echo $rows['settlement_status']; ?></p></th>
                                        </tr>
                                    <?php $a--; } }else{
                                         while($rows = mysqli_fetch_assoc($transfer)) {?>
                                         <tr class="sub-nav2">
                                            <th class="item2"><p><?php echo $rows['transfer_id']; ?></p></th>
                                            <th class="item2"><p><?php echo $rows['source_id']; ?></p></th>
                                            <th class="item2"><p><?php echo $rows['amount']; ?></p></th>
                                            <th class="item2"><p><?php echo $rows['createdAt']; ?></p></th>
                                            <th class="item2"><p><?php echo $rows['transfer_status']; ?></p></th>
                                            <th class="item2"><p><?php echo $rows['settlement_status']; ?></p></th>
                                        </tr>
                                    <?php }} ?>
                                    <?php }else{ ?>
                                        <hr>
                            
                                    <div class="two_a">
                                        <p>No transfers found! </p>
                                    </div>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
            
                <form method="post">
                    <div class="form-3">
                        
                        <div class="one">
            
                            <div class="one_a">
            
                                <div class="input-box">
                                    <label class="details">Reversal Id</label>
                                    <input type="text" name="reversal_id">
                                </div>
                                <div class="input-box">
                                    <label class="details">Count</label>
                                    <input type="text" name="reversal_count">
                                </div>
                                <div class="input-box">
                                    <button class="btn" name="reversal_filter">Search</button>
                                </div>
            
                            </div>
            
                        </div>
            
                </form>
        
                        <div class="two"> 
                            <table>
                                <thead >
                                    <tr class="sub-nav">
                                        <th class="item"><p>Reversal Id</p></th>
                                        <th class="item"><p>Transfer Id</p></th>
                                        <th class="item"><p>Amount</p></th>
                                        <th class="item"><p>Created At</p></th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php if(mysqli_num_rows($reversal)>0){
                                        if((int)($reversal_count)!=0){
                                            $a = $reversal_count;
                                        while($rows = mysqli_fetch_assoc($reversal) and $a>0) {
                                        ?>
                                        <tr class="sub-nav2">
                                            <th class="item2"><p><?php echo $rows['reversal_id']; ?></p></th>
                                            <th class="item2"><p><?php echo $rows['transfer_id']; ?></p></th>
                                            <th class="item2"><p><?php echo $rows['amount']; ?></p></th>
                                            <th class="item2"><p><?php echo $rows['createdAt']; ?></p></th>
                                        </tr>
                                        <?php $a--; } }else{
                                         while($rows = mysqli_fetch_assoc($reversal)) {?>
                                         <tr class="sub-nav2">
                                            <th class="item2"><p><?php echo $rows['reversal_id']; ?></p></th>
                                            <th class="item2"><p><?php echo $rows['transfer_id']; ?></p></th>
                                            <th class="item2"><p><?php echo $rows['amount']; ?></p></th>
                                            <th class="item2"><p><?php echo $rows['createdAt']; ?></p></th>
                                        </tr>
                                        <?php }} ?>
                                    <?php }else{ ?>
                                        <hr>
                            
                                        <div class="two_a">
                                            <p>No reversal found! </p>
                                        </div>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                <form method="post">
            
                    <div class="form-4">
                        
                        <div class="one">
            
                            <div class="one_a">
            
                                <div class="input-box">
                                    <label class="details">Account Id</label>
                                    <input type="text" name="account_id">
                                </div>
                                <div class="input-box">
                                    <label class="details">Account Email</label>
                                    <input type="email" name="account_email">
                                </div>
                                <div class="input-box">
                                    <label class="details">Count</label>
                                    <input type="text" name="account_count">
                                </div>
                            </div>
                            <div class="one_b">
                                <div class="input-box">
                                    <button class="btn" name="account_filter">Search</button>
                                </div>
                            </div>
            
                        </div>
            
                </form>
            
                        <div class="two"> 
                            <table>
                                <thead >
                                    <tr class="sub-nav">
                                        <th class="item"><p>Account Id</p></th>
                                        <th class="item"><p>Email</p></th>
                                        <th class="item"><p>Name</p></th>
                                        <th class="item"><p>Account Status</p></th>
                                        <th class="item"><p>Dashboard Access<p></th>
                                        <th class="item"><p>Allow Refunds</p></th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php if(mysqli_num_rows($account)>0){
                                        if((int)($account_count)!=0){
                                            $a = $account_count;
                                        while($rows = mysqli_fetch_assoc($account) and $a>0) {
                                        ?>
                                        <tr class="sub-nav2">
                                            <th class="item2"><p><?php echo $rows['account_id'] ?></p></th>
                                            <th class="item2"><p><?php echo $rows['email'] ?></p></th>
                                            <th class="item2"><p><?php echo $rows['name'] ?></p></th>
                                            <th class="item2"><p><?php echo $rows['account_status'] ?></p></th>
                                            <th class="item2"><p><?php echo $rows['dashboard_access'] ?><p></th>
                                            <th class="item2"><p><?php echo $rows['allow_refunds'] ?></p></th>
                                        </tr>
                                        <?php $a--; } }else{
                                         while($rows = mysqli_fetch_assoc($account)) {?>
                                         <tr class="sub-nav2">
                                            <th class="item2"><p><?php echo $rows['account_id'] ?></p></th>
                                            <th class="item2"><p><?php echo $rows['email'] ?></p></th>
                                            <th class="item2"><p><?php echo $rows['name'] ?></p></th>
                                            <th class="item2"><p><?php echo $rows['account_status'] ?></p></th>
                                            <th class="item2"><p><?php echo $rows['dashboard_access'] ?><p></th>
                                            <th class="item2"><p><?php echo $rows['allow_refunds'] ?></p></th>
                                        </tr>
                                        <?php }} ?>
                                    <?php }else{ ?>
                                        <hr>
                            
                                        <div class="two_a">
                                            <p>No Accounts found! </p>
                                        </div>
                                    <?php } ?>
                                </tbody>
                            </table> 
                        </div>  
                    </div>

            <form method="post">
                    <div class="form-5">
                        
                        <div class="one">
            
                            <div class="one_a">
            
                                <div class="input-box">
                                    <label class="details">Batch Upload Id</label>
                                    <input type="text" name="batch_id">
                                </div>
                                <div class="input-box">
                                    <label class="details">Batch Type</label>
                                    <select id="batch_status" name="batch_status">
                                        <option value="All">All</option>
                                        <option value="Transfers">Transfers</option>
                                        <option value="Reversals">Reversals</option>
                                        <option value="Linked Accounts">Linked Accounts</option>
                                    </select>
                                </div>
                                <div class="input-box">
                                    <label class="details">Count</label>
                                    <input type="text" name="batch_count">
                                </div>
                            </div>
                            <div class="one_b">
                                <div class="input-box">
                                    <button class="btn" name="batches_filter">Search</button>
                                </div>
                            </div>
            
                        </div>
                    </form>
            
                        <div class="two"> 
                            <table>
                                <thead >
                                    <tr class="sub-nav">
                                        <th class="item"><p>Batch Id</p></th>
                                        <th class="item"><p>Batch Name</p></th>
                                        <th class="item"><p>Count</p></th>
                                        <th class="item"><p>Type</p></th>
                                        <th class="item"><p>Status</p></th>
                                        <th class="item"><p>Actions</p></th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php if(mysqli_num_rows($batch)>0){
                                        if((int)($batch_count)!=0){
                                            $a = $batch_count;
                                        while($rows = mysqli_fetch_assoc($batch) and $a>0) {
                                        ?>
                                        <tr class="sub-nav">
                                            <td class="item"><p><?php echo $rows['batch_id']; ?></p></td>
                                            <td class="item"><p><?php echo $rows['batch_name']; ?></p></td>
                                            <td class="item"><p><?php echo $rows['count']; ?></p></td>
                                            <td class="item"><p><?php echo $rows['type']; ?></p></td>
                                            <td class="item"><p><?php echo $rows['status']; ?></p></td>
                                            <td class="item"><p><?php echo $rows['actions']; ?></p></td>
                                        </tr>
                                        <?php $a--; } }else{
                                         while($rows = mysqli_fetch_assoc($batch)) {?>
                                         <tr class="sub-nav2">
                                            <td class="item2"><p><?php echo $rows['batch_id']; ?></p></td>
                                            <td class="item2"><p><?php echo $rows['batch_name']; ?></p></td>
                                            <td class="item2"><p><?php echo $rows['count']; ?></p></td>
                                            <td class="item2"><p><?php echo $rows['type']; ?></p></td>
                                            <td class="item2"><p><?php echo $rows['status']; ?></p></td>
                                            <td class="item2"><p><?php echo $rows['actions']; ?></p></td>
                                        </tr>
                                        <?php }} ?>
                                    <?php }else{ ?>
                                        <hr>
                            
                                        <div class="two_a">
                                            <p>No Batch Files Found<br>
                                                Create multiple Transfers, Reversals or linked Accounts, in one go using a batch file. <br>Simply upload a file containing all the information.
                                                </p>
                                        </div>
                                    <?php } ?>
                                </tbody>
                            </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script src="Route.js"></script>    
</body>
</html>