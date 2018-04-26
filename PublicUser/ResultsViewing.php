<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="../PublicUser/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>E-Reporter: View Current Results</title>

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
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


      <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    E-REPORTER: view results
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="PublicUserDashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Public Dashboard</p>
                    </a>
                </li>
                
                <li class="active">
                    <a href="#">
                        <i class="pe-7s-map-marker"></i>
                        <p>Results</p>
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
                    <a class="navbar-brand" href="#">Results</a>
                </div>
            </div>
        </nav>

        <div id="map"></div>

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
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9dlV6d8PUneNl2DEQGtm2X_BxYxxbNLU&callback=initMap"
  type="text/javascript"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
  <script src="../Admin/assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

  <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
  <script src="../Admin/assets/js/demo.js"></script>

    <script>
        $().ready(function(){
            demo.initGoogleMaps();
        });
    </script>
<!--AIzaSyA9dlV6d8PUneNl2DEQGtm2X_BxYxxbNLU-->
</html>
