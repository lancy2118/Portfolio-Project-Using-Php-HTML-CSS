<?php
if($_GET['userCheck']!='lancy2118'){
    echo '<script type="text/javascript">'; 
  echo 'window.location.href = "home.php";';
  echo '</script>'; 
}
?>
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
            
            $sql = "SELECT name,tagLine FROM personalinfo";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $name= $row["name"];
                    $tagLine=$row["tagLine"];
            } 
        }
        $err='';
        if(isset($_POST["submit"])){ 
  
    if(!empty($_POST['tagLine']) && !empty($_POST['user'])) { 
    $userUpdate=$_POST['user'];  
    $tagLineUpdate=$_POST['tagLine'];
    $sql="UPDATE personalinfo SET name='".$userUpdate."',tagLine='".$tagLineUpdate."' WHERE name='".$name."'"; 
  
    if ($conn->query($sql) === TRUE) { 
    echo '<script type="text/javascript">'; 
  echo 'alert("Updated Home screen successfully");'; 
  echo 'window.location.href = "homeForm.php";';
  echo '</script>'; 
    } else {  
     echo '<script type="text/javascript">'; 
  echo 'alert("Failure");'; 
  echo 'window.location.href = "homeForm.php";';
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
        <h5 class='check-in'>Edit Home Page</h5>
        <form action="" method="POST">
          <label for="email">Name</label>
          <input type="text" id="user" name="user" value='<?php echo $name ;?>' class='signText' required>
          <label for="user">Tag Line</label>
          <input type="text" id="tagLine" name="tagLine" value='<?php echo $tagLine ;?>' class='signText' required>
          <p><?php echo $err;?></p>
          <input type="submit" value="Cancel" class='cancel' name='Cancel' onclick="window.location.reload(true);">
          <input type="submit" value="Edit" class='save' name='submit'>
        </form>
      </div>
            </section>
        </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript" src='resources/js/script.js'></script>
    </body>
</html>