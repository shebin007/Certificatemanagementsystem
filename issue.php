<!DOCTYPE html>
<html lang="en">
<head>
  <title>Award Badging System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
<body>

<div class="container-fluid">
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a class="navbar-brand" href="#">Award Badging System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="issue.php">Issue award</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="validate.php">validate award</a>
            </li>
           
          </ul>
        </div>  
      </nav>
<div class="jumbotron">
<H1 style="text-align: center;" >Certificate Generation Form</H1>
<form action="issued.php" method="POST">
  <div class="form-group">
    
    <div class="row">
        <div class="col-md-6">
            <input type="text" class="form-control" name="fname" placeholder="Enter First Name">
    
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control" name="lname" placeholder="Enter Last Name   ">
    
        </div>
    </div>
    </div>
    <div class="form-group">
  
    <div class="row">
        <div class="col-md-6">
            <input type="text" class="form-control" name="org" placeholder="Organization">
    
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control" name="issued" placeholder="Course Name  ">
    
        </div>
    </div>
</div> 
<div class="form-group">
  
  <div class="row">
      <div class="col-md-6">
          <input type="text" class="form-control" name="rank" placeholder="Obtained Rank">
  
      </div>
      
  </div>
</div>

    
  <button type="submit" class="btn btn-primary" name="assign">Generate Certificate on Block</button>
 
</form>
</div>
</div>
</body>
</html>
