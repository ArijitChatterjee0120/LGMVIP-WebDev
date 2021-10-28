<!doctype html>
<html lang="en">

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
  <!-- header -->
  <header class="w3l-header">
    <div class="hero-header-11">
      <div class="hero-header-11-content">
        <div class="container">
          <nav class="navbar navbar-expand-xl navbar-light py-sm-2 py-1 px-0">
            <a class="navbar-brand editContent" href="student.html">WELCOME TO STUDENT MARKS PORTAL </a>
           
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon fa fa-bars"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
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
  
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <section class="w3l-contact py-5" id="contact">
        <div class="container col-lg-12 col-md-6 py-lg-3">
          <h3 class="global-title">Welcome Dear Student. Please See Your Marks.</h3>
          <div class="row">
            <div class="col-md-8 contact-form">
              <form action="marks.php" method="post">
                <b><h3>Enrollment No.:  </h3>  </b> <input type="text" class="form-control" name="enrno" placeholder="Enrolment No" />
                <br>
                </form>
                </div>
                </div>
                </div>
                </section>

                <center>
<?php
require_once 'config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //$s = $_POST['LOCATIONS'];
    
    $loc = filter_var($_POST['enrno'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
    $query = "SELECT * FROM stud where rno = '". $loc ."'";
    
    
    if ($result = $conn->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["name"];
            $field2name = $row["rno"];
            $field3name = $row["marks"];
            $field4name = $row["percentage"];
            $field5name = $row["p1"];
            $field6name = $row["p2"];
            $field7name = $row["p3"];
            $field8name = $row["p4"];
            $field9name = $row["p5"];
            
    
          
            echo "<table border='5'>";
            echo "
                <tr>
                <th>Name </th>
                <th>Enrolment No</th>
                <th>Subject 1</th>
                <th>Subject 2</th>
                <th>Subject 3</th>
                <th>Subject 4</th>
                <th>Subject 5</th>
                <th>Marks</th>   
                <th>Percentage</th>
                

                </tr>";

            echo "<tr>";
    
            echo "<td>" . $field1name . "</td>";
          
            echo "<td>" .$field2name. "</td>";
            
            echo "<td>" .$field5name. "</td>";
            echo "<td>" .$field6name. "</td>";
            echo "<td>" .$field7name. "</td>";
            echo "<td>" .$field8name. "</td>";
            echo "<td>" .$field9name. "</td>";
            echo "<td>" .$field3name. "</td>";
            echo "<td>" .$field4name. "</td>";
            
    
            echo "</tr>";
            echo "</table>";
            
        }    
        $result->free();
    }
}
?>
</center>





                
                </body>
                </html>