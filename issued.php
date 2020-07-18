<?php 
 require_once "conn.php";
 ?>
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
  <script>
function printPageArea(areaID){
    var printContent = document.getElementById(areaID);
    var WinPrint = window.open('', '', 'width=900,height=650');
    WinPrint.document.write(printContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    WinPrint.close();
}
</script>

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
 <?php
 $fname = $_POST['fname'];
 $lname = $_POST['lname'];
 $organ = $_POST['org'];
 $issue = $_POST['issued'];
 $rank = $_POST['rank'];
 $date = date("Y-m-d  h:m:s" );
 $certhash =hash('sha256',$fname.$lname.$organ.$issue.$rank.$date);

 $query = "INSERT INTO certificate (fname,lname,organisation,issued,rank,date,hash)"."VALUES (:fname,:lname,:org,:issue,:rank,:date,:hash);";
    $statement = $db->prepare($query); 
    $statement->execute(  
        array(  
              'fname'     =>     $_POST["fname"],
             'lname'     =>    $_POST["lname"],
             'org'     =>    $_POST["org"],
             'issue'     =>     $_POST["issued"],
             'rank'     =>     $_POST["rank"],
             'date'     =>     date("Y-m-d  h:m:s"),
             'hash'     =>     $certhash
        )  
   ); 
?>
 <div class="jumbotron"  id="printableArea">
   <div style="border-style: solid;">
  <h1 class="display-4" style="text-align: center;">Certificate </h1>
  <h3 style="text-align: center;">of</h3>
    <?php
      echo "<h4 style='text-align:center;'>".$issue."</h4>";
      echo "<hr>";
      echo "<h2 style='text-align:center;'>Awarded To</h3>";
      echo "<h4 style='text-align:center;'>".$fname."&nbsp;".$lname."</h4>";
      echo "<hr>";
      echo "<h4 style='text-align:center;'>On ".date("d-m-y")."</h4>";
      echo "<br><br><br><h5>ID :<a href='http://localhost/awardsystem/validated.php?hash=". $certhash."&assign='>".$certhash."</h5>";
   ?>
   </div>
</div>
<a href="javascript:void(0);" class="btn btn-primary" onclick="printPageArea('printableArea')">Download Certificate</a>
<?php
  echo "<a href='http://www.linkedin.com/shareArticle?mini=true&amp;url=http://localhost/awardsystem/validated.php?hash=". $certhash."&assign=' class='btn btn-primary' target='_blank'>Share Certificate</a>";
 

?>

</div>
</body>
</html>