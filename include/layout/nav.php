
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Management System</title>
    <link rel="stylesheet" href="css/style.css">
       <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
       <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script> 
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
       <!-- <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script> -->
      </head>
<body>
<!-- nav bar started-->
<div class="container">
        <nav class="navbar navbar-expand-md navbar-light bg-light">
          <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">Attendance <br> Management</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
if(isset($_SESSION['user-status'])){
  if($_SESSION['user-status'] == "admin"){
    ?>


<li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Take Attendance</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="dailyattendance.php">Batch Attendance</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="individualattendance.php">Individual Attendance</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="student.php">Student</a>
                </li>
    <?php
  }else{
    ?>
        <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="individualattendance.php">My Attendance</a>
        </li>
    <?php
  }
}
?>

           
                <!-- <li class="nav-item">
                  <a class="nav-link" href="allrequest.php">All Requests</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="seeker.php">Request Blood</a>
                </li> -->
            
                
              </ul>
              <form class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
<!-- 
                       <li class="nav-item dropdown">
                       <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Login
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                          <li><a class="dropdown-item" href="myrequest.php">Admin Login</a></li> 
                           <li><a class="dropdown-item" href="logout.php">Student Login</a></li> 
                        </ul>
                  </li>-->
            
                  <li class="nav-item">
                    <?php
                    if(isset($_SESSION['name']))
                    {
                     
                      ?>
                      <li class="nav-item dropdown">
                       <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                         <?php  echo $_SESSION['name']; ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                          <li><a class="dropdown-item" href="logout.php">Logout</a></li> 
                        </ul>
                  </li>
                  <?php
                    }
                    else
                    {?>
                      <a class="nav-link" href="index.php">Login</a>
        
                    <?php }
                    ?>
                  </li>
         
                </ul>
              </form>
            </div>
          </div>
        </nav>
        </div>
<!-- nav bar ended-->