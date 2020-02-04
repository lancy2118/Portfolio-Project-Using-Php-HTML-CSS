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
                    <a class='nameInfo' href="home.php">Maria Devadoss</a>
                    <ul class="main-nav js--main-nav">
                        <li><a href="about.php">About</a></li>
                        <li><a href="skills.php">Skills</a></li>
                        <li><a href="portfolio.php">Portfolio</a></li>
                        <li><a href="experience.php">Experience</a></li>
                        <li><a href="education.php">Education</a></li>
                        <li><a href="testimonial.php">References</a></li>
                        <li><a href="http://mariadevadoss.uta.cloud/blog/" target="_blank">Blog</a></li>
                        <li><a href="hireMe.php">Hire Me</a></li>
                        <li><a href="#" id='myBtn'>Contact</a></li>
                        <li><a href="#" id='myBtn3'>Login</a></li>
                        <li><a href="#" id='myBtn2'>Sign up</a></li>
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
            
            $sql = "SELECT age,Address,email,lang,intro,phoneNo FROM personalinfo";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $intro= $row["intro"];
                    $address=$row["Address"];
                    $age=$row["age"];
                    $email=$row["email"];
                    $phoneNo=$row["phoneNo"];
                    $lang=$row["lang"];
            } 
        }
            $conn->close();
            ?>    
        <section class="wrapper">
            <section class='about-content'>
                <div class="col span-1-of-2 box">
                    <h4 class='basic-fonts'>About</h4>
                    <br>
                    <p><?php echo nl2br(htmlspecialchars($intro)); ?></p>
                </div>
                <div class="col span-1-of-2 box">
                    <h4 class='basic-font-info'>Basic Information</h4>
                    <table>
                        <tr>
                            <th>AGE:</th>
                            <td><?php echo $age; ?></td>
                        </tr>
                         <tr>
                            <th>EMAIL:</th>
                            <td><?php echo $email; ?></td>
                        </tr>
                         <tr>
                            <th>PHONE:</th>
                            <td><?php echo $phoneNo; ?></td>
                        </tr>
                         <tr>
                            <th>ADDRESS:</th>
                            <td><?php echo $address; ?></td>
                        </tr>
                         <tr>
                            <th>LANGUAGE:</th>
                            <td><?php echo $lang; ?></td>
                        </tr>
                    </table>
                </div>
            </section>
        </section>
        <div id="myModal" class="modal">

          <div class="modal-content">
            <span class="close3"></span>
            <iframe src='contact.php' class='contact-iframe 'scrolling='no'></iframe>
          </div>

        </div>
        <div id="myModal2" class="modal2">

          <div class="modal-content">
            <span class="close2"> </span>
            <iframe src='signup.php' class='signup-iframe 'scrolling='no'></iframe>
          </div>
        </div>
        <div id="myModal3" class="modal3">

          <div class="modal-content">
            <span class="close4"> </span>
            <iframe src='login.php' class='login-iframe 'scrolling='no'></iframe>
          </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript" src='resources/js/script.js'></script>
        <footer>
            <div class='footer-pages'>
                <a href="#" class="fa fa-facebook" id='foot-icon'></a>
                <a href="#" class="fa fa-twitter" id='foot-icon'></a>
                <a href="#" class="fa fa-google-plus" id='foot-icon'></a>
                <a href="#" class="fa fa-instagram" id='foot-icon'></a>
                <p class='author-name'>Maria Lancy Devadoss</p>
                <div class='copyright-content'>
                    <p>&copy; Maria D Lancy CV. All rights reserved.</p>
                    <p> Design- DiazApps</p>
            </div>
        </footer>
    </body>
</html>