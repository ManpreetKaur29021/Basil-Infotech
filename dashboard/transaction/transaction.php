<?php
session_start();
include("../../signup/function.php");
include("../../signup/server.php");
//$id=25;

//variable for payments
$ppid="";
$pstatus="";
$pemail="";
$note="";
$duration="";
$count="0";
$query="";
$id=$_SESSION['userid'];
//$query="SELECT * FROM payments ";
$sql = "SELECT * FROM payments WHERE  id='$id'";
if(isset($_POST['payment'])){
   
    $ppid=get_safe_real($_POST['ppid']);
   $pstatus=get_safe_real($_POST['pstatus']);
$pemail=get_safe_real($_POST['pemail']);
$duration=get_safe_real($_POST['pduration']);
$count=get_safe_real($_POST['pcount']);
if($ppid !="") {
  $sql .= " AND pid='$ppid'";
}
if($pemail !="") {
    $sql .= " AND email='$pemail'";
}
if($pstatus !="") {
    $sql .= " AND st='$pstatus'";
}
if($duration !="") {
    $sql .= " AND duration='$duration'";
}

}
$payment = mysqli_query($con, $sql);


//varibale for Refund
$rpid="";
$rrid="";
$rcount="0";
$rnotes="";
$rstatus="";


$sql = "SELECT * FROM refund WHERE  id='$id'";
if(isset($_POST['refund'])){
   
 $rpid=get_safe_real($_POST['rpid']);
   $rstatus=get_safe_real($_POST['rstatus']);
$rrid=get_safe_real($_POST['rrid']);
$rnotes=get_safe_real($_POST['rnotes']);
$rcount=get_safe_real($_POST['rcount']);

if($rpid !="") {
  $sql .= " AND payid='$rpid'";
}
if($rrid !="") {
    $sql .= " AND rid='$rrid'";
}
if($rstatus !="") {
    $sql .= " AND status='$rstatus'";
}

}
$refund = mysqli_query($con, $sql);


//varibale for batch


$buid="";
$bcount="0";


$sql = "SELECT * FROM batch WHERE  id='$id'";
if(isset($_POST['batch'])){
   
$buid=get_safe_real($_POST['buid']);
$bcount=get_safe_real($_POST['bcount']);

if($buid !="") {
    $sql .= " AND bid='$buid'";
  }
 

}
$batch = mysqli_query($con, $sql);



//varibale for order


$oid="";
$orecipt="";
$onotes="";
$ostatus="";
$ocount="0";

$sql = "SELECT * FROM orders WHERE  id='$id'";
if(isset($_POST['order'])){
   
    $oid=get_safe_real($_POST['ooid']);
    $orecipt=get_safe_real($_POST['oreceipt']);
    $onotes=get_safe_real($_POST['onotes']);
    $ostatus=get_safe_real($_POST['ostatus']);
    $ocount=get_safe_real($_POST['ocount']);
    

    if($oid !="") {
        $sql .= " AND oid='$oid'";
      }
      if($ostatus !="") {
        $sql .= " AND status='$ostatus'";
    }
    //   if($ostatus !="") {
    //       $sql .= " AND count='$ostatus'";
    //   }

}
$order = mysqli_query($con, $sql);





//varibale for dispute


$ddid="";
$dpid="";
$dduration="";
$dtype="";
$dstatus="";



$sql = "SELECT * FROM dispute WHERE  id='$id'";
if(isset($_POST['dispute'])){
   
    $ddid=get_safe_real($_POST['ddid']);
    $dpid=get_safe_real($_POST['dpid']);
    $dduration=get_safe_real($_POST['dduration']);
    $dtype=get_safe_real($_POST['ddtype']);
    $dstatus=get_safe_real($_POST['ddstate']);
    echo $dduration;

    if($ddid !="") {
        $sql .= " AND did='$ddid'";
      }
      if($dpid !="") {
          $sql .= " AND pid='$dpid'";
      }
      if($dtype !="") {
        $sql .= " AND dtype='$dtype'";
    }
    if($dstatus !="") {
        $sql .= " AND dstatus='$dstatus'";
    }
    if($dduration !="") {
        $sql .= " AND createe='$dduration'";
    }

}
$dispute = mysqli_query($con, $sql); 


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Transaction</title>
</head>
<body>
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
            <a href="../../logout.php" style=" text-decoration: none"> <button class="button">Log Out</button></a>
        
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
                         <a href="./transaction.php">
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
                         <a href="">
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

 <div class="firsts">
 <div class="align">
   <div class="container justify-content-center align">
     <div class= "form-group col-sm-10  ">
         <div class="row">
                 <div class="col co payement color"><b>Payments</b></div>
                 <div class="col co refund"><b>Refunds</b></div>
                 <div class="col co batch"><b>Batch Refunds</b></div>
                 <div class="col co orders"><b>Orders</b></div>
                 <div class="col co dispute"><b>Disputes</b></div>    
         </div>  
     </div>      
 </div>  
