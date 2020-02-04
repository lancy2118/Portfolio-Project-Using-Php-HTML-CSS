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
        <script type="text/javascript" src='resources/js/logInValidation.js'></script>
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
            
        $nameErr='';
        $unameErr='';
        $emailErr='';
        $err='';
        $lnameErr='';
        $pwdErr='';
        $rpwdErr='';
        if(isset($_POST["submit"])){ 
  
   if(!empty($_POST['fname']) && !empty($_POST['emailId']) && !empty($_POST['lname']) && !empty($_POST['user'])
    && !empty($_POST['pwd']) && !empty($_POST['rpwd'])) { 
    $name=$_POST['fname'];  
    $lname=$_POST['lname'];
    $emailId=$_POST['emailId'];  
    $user=$_POST['user'];
    $pwd=$_POST['pwd'];
    $rpwd=$_POST['rpwd'];
    $namelen = strlen($name);
    $userlen = strlen($user);
    $lnamelen = strlen($lname);
    if (!preg_match("/^[a-zA-Z\s]*$/",$name)) {
      $nameErr = "Only letters allowed";
    }
    else if (!preg_match("/^[a-zA-Z]*$/",$lname)) {
      $lnameErr = "Only letters allowed";
    }
    else if (!preg_match("/^[0-9a-zA-Z]*$/",$user)) {
      $unameErr = "Only letters allowed";
    }
    else if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,8}$/",$pwd)) {
      $pwdErr = "pwd between 4 to 8 chars containing at least 1 numeric digit,1 uppercase and 1 lowercase letter";
    }
    else if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,8}$/",$rpwd)) {
      $rpwdErr = "pwd between 4 to 8 chars containing at least 1 numeric digit,1 uppercase and 1 lowercase letter";
    }
    else if ($pwd!=$rpwd) {
      $err = "Password does not match";
    }

    else if($namelen < 5 || $namelen>25){
        $nameErr="Name should be 5 to 25 characters";
    }
    else if($userlen < 5 || $userlen>10){
        $unameErr="Lname should be 5 to 10 characters";
    }
    else if($lnamelen < 5 || $messagelen>15){
        $lnameErr="last name should be 5 to 15 characters";
    }
    else if(!filter_var($emailId, FILTER_VALIDATE_EMAIL)){
      $emailErr = "Invalid email format.Format xyz@xyz.com";
    }
    
    else{
        $sql="INSERT INTO users (firstName,lastName,email,userName,pwd,roleId)
VALUES ('".$name."', '".$lname."', '".$emailId."','".$user."','".$pwd."',1)"; 
  
    if ($conn->query($sql) === TRUE) { 
    echo '<script type="text/javascript">'; 
  echo 'alert("SignUp Successfully");'; 
  echo "parent.self.location='https://mariadevadoss.uta.cloud/php/homeForm.php';"; 
  echo '</script>'; 
    } else {  
     echo '<script type="text/javascript">'; 
  echo 'alert("Failure");'; 
  // echo 'window.location.href = "aboutForm.php";';
  echo '</script>';   
    }

    }
    
  }
 else {  
    $err="All fields are required!";  
}  

}
  
        $conn->close();
            ?>
    <body>
      <div class='contact-info'>
        <h5 class='check-in'> Check in</h5>
        <form action="" method="POST" onSubmit="return formValidationSignUp();">
          <label for="fname">Name</label>
          <input type="text" id="fname" name="fname" class='signText' required 
                          pattern="[A-Za-z\s]{5,25}" title='Only letters of length 5 to 25.'>
          <p id="p1"></p>
          <p id="p2"></p>
          <p><?php echo $nameErr;?></p>
          <label for="lname">Last Name</label>
          <input type="text" id="lname" name="lname" class='signText'  required 
                          pattern="[A-Za-z]{5,25}" title='Only letters of length 5 to 15.No space allowed'>
          <p id="p9"></p>
          <p id="p4"></p>
          <p><?php echo $lnameErr;?></p>
          <label for="email">Email</label>
          <input type="email" class='signText' id="emailId" name='emailId' placeholder='E-mail'
                           required title="Match format like xyz@xyz.com">
          <p id="p3"></p>
          <p><?php echo $emailErr;?></p>
          <label for="user">User</label>
          <input type="text" id="user" name="user" class='signText' required pattern="[0-9a-zA-Z]{5,10}" title='Only letters and numbers of length 5 to 10.'>
          <p id="p6"></p>
          <p id="p5"></p>
          <p><?php echo $unameErr;?></p>
          <label for="pwd">Password</label>
          <input type="password" id="pwd" name="pwd" class='signText' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,8}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
          <p id="p7"></p>
          <p><?php echo $pwdErr;?></p>
          <label for="rpwd">Repeat Password</label>
          <input type="password" id="rpwd" name="rpwd" class='signText' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,8}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
          <p id="p7"></p>
          <p id="p8"></p>
          <p><?php echo $rpwdErr;?></p>
          <p><?php echo $err;?></p>
          <input type="submit" value="Save" class='save' name='submit'>
        </form>
      </div>
      <script type="text/javascript" src='resources/js/logInValidation.js'></script>
    </body>
</html>