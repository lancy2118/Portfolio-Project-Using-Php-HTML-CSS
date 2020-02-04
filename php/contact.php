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
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src='resources/js/formValidation.js'></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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
            
            $sql = "SELECT Address,phoneNo,email FROM personalinfo";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $address=$row["Address"];
                    $phoneNo=$row["phoneNo"];
                    $email=$row["email"];
            } 
        }
        $nameErr='';
        $emailErr='';
        $err='';
        $subErr='';
        $msgErr='';
        if(isset($_POST["submit"])){ 
  
   if(!empty($_POST['name']) && !empty($_POST['emailId']) && !empty($_POST['message']) && !empty($_POST['subject'])) { 
    $name=$_POST['name'];  
    $subject=$_POST['subject'];
    $emailId=$_POST['emailId'];  
    $message=$_POST['message'];
    $namelen = strlen($name);
    $subjectlen = strlen($subject);
    $messagelen = strlen($message);
    if (!preg_match("/^[a-zA-Z\s]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
    else if($namelen < 5 || $namelen>25){
        $nameErr="Name should be 5 to 25 characters";
    }
    else if($subjectlen < 5 || $subjectlen>50){
        $subErr="Subject should be 5 to 50 characters";
    }
    else if($messagelen < 5 || $messagelen>100){
        $msgErr="Subject should be 5 to 50 characters";
    }
    else if(!filter_var($emailId, FILTER_VALIDATE_EMAIL)){
      $emailErr = "Invalid email format.Format xyz@xyz.com";
    }
    
    else{
        $sql="INSERT INTO contact (senderName,email,subject,message)
VALUES ('".$name."', '".$email."','".$subject."','".$message."')"; 
  
    if ($conn->query($sql) === TRUE) { 
    echo '<script type="text/javascript">'; 
  echo 'alert("Contact submitted Successfully");'; 
  echo "parent.self.location='https://mariadevadoss.uta.cloud/php/home.php';"; 
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
        <!-- <div id="myModal" class="modal">

          <div class="modal-content">
            <span class="close">&times;</span> -->
            <!-- <section class='about-contact'> -->
        <div class='contact-info'>
            <h3 class='contact-heading'>Contact Me</h3>
            <div class="half left cf">
               <!--  <div class="container"> -->
                    <h5>Feel free to contact me</h5>
                    <form action="" method="POST" onSubmit="return formValidation();">
                        <div class="input-icon-wrap">
                          <span class="input-icon"><span class="fa fa-user-circle"></span></span>
                          <input type="text" class="input-with-icon" name='name' id='name'
                          placeholder='Name' required 
                          pattern="[A-Za-z\s]{5,25}" title='Only letters of length 5 to 25.No space allowed'>
                          
                        </div>
                        <p><?php echo $nameErr;?></p>
                          <p id="p1"></p>
                          <p id="p2"></p>
                        <div class="input-icon-wrap">
                          <span class="input-icon"><span class="fa fa-file"></span></span>
                          <input type="text" class="input-with-icon" id="subject" name='subject' placeholder='Subject'
                          pattern=".{5,}" title="Subject of 5 to 50 characters" maxlength="50" required>
                          
                        </div>
                        <p id="p4"></p>
                        <p><?php echo $subErr;?></p>
                        <div class="input-icon-wrap">
                          <span class="input-icon"><span class="fa fa-envelope"></span></span>
                          <input type="email" class="input-with-icon" id="emailId" name='emailId' placeholder='E-mail'
                           required title="Match format like xyz@xyz.com">
                         
                        </div>
                        <p id="p3"></p>
                         <p><?php echo $emailErr;?></p>

                            <textarea id="message" name="message" placeholder="Your Message" pattern=".{5,}" 
                            title="Subject of 5 to 100 characters" maxlength="100" required></textarea>
                            <p id="p5"></p>
                            <p><?php echo $msgErr;?></p>
                            <p><?php echo $err;?></p>

                        <input type="submit"  value="Send" class='send' name='submit'>
                  </form>
                <!-- </div> -->
            </div>
            <div class="half right cf">
                <h5>Address</h5>
                <p><?php echo $address ;?></p>
                <div class='break-line'></div>
                <h5>Phone</h5>
                <p><?php echo $phoneNo ;?></p>
                <div class='break-line'></div>
                <h5>Email</h5>
                <div><?php echo $email ;?></div>
            </div>
        </div>
         <script type="text/javascript" src='resources/js/formValidation.js'></script>
	</body>

</html>