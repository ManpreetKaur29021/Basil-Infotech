<?php
include 'sendmail.php';
//session_start();
include("../../signup/function.php");

require("../../signup/server.php");

if (isset($_POST["submit"])) {
    $username = $_POST["name"];
    $email = $_POST["email"];
    $cno=$_POST["number"];
    $msg = $_POST["msg"];
    // echo $msg;
    // echo $email;

    //$con = mysqli_connect("localhost", "root", "", "b-pay");

    if($con->connect_error){
        die("Connection Failed: " . $con->connect_error);
    }
    $sql = "INSERT INTO contact(name,email,cno,msg) VALUES ('$username', '$email','$cno', '$msg')";
    
    if(mysqli_query($con, $sql)){
      //  echo "Success";
    }
    else{
        echo "Error";
    }
    mysqli_close($con);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="contact.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans&family=Montserrat:wght@100&family=Sunflower:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title>CONTACT</title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a href="../../index.html" class="navbar-brand">B-Pay</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
            <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="../payment/PayPage.html" class="nav-link">Payments</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Industries</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Resources</a>
                </li>
                <li class="nav-item">
                    <a href="./contact.php" class="nav-link">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="../../signup/signup.php" class="nav-link">Sign up</a>
                </li>
            </ul>
        </div>
    </nav>

    <?php echo $alert; ?>
    <div class="row">
        <div class="offset-1 col-12 col-sm-5">

            <div class="container">
                <p>If You Have Any Questions don't Hesitate To Contact Us </br>
                    Have a Good Day
                </P>
                <div class="row row-content">
                    <div class="col-12 col-md-12">
                        <form class="contact" method="POST">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="Name" name="name" placeholder="Full Name">
                                    </br>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input type="email" class="form-control" id="Email" name="email" placeholder="Email">
                                    </br>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input class="form-control" id="Phone" name="number" placeholder="Contact Number">
                                    </br>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea name="msg" class="form-control" id="Message"  rows="8" placeholder="Message"></textarea>
                                    </br>
                                </div>
                            </div>
                           
                            <input type="submit" name="submit" class="btn btn-secondary btn-lg send-btn" value="Send">
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="offset-1 col-12 col-sm-5">
            <div class="aside">
                <div>
                    <h3>Because,we're here to help</h3>
                    <p>Write down your hopes for the future of your company.<br>
                        Don't forget to thank the company for the opportunity and <br> convince related parties to
                        support your company</p>
                </div>
                <i class="material-icons">room</i>
                <h4>Address</h4>
                <p>Anywhere</p>
                </br>
                <i class="material-icons">phone</i>
                <h4>Telephone</h4>
                <p>999992257</p>
                <br>

                <i class="material-icons">email</i>
                <h4>Email</h4>
                <p>ram@gmail.com</p>
                <br>
            </div>
        </div>
    </div>
    </div>
    <footer class="page-footer font-small blue">
        <div class="footer-copyright text-center py-3"> &copy 2022 Copyright :
            <a href="home.html">Powered by B-PAY</a>
        </div>
    </footer>
    <script type="text/javascript">
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>