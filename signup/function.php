<?php
    require("server.php"); //C:/xampp/htdocs/new_project/signup/
    function redirect($link){
        ?>
        <script> window.location.href="<?php echo $link?>";
        </script>
     <?php
     die();   
    }
    function prx($arr){
        echo '<pre>';
        print_r($arr);
        die();
    }
    function get_safe_real($str){
        global $con;
        $str=mysqli_real_escape_string($con,$str);
        //echo $str;
        return $str;
    }
?>