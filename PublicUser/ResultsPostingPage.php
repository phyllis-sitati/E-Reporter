<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>E-Reporter: Result Posting Page</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="../Admin/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../Admin/assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../Admin/assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../Admin/assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../Admin/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>
  <div class="wrapper">
    <div class="sidebar" data-color="black" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->
          <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    E-REPORTER: Public User
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="../Admin/dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                
                <li class="active">
                    <a href="#">
                        <i class="pe-7s-note2"></i>
                        <p>Result Posting</p>
                    </a>
                </li>
            </ul>
      </div>
    </div>

    <div class="main-panel">
      <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Public User</a>
                </div>
                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">
            <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
              <form action=" " method="post" enctype="multipart/form-data">

                  <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Personal Information</h4>
                            </div>
                            <div class="content">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" name="nameOne"class="form-control" placeholder="First Name" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Middle Name</label>
                                                <input type="text" name= "nameTwo"class="form-control" placeholder="Middle Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Surname Name</label>
                                                <input type="text" name="surname" class="form-control" placeholder="Last Name" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Current Location</label>
                                                <input type="text" name="location" class="form-control" placeholder="Your Current Location">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="text" name="PUphone" class="form-control" placeholder="Phone Number" >
                                            </div>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Election Information</h4>
                            </div>
                            <div class="content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Polling Station</label>
                                                <input type="text" name="pstation" class="form-control" placeholder="Name of Polling station" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Total Valid Votes</label>
                                                <input type="text" name="tvalid" class="form-control" placeholder="Total Valid Votes" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Total Rejected Votes</label>
                                                <input type="text" name="trejected" class="form-control" placeholder="Rejected Votes" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Total Votes in the Ballot</label>
                                                <input type="text" name="tcast" class="form-control" placeholder="Total Votes cast">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label> Upload picture of the pink sheet</label>
                                            <input type="hidden" value="1000000" name="MAX_FILE_SIZE">
                                            <input type="file" name="pinksheet" class="form-control"> 
                                        </div>
                                      </div>
                                    </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Presidential Candidate Results</h4>
                                <!--<p class="category">Here is a subtitle for this table</p>-->
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                      <th>Candidate Number</th>
                                      <th>Name</th>
                                      <th>Party</th>
                                      <th>Obtained Votes in Figures</th>
                                      <th>Obtained Votes in Words</th>
                                    </thead>
<?php
// database file
  require_once('../database/dbconnect.php');

// Query selecting candidate information
$sql = "SELECT FirstName, MiddleName , Surname, Party FROM candidate WHERE Category = 'Presidential'";

//Get a database connection
$db = new DatabaseConnection;
$conn=$db->returnDBConnect();

//Execute query
if($conn)
{
  if(mysqli_query($conn, $sql))
  {
    echo "";
  }
  else
  {
    echo "Error: ".mysqli_error($conn);
  }
}

$count=1;
$result= mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_assoc($result))
  {  ?>
    <tbody>
        <tr>
            <th scope=”row”>
                <?php echo $count; ?>
            </th>
            <td><?php echo $row['FirstName']. ' '. $row['MiddleName']. ' '. $row['Surname'];?> </td>
            <td><?php echo $row['Party'];?> </td>
           <td><input type="text" id="row1_figures" name="fVotes" value=" "></td>
            <td><input type="text" id="row1_words" name="wVotes" value= " "</td>
        </tr>                                  
    </tbody>

<?php
   $count =$count + 1 ;
 }
}
else
{
  echo "No results outputted";
}
mysqli_close($conn);
?>
                                    
                                </table>

                            </div>
                        </div>
                    </div>

                                       <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Parliamentary Candidate Results</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Candidate Number</th>
                                      <th>Name</th>
                                      <th>Party</th>
                                      <th>Votes Obtained In figures</th>
                                      <th>Votes Obtained in words</th>
                                    </thead>

<?php
// database file
  require_once('../database/dbconnect.php');

// Query selecting candidate information
$sql = "SELECT FirstName, MiddleName , Surname, Party FROM candidate WHERE Category = 'Parliamentary'";

//Get a database connection
$db = new DatabaseConnection;
$conn=$db->returnDBConnect();

//Execute query
if($conn)
{
  if(mysqli_query($conn, $sql))
  {
    echo "";
  }
  else
  {
    echo "Error: ".mysqli_error($conn);
  }
}

$count=1;
$result= mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_assoc($result))
  {  ?>
    <tbody>
        <tr>
            <th scope=”row”>
                <?php echo $count; ?>
            </th>
            <td><?php echo $row['FirstName']. ' '. $row['MiddleName']. ' '. $row['Surname'];?> </td>
            <td><?php echo $row['Party'];?> </td>
           <td><input type="text" id="row2_figures" name="fVotes2" value=" "></td>
            <td><input type="text" id="row2_words" name="wVotes2" value= " "</td>
        </tr>                                  
    </tbody>

<?php
   $count =$count + 1 ;
 }
}
else
{
  echo "No results outputted";
}
mysqli_close($conn);
?>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" name="postresult" class="btn btn-info btn-fill pull-right">Post Results</button>
                <div class="clearfix"></div>
              </form>
            </div>
        </div>

        <footer class="footer" style="background: black;">
            <div class="container-fluid">
                <p class="copyright pull-left">
                    &copy; <script>document.write(new Date().getFullYear())</script> E-Reporter. All Rights Reserved.
                </p>
            </div>
        </footer>
      
    </div>
  </div>
</body>

    <!--   Core JS Files   -->
    <script src="../Admin/assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
  <script src="../Admin/assets/js/bootstrap.min.js" type="text/javascript"></script>

  <!--  Charts Plugin -->
  <script src="../Admin/assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../Admin/assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
  <script src="../Admin/assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

  <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
  <script src="../Admin/assets/js/demo.js"></script>


</html>
