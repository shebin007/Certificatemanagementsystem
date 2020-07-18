<?php 
 require_once "conn.php";
 ?>
 <!DOCTYPE html>
 <!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Award Badge System </title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
   
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="white_bg">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                           <div class="center-desk">
                              <div class="logo">
                                 <a href="index.html"><img src="images/logo.png" alt="#" /></a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                           </button>
                           <div class="collapse navbar-collapse" id="navbarsExample04">
                              <ul class="navbar-nav mr-auto">
                                 <li class="nav-item ">
                                    <a class="nav-link" href="index.html"> Home  </a>
                                 </li>
                                 <li class="nav-item active"  >
                                    <a class="nav-link" href="validate.php">Validate</a>
                                 </li>
                                
                                 <li class="nav-item d_none le_co">
                                    <a class="nav-link" href="http://localhost/adminaward/login.php"><i  class="fa fa-user" aria-hidden="true"></i> Login</a>
                                 </li>
                                 <li class="nav-item d_none le_co">
                                    <a class="nav-link" href="#"><i  class="fa fa-search" aria-hidden="true"></i></a>
                                 </li>
                              </ul>
                           </div>
                        </nav>
                     </div>
                  </div>
               </div>

 <?php
 $val = $_GET['hash'];

      $query = "SELECT * FROM certificate WHERE hash = :hash";  
      $statement = $db->prepare($query); 
      $statement->execute(  
        array(  
          'hash'     =>   $val
        )  
      ); 
         
       $count = $statement->rowCount();   
         
       if($count > 0)  
                {
                  $row = $statement->fetch(PDO::FETCH_ASSOC);
                  echo "<div class='jumbotron' id='printableArea'>";
                  echo "<div style='border-style: solid;color:black;'>";
                  echo "<h1 class='display-4' style='text-align: center;color:black;'>Certificate </h1>";
                  echo "<h3 style='text-align: center;color:black;'>of</h3>";
                  echo "<h4 style='text-align:center;color:black;'>".$row['issued']."</h4>";
                  echo "<hr>";
                  echo "<h2 style='text-align:center;color:black;'>Awarded To</h3>";
                  echo "<h4 style='text-align:center;color:black;'>".$row['fname']."&nbsp;".$row['lname']."</h4>";
                  echo "<hr>";
                  echo "<h4 style='text-align:center;color:black;'>On ".date("d-m-y")."</h4>";
                  echo "<div class='row'>";
                  echo "<div class='col-md-6'>";
                  echo "<br><br><br><h5 style='color:black;'>ID :<a href='http://localhost/awardsystem/validated.php?hash=".$val."&assign=' style='color:black;' >".$row['hash']."</a></h5>";
                  echo "</div>";
                  echo "<div class='col-md-6'>";
                  echo "certificate is validated by blockchain";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";

                  

                }  
        else {
          echo "<div class='jumbotron' id='printableArea'>";
                  echo "<div style='border-style: solid;color:black;'>";
                  echo "<h3  style='text-align: center;color:black;'>Certificate is Not validated by blockchain </h3>";
                  echo "</div>";
                  echo "</div>";

                
        }


 

?>
           
            <a href="validate.php" class="btn btn-primary" >Return</a>
            </div>
      </header>
     
</div>
</body>
</html>
