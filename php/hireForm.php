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
            
            $sql = "SELECT rate,role,services FROM hireme";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $allRows[] = $row;
            } 
        }
        $err='';
        if(isset($_POST["submit"])){ 
  
    if(!empty($_POST['rate']) && !empty($_POST['role'])&&!empty($_POST['services'])) { 
    $roleUpdate=$_POST['role'];  
    $rateUpdate=$_POST['rate'];
    $servicesUpdate=$_POST['services'];  
    $roleNameId=$_POST['roleId'];

    $sql="UPDATE hireme SET role='".$roleUpdate."',rate='".$rateUpdate."',services='".$servicesUpdate."' 
    WHERE role='".$roleNameId."'"; 
  
    if ($conn->query($sql) === TRUE) { 
    echo '<script type="text/javascript">'; 
  echo 'alert("Updated role screen successfully");'; 
  echo 'window.location.href = "hireForm.php";';
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
if(isset($_POST["delete"])){ 
  
    $roleNameId=$_POST['roleId'];

    $sql="DELETE FROM hireme WHERE role='".$roleNameId."'"; 
  
    if ($conn->query($sql) === TRUE) { 
    echo '<script type="text/javascript">'; 
  echo 'alert("Deleted successfully");'; 
  echo 'window.location.href = "hireForm.php";';
  echo '</script>'; 
    } else {  
     echo '<script type="text/javascript">'; 
  echo 'alert("Failure");'; 
  // echo 'window.location.href = "aboutForm.php";';
  echo '</script>';   
    }
  }
  
            $conn->close();
            ?>   
        <section class="wrapper">
            <section class='about-content'>
              <div class='contact-info'>
        <h5 class='check-in'>Edit Hire Me</h5>
        <?php foreach($allRows as $row): ?>
        <form action="" method='POST'>
          <input type='hidden' name='roleId' value='<?php echo $row['role'] ;?>'>
          <label for="role">Role</label>
          <input type="text" id="role" name="role" class='signText' value='<?php echo $row['role'] ;?>' required>
          <label for="rate">Rate</label>
          <input type="text" id="rate" name="rate" class='signText' value='<?php echo $row['rate'] ;?>' required>
          <label for="services">Services</label>
          <input type="text" id="services" name="services" class='signText' value='<?php echo $row['services'] ;?>' required>
          <p><?php echo $err;?></p>
          <input type="submit" value="Update" class='save' name='submit'>
          <input type="button" value="Add Another" class='saveDelete' onclick="window.location='https://mariadevadoss.uta.cloud/php/addHireMe.php';">
          <input type="submit" value="Delete" class='saveDelete' name='delete'>
          <input type="submit" value="Cancel" class='cancel' onclick="window.location.reload(true);">

        </form>
        <?php endforeach; ?>
      </div>
            </section>
        </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript" src='resources/js/script.js'></script>
    </body>
</html>