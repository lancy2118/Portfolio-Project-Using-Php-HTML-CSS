<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" type="text/css" href="resources/css/style.css">
        <link rel="stylesheet" type="text/css" href="resources/css/ionicons.min.css">
        <link rel="stylesheet" type="text/css" href="resources/css/normalize.css">
        <link rel="stylesheet" type="text/css" href="resources/css/grid.css">
        <link rel="stylesheet" type="text/css" href="resources/css/queries.css">
        <script type="text/javascript" src='resources/js/logInEnd.js'></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    </head>
    <?php
               $servername = "localhost";
                $username = "xxxxxxx";
                $password = "xxxxxxx";
                $dbname = "mariadev_portfolio";


            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

        $unameErr='';
        $err='';
        $pwdErr='';
            if(isset($_POST["submit"])){  
  
if(!empty($_POST['user']) && !empty($_POST['pwd'])) {  
    $user=$_POST['user'];  
    $pass=$_POST['pwd']; 
    $userlen = strlen($user);
    if (!preg_match("/^[0-9a-zA-Z]*$/",$user)) {
      $unameErr = "Only letters allowed";
    }
    else if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,8}$/",$pass)) {
      $pwdErr = "pwd between 4 to 8 chars containing at least 1 numeric digit,1 uppercase and 1 lowercase letter";
    }
    else if($userlen < 5 || $userlen>10){
        $unameErr="Lname should be 5 to 10 characters";
    }
    else{
    $query=mysqli_query($conn,"SELECT * FROM users WHERE userName='".$user."' AND pwd='".$pass."' AND roleId=2" );  
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($query))  
    {  
    $dbusername=$row['userName'];  
    $dbpassword=$row['pwd'];  
    }  
  
    if($user == $dbusername && $pass == $dbpassword)  
    {    
  
    /* Redirect browser */  
    // header("Location: http://localhost/php/homeForm.php"); 
    // exit();
    echo "<script>parent.self.location='https://mariadevadoss.uta.cloud/php/homeForm.php?userCheck=$user';</script>"; 
    }  
    } else {  
    echo "Invalid username or password!/Not Authorized";  
    }  
  }
} else {  
    $err="All fields are required!";  
}  
}  
            $conn->close();
            ?> 
    <body>
      <div class='contact-info'>
        <h5 class='check-in'>Log in</h5>
        <form action="" method="POST" onSubmit="return formValidationLogIn();">
          <label for="user">User</label>
          <input type="text" id="user" name="user" class='signText' required pattern="[0-9a-zA-Z]{5,10}" title='Only letters and numbers of length 5 to 10.'>
          <p id="p6"></p>
          <p id="p5"></p>
          <p><?php echo $unameErr;?></p>
          <label for="pwd">Password</label>
          <input type="text" id="pwd" name="pwd" class='signText' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,8}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
          <p id="p7"></p>
          <p><?php echo $pwdErr;?></p>
          <p><?php echo $err;?></p>
          <input type="submit" value="Get in" class='save' name='submit'>
        </form>
      </div>
      <script type="text/javascript" src='resources/js/logInEnd.js'></script>
    </body>
</html>