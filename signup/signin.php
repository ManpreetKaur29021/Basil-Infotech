<?php
      session_start();
     include("function.php");
     require("server.php");
    $g=" ";
    $email="";
    //global $userid;
    $password="";
    $_SESSION["check"]="";
    $_SESSION["email"]="";

    require_once 'vendor/autoload.php';

      $clientID = '728789696058-8jaq1q3ofcm9hn8cl04r9428pnp5h7tg.apps.googleusercontent.com';
      $clientSecret = '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';
      $redirectURL = 'http://localhost/new_project/signup/signin.php';

      $client = new Google_Client();
      $client->setClientId($clientID);
      $client->setClientSecret($clientSecret);
      $client->setRedirectUri($redirectURL);
      $client->addScope('profile');
      $client->addScope('email');
    
    // if(isset($_POST['google'])){
      if(isset($_GET['code'])){
          $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
          $client->setAccessToken($token);

          $gauth = new Google_Service_Oauth2($client);
          $google_info = $gauth->userinfo->get();
          global $name, $pwd, $email;
          $pwd = crypt($google_info->id,PASSWORD_DEFAULT);
          echo $pwd;
          $email =$google_info->email;
          $name = $google_info->name;
          // mysqli_query($con,"insert into signup(name,email,pwd) values('$name','$email','$pwd')");
          // print_r($google_info);
          // echo $pwd."\n\nWelcome ".$name." You are registered using gmail: ".$email;
          // if (isset($_GET['code'])) 
          // {
          //   header('Location: ./signin.php');
          // }
      }
    // }



   if(!empty($email)&&!empty($pwd)){
    $email = $email;
    $_SESSION["email"]=$email;
   // $password =$pwd;
    $result=mysqli_query($con,"select pwd from signup where email='$email' and status=1");
      while($row =mysqli_fetch_assoc($result)) {
        $password=$row['pwd'];
       // echo $_SESSION["otp"];  password_hash(  ),PASSWORD_DEFAULT
     }
    $_SESSION["check"]="no";
   }
    else if(isset($_POST['email']) && isset($_POST['pwd']))
    { 
    $email = get_safe_real($_POST['email']);
    $_SESSION["email"]=$email;
    //$password =get_safe_real($_POST['pwd']);
    $password = crypt(get_safe_real($_POST['pwd']),PASSWORD_DEFAULT);
    $_SESSION["check"]="no";
    }
    else
    {
        $email=null;
        $password=null;
    }
  
  //  echo $email;
  //  echo $password; 
   
 $sql = "SELECT * FROM signup WHERE email='$email' AND pwd='$password'";
 $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        echo " login done";
        $_SESSION['userid']=$row['id'];
        //global $userid;
        $_SESSION["IS_LOGIN"]="yes";
        $_SESSION["ADMIN_USER"]=$row['name'];
        $_SESSION["check"]="yes";
        redirect("../dashboard/dashboard.php");      
    }
    else{   
        $email =NULL;
        $password=NULL;
        if($_SESSION["check"]=="no"){
            $g="Please enter valid login details";
        }
       
        //echo $g;
    } 
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./signin.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>*{
        margin: 0;
        padding: 0;
    }
    body{
        background-color: #e6e6e6;
    }
    .nav-item {
        font-family: 'DM Sans', sans-serif;
        margin: 0px 10px;
        font-weight: 900;
    }
    .nav-link {
        color: white !important;
    }
    .nav-link:hover{
        text-decoration: underline;
        background-color: white !important;
        color:black !important;
        cursor: pointer;
        border-radius: 1.5rem;
        text-decoration: underline;
    }
    .navbar-brand{
        font-family: 'Montserrat', sans-serif;
        font-weight: bolder;
        color: white !important;
    }
    
    
    .bg-light {
        background-color: #e6e6e6 !important;
    }
    </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a href="../index.html" class="navbar-brand">B-Pay</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
          <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="../home/payment/PayPage.html" class="nav-link">Payments</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Industries</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Resources</a>
            </li>
            <li class="nav-item">
              <a href="../home/contact/contact.php" class="nav-link">Contact</a>
            </li>
            <li class="nav-item">
              <a href="./signup.php" class="nav-link">Sign up</a>
            </li>
          </ul>
        </div>
    
      </nav>
    <!-- <nav class="navbar navbar-light bg-light">
      <span class="navbar-brand mb-0 w-100 p-3 h1 font-weight-bold" style="font-size: xx-large;">
        <img src="#" width="30" height="30" class="d-inline-block align-top" alt="">
        B-Pay
      </span>
    </nav> -->
    <div class="box">
      <div class="left">
        <h4 class="content"> <img class="img-left" src="./images/1.png" height="300px"alt=""> <p>Quick and easy Actication</p> </h4>
        <h4 class="content"> <img class="img-left" src="./images/2.png" height="30px" alt=""> <p>Secured & encrypted transactions</p></h4>
        <h4 class="content"> <img class="img-left" src="./images/3.png" height="30px" alt=""> <p>Saftest Way to grow online</p></h4>
        <!-- <h6 style="text-align: center;"> 100,000 Business Trust CashFree</h6>  -->
        <hr class="hr-text">
        <hr class="left-hr">
        <h6 style="text-align: center;">Need Help? We are Just a click Away <a href="../home/contact/contact.php">contact us</a></h6>
      </div>     
      <div class="right">
        <h1 class="right-heading" >Login To Dashboard</h1>
        <form method="post">
          <div class="form-group">
            <input type="email" class="form-control" name="email" id="EMAIL" aria-describedby="emailHelp" placeholder="Email or Mobile Number">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="pwd" placeholder="Password">
            <div id="input" class="red"><?php echo $g ?></div>
          </div>
          <!-- <a href="../dashboard/dashboard.php?id="<?php //if(isset($_SESSION['IS_LOGIN'])){ //echo $userid; }?>><label class="badge bg-danger cursor" >Delete</label></a> -->
        <button type="submit" name="btn" class="btn" style="background-color: #e1b92f;">Log in</button>
      </form>
      <hr class="hr-right">
      <a href="<?php echo $client->createAuthUrl(); ?>"><button type="submit" class="btn btn-light "> <img class="img-right" src="./images/Google.png" alt="">      Sign in with Google</button></a>
     </div>      
       
    </div>
  <script src="./signin.js"></script>
  </body>
</html>