</div>   

 <div class="row justify-content-center">
 <div class=" col col-sm-10">
     <div class="cont2" style="background-color:#d3dbd5;padding-top: 30px;padding-bottom: 30px;">
     
         <form style="margin-left: 20px;" method="post">
             <div class="form-group row">
                 <label class="col-md-1"><b>Payement Id</b></label>
                 <div class="col-md-2">
                  <input name="ppid" class="form-control input-sm"  value="">
                 </div>
                  <label class="col-md-1"><b>Duration</b></label>
                  <div class="col-md-2">
                  <input name="pduration" type ="date" class="form-control input-sm"  value="">
                     <!-- <select name="pduration" class="form-control input-sm">
                         <option value="1">Past 7 Days</option>
                         <option value="2">Past 30 Days</option>
                         <option value="3">Past 90 Days</option>
                         <option value="4"selected>Custom Range</option>
                     </select> -->
                 </div>
                 <label class="col-md-1"><b>Status</b></label>
                 <div class="col-2 col-md-1" style="padding-bottom: 5px;">
                     <select name="pstatus" class="form-control input-sm">
                         <option value="" selected>All</option>
                         <option value="active">active</option>
                         <option value="inactive">inactive</option>
                     </select>
                 </div>
 
                 <label class="col-md-1"><b> Email Id</b></label>
                 <div class="col-md-2">
                  <input name="pemail" class="form-control input-sm"  value="">
                 </div>
                 
                 <label class="col-md-1" style="margin-left:5px"><b>Notes</b></label>
                 <div class="col-md-2">
                  <input name="pnotes" class="form-control input-sm"  value="">
                 </div>
                 <label class="col-md-1"><b>Count</b></label>
                 <div class="col-md-2">
                  <input name="pcount" type="number" class="form-control input-sm"  value="">
                 </div>
                 <div class="col-md-1">
                    <button type="submit" name="payment" class="btn btn-warning" style="width:100px">Search</button>
                 </div>
             </div>
         </form>
     </div>
 </div>
 </div>

 <div class="row justify-content-center">
 <div class="col col-sm-10">
 <div class="data-table ">
     <div class="table-responsive">
         <table class="table table-hover table-striped undefined">
             <thead style="background-color: #d4d4d5;">
                 <tr>
                     <th>Payement Id</th>
                     <th>Amount</th>
                     <th>Email</th>
                     <th>Contact</th>
                     <th>Created At</th>  
                     <th class="status-col">Status</th>  
                 </tr>
             </thead>
             <tbody  class="description empty-table-message" style="background-color: grey;background-color:#d3dbd5;">
      <?php if(mysqli_num_rows($payment)>0){
                    //$i=1;
                        if(intval($count)!=0){
                            $num=$count;
                        while($row=mysqli_fetch_assoc($payment) and $num>0){

                    ?>
                <tr>
                    <td><?php echo $row["pid"]?></td>
                    <td><?php echo $row["amount"]?></td>
                    <td><?php echo $row["email"]?></td>
                    <td><?php echo $row["contact"]?></td>
                    <td><?php echo $row["duration"]?></td>
                    <td class="status-col"><?php echo $row["st"]?></td>  
                </tr>

            <?php $num--;}}else{
                while($row=mysqli_fetch_assoc($payment)){?>
                <tr>
                    <td><?php echo $row["pid"]?></td>
                    <td><?php echo $row["amount"]?></td>
                    <td><?php echo $row["email"]?></td>
                    <td><?php echo $row["contact"]?></td>
                    <td><?php echo $row["duration"]?></td>
                    <td class="status-col"><?php echo $row["st"]?></td>  
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
         </table>
     </div>
 </div>
 </div>
 </div>
</div>
 <div class="seconds invisible">
 <div class="align">
   <div class="container justify-content-center align">
     <div class= "form-group col-sm-10  ">
         <div class="row">
                 <div class="col co payement color"><b>Payments</b></div>
                 <div class="col co refund"><b>Refunds</b></div>
                 <div class="col co batch"><b>Batch Refunds</b></div>
                 <div class="col co orders"><b>Orders</b></div>
                 <div class="col co dispute"><b>Disputes</b></div>    
         </div>  
     </div>      
 </div>  
</div>   

 <div class="row justify-content-center">
 <div class=" col col-sm-10">
     <div class="cont2" style="background-color:#d3dbd5;padding-top: 30px;padding-bottom: 30px;">
         <form style="margin-left: 20px;" method="post">
             <div class="form-group row">
                 <label class="col-md-1"><b>Refund Id</b></label>
                 <div class="col-md-2">
                  <input name="rrid"class="form-control input-sm"  value="">
                 </div>
                 <label class="col-md-1"><b>Payement Id</b></label>
                 <div class="col-md-2">
                  <input name="rpid" class="form-control input-sm"  value="">
                 </div>
                  <label class="col-md-1"><b>Status</b></label>
                  <div class="col-md-2">
                     <select name="rstatus" class="form-control input-sm">
                         <option value="" selected>All</option>
                         <option value="Processed">Processed</option>
                         <option value="Processing">Processing</option>
                         <option value="Failed">Failed</option>
                         <!-- <option value="" selected>Processed</option>
                         <option value="active">Processing</option>
                         <option value="inactive">Failed</option> -->
                     </select>
                 </div>
                 <label class="col-md-1"><b> Count</b></label>
                 <div class="col-2 col-md-1" style="padding-bottom: 5px;">
                    <input name="rcount" type="number" class="form-control input-sm" value="">   
                </div>
                
                 <label class="col-md-1" style="margin-left: 5px;"><b>Notes</b></label>
                 <div class="col-2 col-md-1" style="padding-bottom: 5px;">
                     <input name="rnotes" class="form-control input-sm" value="">   
                 </div>
                 <div class="col-md-1">
                     <button type="submit" name="refund" id="refund"class="btn btn-warning" style="width:100px">Search</button>
                 </div>
             </div>
         </form>
     </div>
 </div>
 </div>

 <div class="row justify-content-center">
 <div class="col col-sm-10">
 <div class="data-table ">
     <div class="table-responsive">
         <table class="table table-hover table-striped undefined">
             <thead style="background-color: #d4d4d5;">
                 <tr>
                     <th>Refund Id</th>
                     <th>Payment Id</th>
                     <th>Amount</th>
                     <th>Created At</th>
                     <th class="status-col">Status</th>  
                 </tr>
             </thead>
             <tbody  class="description empty-table-message" style="background-color: grey;background-color:#d3dbd5;">
    <?php if(mysqli_num_rows($refund)>0){
            //$i=1;
                    //$i=1;
        if(intval($rcount)!=0){
            $num=$rcount;
            while($row=mysqli_fetch_assoc($refund) and $num>0){?>
                <tr>
                    <td><?php echo $row["rid"]?></td>
                    <td><?php echo $row["payid"]?></td>
                    <td><?php echo $row["amt"]?></td>
                    <td><?php echo $row["createe"]?></td>
                    <td class="status-col"><?php echo $row["status"]?></td>  
                </tr>

        <?php $num--;}}else{
            while($row=mysqli_fetch_assoc($refund)){?>
                <tr>
                    <td><?php echo $row["rid"]?></td>
                    <td><?php echo $row["payid"]?></td>
                    <td><?php echo $row["amt"]?></td>
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
         </table>
     </div >
    </div>
    </div>
 </div>
 </div>



 <div class="thirds invisible">
    <div class="align">
      <div class="container right justify-content-center align">
        <div class= "form-group col-sm-10  ">
            <div class="row">
                    <div class="col co payement color"><b>Payments</b></div>
                    <div class="col co refund"><b>Refunds</b></div>
                    <div class="col co batch"><b>Batch Refunds</b></div>
                    <div class="col co orders"><b>Orders</b></div>
                    <div class="col co dispute"><b>Disputes</b></div>    
            </div>  
        </div>      
    </div>  
   </div>   
   
    <div class="row justify-content-center">
    <div class=" col col-sm-10">
        <div class="cont2" style="background-color:#d3dbd5;padding-top: 30px;padding-bottom: 30px;">
        <form style="margin-left: 20px;" method="post">
                <div class="form-group row">
                    <label class="col-md-1"><b>Batch Upload Id</b></label>
                    <div class="col-md-2">
                    <input name="buid" class="form-control input-sm"  value="">
                    </div>
                    <label class="col-md-1"><b>Count</b></label>
                    <div class="col-md-2">
                     <input name="bcount"  type="number" class="form-control input-sm"  value="">
                    </div>
                   
                    <div class="col-md-1">
                        <button type="submit" name="batch" class="btn btn-warning" style="width:100px">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
   
    <div class="row justify-content-center">
    <div class="col col-sm-10">
    <div class="data-table ">
        <div class="table-responsive">
            <table class="table table-hover table-striped undefined">
                <thead style="background-color: #d4d4d5;">
                    <tr>
                        <th>Batch Upload Id</th>
                        <th>Count</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th class="status-col">Actions</th>  
                    </tr>
                </thead>
                <tbody  class="description empty-table-message" style="background-color: grey;background-color:#d3dbd5;">
    <?php if(mysqli_num_rows($batch)>0){
                //$i=1;
            if(intval($bcount)!=0){
                $num=$bcount;
            while($row=mysqli_fetch_assoc($batch) and $num>0){
                    ?>
                <tr>
                    <td><?php echo $row["bid"]?></td>
                    <td><?php echo $row["count"]?></td>
                    <td><?php echo $row["status"]?></td>
                    <td><?php echo $row["createe"]?></td>
                    <td class="status-col"><?php echo $row["actions"]?></td>  
                </tr>
               
            <?php  $num--; }}else{ 
                while($row=mysqli_fetch_assoc($batch)){?>
                    <tr>
                    <td><?php echo $row["bid"]?></td>
                    <td><?php echo $row["count"]?></td>
                    <td><?php echo $row["status"]?></td>
                    <td><?php echo $row["createe"]?></td>
                    <td class="status-col"><?php echo $row["actions"]?></td>  
                </tr>
               <?php }}
                ?>


    <?php }
    else {?>            
                <tr>
                    <td>
                        <h4 class="empty-table-message" style="text-align: center;background-color:#d3dbd5;padding: 130px;">No Refunds Found!</h4>
                    </td>
                </tr>
    <?php }?>            
             </tbody>
            </table>

        </div>
    </div>
    </div>
    </div>
    </div>

 <div class="fourth invisible">
 <div class="align">
   <div class="container justify-content-center align">
     <div class= "form-group col-sm-10  ">
             <div class="row">
                     <div class="col co payement color"><b>Payments</b></div>
                     <div class="col co refund"><b>Refunds</b></div>
                     <div class="col co batch"><b>Batch Refunds</b></div>
                     <div class="col co orders"><b>Orders</b></div>
                     <div class="col co dispute"><b>Disputes</b></div>    
             </div>  
     </div>      
 </div>  
</div>   
       
 <div class="row justify-content-center">
 <div class=" col col-sm-10">
     <div class="cont2" style="background-color:#d3dbd5;padding-top: 30px;padding-bottom: 30px;">
     <form style="margin-left: 20px;"  method="post">
             <div class="form-group row">
                 <label class="col-md-1"><b>Order Id</b></label>
                 <div class="col-md-2">
                  <input name="ooid" class="form-control input-sm"  value="">
                 </div>
                 <label class="col-md-1"><b>Receipt</b></label>
                 <div class="col-2 col-md-1" style="padding-bottom: 5px;">
                    <input name="oreceipt" class="form-control input-sm" value="">   
                </div>
                
                <label class="col-md-1"><b>Notes</b></label>
                <div class="col-md-2">
                    <input name="onotes" class="form-control input-sm"  value="">
                </div>
                
                <label class="col-md-1"><b>Status</b></label>
                <div class="col-md-2">
                <select name="ostatus" class="form-control input-sm">
                        <option value="" selected>All</option>
                       <option value="Created">Created</option>
                       <option value="Attempted">Attempted</option>
                       <option value="Paid">Paid</option>
                   </select>
                   <!-- <select name="ostatus" class="form-control input-sm">
                       <option value="">Created</option>
                       <option value="active">Attempted</option>
                       <option value="inactive">Paid</option>
                   </select> -->
               </div>

                 <label class="col-md-1" style="margin-left: 1px;"><b>Count</b></label>
                 <div class="col-md-2">
                  <input name="ocount" type="number" class="form-control input-sm"  value="">
                 </div>
                 <div class="col-md-1">
                     <button type="submit" name="order" class="btn btn-warning" style="width:100px">Search</button>
                 </div>
             </div>
         </form>
     </div>
 </div>
 </div>
       
 <div class="row justify-content-center">
 <div class="col col-sm-10">
 <div class="data-table ">
     <div class="table-responsive">
         <table class="table table-hover table-striped undefined">
             <thead style="background-color: #d4d4d5;">
                 <tr>
                     <th>Order Id</th>
                     <th>Amount Attempts</th>
                     <th>Reciept</th>
                     <th>Created At</th>
                     <th class="status-col">Status</th>  
                 </tr>
             </thead>
             <tbody  class="description empty-table-message" style="background-color: grey;background-color:#d3dbd5;">
    <?php if(mysqli_num_rows($order)>0){
                //$i=1;
                if(intval($ocount)!=0){
                    $num=$ocount;
                while($row=mysqli_fetch_assoc($order) and $num>0){
                        ?>
                <tr>
                    <td><?php echo $row["oid"]?></td>
                    <td><?php echo $row["attempts"]?></td>
                    <td><?php echo $row["reciept"]?></td>
                    <td><?php echo $row["createe"]?></td>
                    <td class="status-col"><?php echo $row["status"]?></td>  
                </tr>
                <?php $num--; }}else{ 
                    while($row=mysqli_fetch_assoc($batch)){?>
                <tr>
                    <td><?php echo $row["oid"]?></td>
                    <td><?php echo $row["attempts"]?></td>
                    <td><?php echo $row["reciept"]?></td>
                    <td><?php echo $row["createe"]?></td>
                    <td class="status-col"><?php echo $row["status"]?></td>  
                </tr>
                   <?php }}
                    ?>
    
    
        <?php }
        else {?>           
                <tr>
                    <td>
                        <h4 class="empty-table-message" style="text-align: center;background-color:#d3dbd5;padding: 130px;">No Refunds Found!</h4>
                    </td>
                </tr>
    <?php }?>            
             </tbody>
         </table>
     </div>
 </div>
 </div>
 </div>
</div>
</div>
</div>
 <div class="fifth invisible">
 <div class="align">
   <div class="container justify-content-center align">
     <div class= "form-group col-sm-10  ">
             <div class="row">
                     <div class="col co payement color"><b>Payments</b></div>
                     <div class="col co refund"><b>Refunds</b></div>
                     <div class="col co batch"><b>Batch Refunds</b></div>
                     <div class="col co orders"><b>Orders</b></div>
                     <div class="col co dispute"><b>Disputes</b></div>    
             </div>  
     </div>      
 </div>  
</div>   
       
 <div class="row justify-content-center">
 <div class=" col col-sm-10">
     <div class="cont2" style="background-color:#d3dbd5;padding-top: 30px;padding-bottom: 30px;">
     <form style="margin-left: 20px;" method="post">
             <div class="form-group row">
                 <label class="col-md-1"><b>Dispute Id</b></label>
                 <div class="col-md-2">
                  <input name="ddid" class="form-control input-sm"  value="">
                 </div>
                 <label class="col-md-1"><b>Payement Id</b></label>
                 <div class="col-md-2">
                  <input name="dpid" class="form-control input-sm"  value="">
                 </div>
                 <label class="col-md-1"><b>Duration</b></label>
                 <div class="col-2 col-md-1" style="padding-bottom: 5px;">
                     <input name="dduration" type="date" class="form-control input-sm" value="">   
                 </div>
                  <label class="col-md-1"><b>Dispute Type</b></label>
                  <div class="col-md-2">
                  <select name="ddtype" class="form-control input-sm">
                        <option value="" selected>ALL</option>
                         <option value="Retrieval" >Retrieval</option>
                         <option value="Chargeback">Chargeback</option>
                         <option value="Pre Arbitration">Pre Arbitration</option>
                         <option value="Arbitration">Arbitration</option>
                         <option value="Fraud">Fraud</option>
  
                     </select>
                 </div>
                  <label class="col-md-1" style="margin-left: 1px;"><b>Dispute State</b></label>
                  <div class="col-md-2">
                  <select name="ddstate" class="form-control input-sm">
                        <option value="" selected>ALL</option>
                         <option value="Open">Open</option>
                         <option value="Under Review">Under Review</option>
                         <option value="Lost">Lost</option>
                         <option value="Won">Won</option>
                         <option value="Close">Close</option>
                     </select>
                    
                 </div>

                 <div class="col-md-1">
                    <button type="submit" name="dispute" class="btn btn-warning" style="width:100px">Search</button>
                 </div>
             </div>
         </form>
     </div>
 </div>
 </div>
       
 <div class="row justify-content-center">
 <div class="col col-sm-10">
 <div class="data-table ">
     <div class="table-responsive">
         <table class="table table-hover table-striped undefined">
             <thead style="background-color: #d4d4d5;">
                 <tr>
                     <th>Dispute Id</th>
                     <th>Payment ID</th>
                     <th>Amount</th>
                     <th>Created At</th>
                     <th>Dispute Type</th>
                     <th class="status-col">Dispute Status</th>  
                 </tr>
             </thead>
             <tbody  class="description empty-table-message" style="background-color: grey;background-color:#d3dbd5;">
    <?php if(mysqli_num_rows($dispute)>0){
                //$i=1;
            while($row=mysqli_fetch_assoc($dispute)){
                    ?>
                <tr>
                    <td><?php echo $row["did"]?></td>
                    <td><?php echo $row["pid"]?></td>
                    <td><?php echo $row["amt"]?></td>
                    <td><?php echo $row["createe"]?></td>
                    <td><?php echo $row["dtype"]?></td>
                    <td class="status-col"><?php echo $row["dstatus"]?></td>  
                </tr>
            <?php } ?>
    <?php }
    else {?>            
                <tr>
                    <td>
                        <h4 class="empty-table-message" style="text-align: center;background-color:#d3dbd5;padding: 130px;">No Refunds Found!</h4>
                    </td>
                </tr>
    <?php }?>            
             </tbody>


         </table>
     </div>
 </div>
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
        $(".payement").click(function(){
            $(".payement").addClass("color");
            $(".refund").removeClass("color");
            $(".batch").removeClass("color");
            $(".orders").removeClass("color");
            $(".dispute").removeClass("color");


            $(".firsts").removeClass("invisible");
            $(".seconds").addClass("invisible");
            $(".thirds").addClass("invisible");    
            $(".fourth").addClass("invisible");    
            $(".fifth").addClass("invisible");    
        })
        $(".refund ").click(function(){
            
            $(".payement").removeClass("color");
            $(".refund").addClass("color");
            $(".batch").removeClass("color");
            $(".orders").removeClass("color");
            $(".dispute").removeClass("color");

            $(".firsts").addClass("invisible");
            $(".seconds").removeClass("invisible");
            $(".thirds").addClass("invisible");
            $(".fourth").addClass("invisible");    
            $(".fifth").addClass("invisible");    
        })
        $(".batch").click(function(){
            $(".payement").removeClass("color");
            $(".refund").removeClass("color");
            $(".batch").addClass("color");
            $(".orders").removeClass("color");
            $(".dispute").removeClass("color");

            $(".firsts").addClass("invisible");
            $(".seconds").addClass("invisible");
            $(".thirds").removeClass("invisible");
            $(".fourth").addClass("invisible"); 
            $(".fifth").addClass("invisible"); 
        })
        $(".orders").click(function(){
            $(".payement").removeClass("color");
            $(".refund").removeClass("color");
            $(".batch").removeClass("color");
            $(".orders").addClass("color");
            $(".dispute").removeClass("color");

            $(".firsts").addClass("invisible");
            $(".seconds").addClass("invisible");
            $(".thirds").addClass("invisible");
            $(".fourth").removeClass("invisible");
            $(".fifth").addClass("invisible");
        })
        $(".dispute").click(function(){
            $(".payement").removeClass("color");
            $(".refund").removeClass("color");
            $(".batch").removeClass("color");
            $(".orders").removeClass("color");
            $(".dispute").addClass("color");

            $(".firsts").addClass("invisible");
            $(".seconds").addClass("invisible");
            $(".thirds").addClass("invisible");
            $(".fourth").addClass("invisible");
            $(".fifth").removeClass("invisible");
        })
    </script>
    
</body>

</html>