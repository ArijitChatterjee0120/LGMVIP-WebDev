<!doctype html>
<html lang="en">
<?php
	// Initialize session
	session_start();

	if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
		header('location: login.php');
		exit;
	}
?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Student Result Management System</title>

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-starter.css">
  <!-- web fonts -->
  <link href="//fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
  <!-- /web fonts -->
</head>
<body>
    <header class="w3l-header">
        <div class="hero-header-11">
          <div class="hero-header-11-content">
            <div class="container">
              <nav class="navbar navbar-expand-xl navbar-light py-sm-2 py-1 px-0">
                <a class="navbar-brand editContent" href="index.html">ONLINE TEACHER PORTAL</a>
               
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon fa fa-bars"></span>
                </button>
    
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="about.html">About Us</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="teacher.php">Teacher Log In</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="student.html">Student Log In</a>
                    </li>
                    <li class="nav-item">	<section class="container wrapper">
			<div class="page-header">
				<h5 class="display-5">WELCOME RESPECTED  <?php echo $_SESSION['username']; ?></h5>
			</div>
			</section></li>
      
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </header>
      
                <br><section class="w3l-contact py-5" id="contact">
        <div class="container py-lg-3">
          <h3 class="global-title">RESPECTED TEACHERS, PLEASE FILL UP THE MARKS OF THE STUDENT ALONG WITH HIS OR HER DETAILS</h3>
          <div class="row">
            <div class="col-md-8 contact-form">
              <form action="" method="post">
                <b><h3>Name:  </h3>  </b> <input type="text" class="form-control" name="name" placeholder="Name" />
                <br>
                
                    


                <b><h3>Enrollment Number: </h3>  </b><input type="number" class="form-control" name="rno" placeholder="Enrollment number">
                <br> 
                <b><h3>Email ID :</h3>  </b> <input type="email" class="form-control" name="email" placeholder="E-mail" />
                <br>

                <b><h3>Subject 1: </h3>  </b><input type="number" class="form-control" name="p1" placeholder="Subject1 Marks">
                <br> 

                <b><h3>Subject 2: </h3>  </b><input type="number" class="form-control" name="p2" placeholder="Subject2 Marks">
                <br> 

                <b><h3>Subject 3: </h3>  </b><input type="number" class="form-control" name="p3" placeholder="Subject3 Marks">
                <br>

                <b><h3>Subject 4: </h3>  </b><input type="number" class="form-control" name="p4" placeholder="Subject4 Marks">
                <br> 

                <b><h3>Subject 5: </h3>  </b><input type="number" class="form-control" name="p5" placeholder="OPTIONAL SUBJECT">
                <br> 

                
                <button class="btn btn-primary theme-button" type="submit">Send</button>
              
                <?php
                require_once('config/config.php');
                if(isset($_POST['rno'],$_POST['p1'],$_POST['p2'],$_POST['p3'],$_POST['p4'],$_POST['p5']))
                {
                    $rno=$_POST['rno'];
                    $name = $_POST['name'];
                    if(!isset($_POST['email']))
                        $email=null;
                    else
                        $email=$_POST['email'];
                    $p1=(int)$_POST['p1'];
                    $p2=(int)$_POST['p2'];
                    $p3=(int)$_POST['p3'];
                    $p4=(int)$_POST['p4'];
                    $p5=(int)$_POST['p5'];
            
                    $marks=$p1+$p2+$p3+$p4+$p5;
                    $percentage=$marks/5;
            
                    // validation
                    if (empty($email) or empty($rno) or $p1>100 or  $p2>100 or $p3>100 or $p4>100 or $p5>100 or $p1<0 or  $p2<0 or $p3<0 or $p4<0 or $p5<0 ) {
                        if(empty($email))
                            echo '<p class="error">Please Enter the email id</p>';
                        if(empty($rno))
                            echo '<p class="error">Please enter roll number</p>';
                        if(preg_match("/[a-z]/i",$rno))
                            echo '<p class="error">Please enter valid roll number</p>';
                        if(preg_match("/[a-z]/i",$marks))
                            echo '<p class="error">Please enter valid marks</p>';
                        if($p1>100 or  $p2>100 or $p3>100 or $p4>100 or $p5>100 or $p1<0 or  $p2<0 or $p3<0 or $p4<0 or $p5<0)
                            echo '<p class="error">Please enter valid marks</p>';
                        exit();
                    }
            
                   
                    $sql="INSERT INTO `stud` (`name`, `rno`, `email`, `p1`, `p2`, `p3`, `p4`, `p5`, `marks`, `percentage`) VALUES ('$name', '$rno', '$email', '$p1', '$p2', '$p3', '$p4', '$p5', '$marks', '$percentage')";
                    $sql=mysqli_query($conn,$sql);
            
                    if (!$sql) {
                        echo '<script language="javascript">';
                        echo 'alert("Invalid Details")';
                        echo '</script>';
                    }
                    else{
                        echo '<script language="javascript">';
                        echo 'alert("Successful")';
                        echo '</script>';
                    }
                }
            ?>
            
              
              
              
              </form>
              <div class="container"  style="padding-top:10px">
              <a href="logout.php" class="btn btn-block btn-outline-danger">SIGN OUT</a>
              </div>
            </div>
            
          </div>
        </div>
      </section>
    
      <footer class="w3l-footer">
        <div id="footers14-block" class="py-3">
          <div class="container">
            <div class="footers14-bottom text-center">
              <div class="copyright mt-1">
                <p>© 2021 All Rights Reserved | Design by ARIJIT CHATTERJEE</p>
              </div>
            </div>
          </div>
        </div>
        <!-- move top -->
        <button onclick="topFunction()" id="movetop" title="Go to top">
          <span class="fa fa-angle-up" aria-hidden="true"></span>
        </button>
        <script>
          // When the user scrolls down 20px from the top of the document, show the button
          window.onscroll = function () {
            scrollFunction()
          };
    
          function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
              document.getElementById("movetop").style.display = "block";
            } else {
              document.getElementById("movetop").style.display = "none";
            }
          }
    
          // When the user clicks on the button, scroll to the top of the document
          function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
          }
        </script>
        <!-- /move top -->
    
      </footer>
      <!-- Footer -->
    
      <!-- jQuery and Bootstrap JS -->
      <script src="assets/js/jquery-3.4.1.slim.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
    
      <!-- Template JavaScript -->
      <script src="assets/js/jquery.magnific-popup.min.js"></script>
      <script>
        $(document).ready(function () {
          $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',
    
            fixedContentPos: false,
            fixedBgPos: true,
    
            overflowY: 'auto',
    
            closeBtnInside: true,
            preloader: false,
    
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
          });
    
          $('.popup-with-move-anim').magnificPopup({
            type: 'inline',
    
            fixedContentPos: false,
            fixedBgPos: true,
    
            overflowY: 'auto',
    
            closeBtnInside: true,
            preloader: false,
    
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-slide-bottom'
          });
        });
      </script>
    
      <!-- disable body scroll which navbar is in active -->
      <script>
        $(function () {
          $('.navbar-toggler').click(function () {
            $('body').toggleClass('noscroll');
          })
        });
      </script>
      <!-- disable body scroll which navbar is in active -->
    
    
      <script src="assets/js/smartphoto.js"></script>
      <script>
        document.addEventListener('DOMContentLoaded', function () {
          const sm = new SmartPhoto(".js-img-viwer", {
            showAnimation: false
          });
          // sm.destroy();
        });
      </script>
    
    
    </body>
    
    </html>