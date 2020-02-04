<?php
   $servername = "localhost";
                $username = "xxxxxxx";
                $password = "xxxxxxx";
                $dbname = "mariadev_portfolio";


            // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
   session_start();
   
   $user_check = $_SESSION['sess_user'];
   $sql = "SELECT userName FROM users where userName='$user_check'";
   $result = $conn->query($sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   
   $login_session = $row['userName'];
   
   if(!isset($_SESSION['sess_user'])){
      header("location:home.php");
      die();
   }
?>