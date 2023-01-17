<?php
session_start();
include("db.php");
if(!isset($_SESSION['student_id'])){
  header("location: ../index.php");
  exit;
}
$tid = $_SESSION['student_id'];
$sq = "SELECT * FROM `student` WHERE id='$tid'";
$result = mysqli_query($conn, $sq);
$data = $result->fetch_assoc();
if ($result) {
  $_SESSION['photo']=$data['image'];
  $name = $data['name'];
  $id = $data['id'];
  $cgpa = $data['cgpa'];
  $num = $data['number'];
  $department = $data['department'];
  $email = $data['email'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $searchteacher = $_POST["searchteacher"];
  $_SESSION['searchteacher']=$searchteacher;
  header("location: searchteacher.php");
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Student Profile Page Design</title>

    <meta name="author" content="Codeconvey" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet"><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>

    <!--Only for demo purpose - no need to add.-->
    <link rel="stylesheet" href="css/demo.css" />
    
	  <link rel="stylesheet" href="css/style.css">
    




    <!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

<!-- Nucleo Icons -->
<link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="./assets/css/nucleo-svg.css" rel="stylesheet" />

<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

<!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

<!-- CSS Files -->



<link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
</head>
<body  class="g-sidenav-show  bg-gray-100">



<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">

<div class="sidenav-header">
  <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
  <a class="navbar-brand m-0" href="s_profile.php" target="_blank">
    <img src="uploads/<?=$_SESSION['photo']?>" class="navbar-brand-img h-100" alt="main_logo">
    <span class="ms-1 font-weight-bold text-white"><?php echo $_SESSION['student_name']; ?></span>
  </a>
</div>


<hr class="horizontal light mt-0 mb-2">

<div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
  <ul class="navbar-nav">
     

<li class="nav-item">
<a class="nav-link text-white " href="s_home.php">
  
    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
      <i class="material-icons opacity-10">dashboard</i>
    </div>
  
  <span class="nav-link-text ms-1">Home</span>
</a>
</li>


<!-- <li class="nav-item">
<a class="nav-link text-white " href="counsilling.php">
  
    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
      <i class="material-icons opacity-10">table_view</i>
    </div>
  
  <span class="nav-link-text ms-1">COUNSELLING</span>
</a>
</li> -->

<!-- 
<li class="nav-item">
<a class="nav-link text-white " href="Coursemet.php">
  
    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
      <i class="material-icons opacity-10">receipt_long</i>
    </div>
  
  <span class="nav-link-text ms-1">PARTICIPATIONS</span>
</a>
</li> -->


<!-- <li class="nav-item">
<a class="nav-link text-white " href="./shortcourse/index.php">
  
    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
      <i class="material-icons opacity-10">table_view</i>
    </div>
  
  <span class="nav-link-text ms-1">Short Courses</span>
</a>
</li> -->

<li class="nav-item">
<a class="nav-link text-white " href="studentlogout.php">
  
    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
      <i class="material-icons opacity-10">view_in_ar</i>
    </div>
  
  <span class="nav-link-text ms-1">LOGOUT</span>
</a>
</li>



</aside>

    <main class="main-content border-radius-lg ">
      <!-- Navbar -->

<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
<div class="container-fluid py-1 px-3">
  <nav aria-label="breadcrumb">
    
    
    
    
  </nav>
  <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
    <div class="ms-md-auto pe-md-3 d-flex align-items-center">

    <form action="" method="POST" class="searchform order-lg-last">
      <div class="form-group d-flex">
        <input type="text" name="searchteacher"class="form-control pl-3" placeholder="Search">
        <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
      </div>
    </form>





   
 
    </div>
    
      <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
          <div class="sidenav-toggler-inner">
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
          </div>
        </a>
      </li>
      <li class="nav-item px-3 d-flex align-items-center">
        <a href="javascript:;" class="nav-link text-body p-0">
          <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
        </a>
      </li>
      

        
         
            
     
</div>
</nav>

<!-- End Navbar -->










		
<div class="ScriptTop">
    <div class="rt-container">
        <div class="col-rt-4" id="float-right">
 
            <!-- Ad Here -->
            
        </div>
        <div class="col-rt-2">
            <ul>
                <li> <?php echo"<a href='update_info.php?id=$id' target='_blank'><b>Update Information</a>" ?></li>
            </ul>
        </div>
    </div>
</div>

<header class="ScriptHeader">
    <div class="rt-container">
    	<div class="col-rt-12">
        	<div class="rt-heading">
            	<h1>Student Profile</h1>
                
            </div>
        </div>
    </div>
</header>

<section>
    <div class="rt-container">
          <div class="col-rt-12">
              <div class="Scriptcontent">
                
              
<!-- Student Profile -->
<div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            <img class="profile_img" src="uploads/<?=$_SESSION['photo']?>"height="120" width="100" alt="student dp">
            <h3><?php echo $name   ?></h3>
          </div>
          <div class="card-body">

            <p class="mb-0"><strong class="pr-1">Student ID:</strong><?php echo $id   ?></p>
            <p class="mb-0"><strong class="pr-1">Department:</strong><?php echo$department  ?></p>
            <p class="mb-0"><strong class="pr-1">Email:</strong><?php echo$email ?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
              <tr>
                <th width="30%">Name</th>
                <td width="2%">:</td>
                <td><?php echo $name   ?></td>
              </tr>
              <tr>
                <th width="30%">ID:	</th>
                <td width="2%">:</td>
                <td><?php echo $id   ?></td>
              </tr>
              <tr>
                <th width="30%">CGPA:</th>
                <td width="2%">:</td>
                <td><?php echo $cgpa   ?></td>
              </tr>
              <tr>
                <th width="30%">Mobile:</th>
                <td width="2%">:</td>
                <td><?php echo $num   ?></td>
              </tr>
              
            </table>
          </div>
        </div>
          <div style="height: 26px"></div>
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Other Information</h3>
          </div>
          <div class="card-body pt-0">
              <p><?php  strtolower($email)   ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- partial -->
           
    		</div>
		</div>
    </div>
</section>
     


    <!-- Analytics -->
    <footer class="footer py-4  ">
  <div class="container-fluid">
    <div class="row align-items-center justify-content-lg-between">
      <div class="col-lg-6 mb-lg-0 mb-4">
        <div class="copyright text-center text-sm text-muted text-lg-start">
          <h4>© 2022
          made  by
          <a href="" class="font-weight-bold" target="_blank">Team big_O</a></h4>
          
        </div>
      </div>
     
    </div>
  </div>
</footer>

            </div>

         
       </main>
    

      
          <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">UIU Activity Tracker</h5>
          
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        

        <!-- Sidenav Type -->
        
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          
        </div>

        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>

        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        

        <!-- Navbar Fixed -->
        
        <div class="mt-3 d-flex">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        

        
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        
     
          
        </div>
      </div>
    </div>
</div>


<!--   Core JS Files   -->
<script src="./assets/js/core/popper.min.js" ></script>
<script src="./assets/js/core/bootstrap.min.js" ></script>
<script src="./assets/js/plugins/perfect-scrollbar.min.js" ></script>
<script src="./assets/js/plugins/smooth-scrollbar.min.js" ></script>





<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

	</body>


<style>

body {
 
  background-image:url("image/bg.jpg") ;
  padding: 0;
  margin: 0;
  font-family: 'Lato', sans-serif;
  color: #ff8808;
}

.student-profile .card {
  border-radius: 10px;
}



.student-profile .card .card-header .profile_img {
  width: 150px;
  height: 150px;
  object-fit: cover;
  margin: 10px auto;
  border: 10px solid #ccc;
  border-radius: 50%;
}


.student-profile .card h3 {
  font-size: 20px;
  font-weight: 700;
} */
 
.student-profile .table th,
.student-profile .table td {
  font-size: 14px;
  padding: 5px 10px;
  color: #000;
}


body {
  color: #222;
  font-size: 100%;
  line-height: 24px;
  margin: 0;
padding:0;
font-family: "Raleway",sans-serif;
}


.ScriptTop {
  background: rgb(244, 214, 155) none repeat scroll 0 0;
  float: left;
  font-size: 0.69em;
  font-weight: 600;
  line-height: 2.2;
  padding: 12px 0;
  text-transform: uppercase;
  width: 100%;
}

.ScriptTop ul {
  margin: 12px 0;
  padding: 0;
  text-align: left;
}


.ScriptTop li{
list-style:none;	
display:inline-block;
}


/* Update Information */

.ScriptTop li a {
  border-radius: 20px;
  background-color: #FF4B2B;
  color: #fff;
  display: inline-block;
  font-size: 14px;
  font-weight: 600;
  padding: 5px 18px;
  text-decoration: none;
  text-transform: capitalize;
}

.ScriptHeader {
  float: left;
  width: 100%;
  padding: 2em 0;
}

.rt-heading {
  
  text-align:center;
  border-radius: 200px;
	border: 1px solid #333;
	background-color: #ffac5a;
	color: #FFFFFF;
}

.Scriptcontent{
line-height:28px;	
}

/* .ScriptHeader h1{


  color: #ff8808;
  font-size: 26px;
  font-weight: 700;
  margin: 0;
  line-height: normal;

} */


.rt-container {
margin: 0 auto;
padding-left:15px;
padding-right:15px;
}



</style>

</html>