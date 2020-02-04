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
            
            $sql = "SELECT age,intro,Address,lang,phoneNo,email,name FROM personalinfo";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $age= $row["age"];
                    $address=$row["Address"];
                    $lang=$row["lang"];
                    $phoneNo=$row["phoneNo"];
                    $email=$row["email"];
                    $intro=$row["intro"];
                    $name=$row['name'];
            } 
        }
        $err='';
        if(isset($_POST["submit"])){ 
  
    if(!empty($_POST['age']) && !empty($_POST['address'])&&!empty($_POST['lang']) && !empty($_POST['intro'])
      &&!empty($_POST['email']) && !empty($_POST['phone'])) { 
    $ageUpdate=$_POST['age'];  
    $addressUpdate=$_POST['address'];
    $emailUpdate=$_POST['email'];  
    $phoneUpdate=$_POST['phone'];
    $langUpdate=$_POST['lang'];  
    $introUpdate=$_POST['intro'];

    $sql="UPDATE personalinfo SET age='".$ageUpdate."',Address='".$addressUpdate."',lang='".$langUpdate."',
    intro='".$introUpdate."',email='".$emailUpdate."',phoneNo='".$phoneUpdate."' 
    WHERE name='".$name."'"; 
  
    if ($conn->query($sql) === TRUE) { 
    echo '<script type="text/javascript">'; 
  echo 'alert("Updated About screen successfully");'; 
  echo 'window.location.href = "aboutForm.php";';
  echo '</script>'; 
    } else {  
     echo '<script type="text/javascript">'; 
  echo 'alert("Failure");'; 
  // echo 'window.location.href = "aboutForm.php";';
  echo '</script>';   
    }
  }
 else {  
    $err="All fields are required!";  
}  

}
  
            $conn->close();
            ?>    
    <body>
         <header class='sticky-header'>
            <nav class="sticky">
                <div class="row">
                    <a class='nameInfo-sticky'href='homeForm.php'>Maria Devadoss</a>
                    <ul class="main-nav-sticky js--main-nav">
                        <li><a href="aboutForm.php">About</a></li>
                        <li><a href="skillForm.php">Skills</a></li>
                        <li><a href="portfolioForm.php">Portfolio</a></li>
                        <li><a href="experienceForm.php">Experience</a></li>
                        <li><a href="educationForm.php">Education</a></li>
                        <li><a href="referenceForm.php">References</a></li>
                        <li><a href="hireForm.php">Hire Me</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                    <a class="mobile-nav-icon js--nav-icon"><i class="fa fa-times" aria-hidden="true"></i></a>
                </div>
            </nav>
        </header>
        <section class="wrapper">
            <section class='about-content'>
              <div class='contact-info'>
        <h5 class='check-in'>About Edit</h5>
        <form action="" method="POST">
          <!-- <label for="fname">About Me</label> -->
          <!-- <textarea  id="fname" name="firstname" class='signText'> -->
            <label for="intro">About Me</label>
             <textarea id="intro" name="intro" class="signText" required><?php echo $intro ;?></textarea>
          <label for="age">Age:</label>
          <input type="text" id="age" name="age" class='signText' value="<?php echo $age ;?>" required>

          <label for="email">Email</label>
          <input type="email" id="email" name="email" class='signText' value='<?php echo $email ;?>' required>
          <label for="phone">Phone</label>
          <input type="tel" id="phone" name="phone" class='signText' value='<?php echo $phoneNo ;?>' pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
       required title='123-456-7890'>
          <label for="address">Address</label>
          <input type="text" id="address" name="address" class='signText' value='<?php echo $address ;?>' required>
          <label for="lang">Language</label>
          <input type="text" id="lang" name="lang" class='signText' value='<?php echo $lang ;?>'>
          <p><?php echo $err;?></p>
          <input type="submit" value="Cancel" class='cancel' onclick="window.location.reload(true);">
          <input type="submit" value="Save" class='save' name='submit'>
        </form>
      </div>
            </section>
        </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript" src='resources/js/script.js'></script>
    </body>
</html>