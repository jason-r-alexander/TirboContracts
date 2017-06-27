<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <title>TirboContracts</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">



</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation http://stackoverflow.com/questions/20711891/php-easier-way-to-hide-show-menu-items-to-logged-in-logged-out-users-->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <img src="Images/Logo.png" style="height:auto; width:170px; margin-top:-28px;">
                </a>
            </div>
    
    <!--nav bar start --> 
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="index.html#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="check.php">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="check.php">Testimonials</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="subscribe.html">Subscribe</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.php">Login</a>
                    </li>

                    <?php
                      include('login.php'); // Includes Login Script

                      if(isset($_SESSION['login_user'])){
                        echo '<li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$_SESSION['login_user'].'<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  <li><a href="dashboard.php">Dashboard</a></li>
                                  <li><a href="settings.html">Account Settings</a></li>
                                  <li><a href="logout.php">Logout</a></li>
                                </ul>
                              </li>'; 
                            
                    }
                    ?>
    
                  </ul>
                </div>

            <!-- /.navbar-collapse -->

            <script>
            $(document).ready(function() {
                $(".dropdown-toggle").dropdown();
            });
            </script>

        </div>
        <!-- /.container -->
    </nav>  

<br>
<br>

<center><a class="btn btn-default" href="contractadd.php" role="button" align="center">Create a Contract &raquo;</a></center>
<br>

<div class="containter">
    <div class="listView" style="width: 80%; margin-left: auto; margin-right: auto;">
    <!-- Upcoming events -->

    <p style="margin-left: 80%; margin-bottom: 5px;"><a class="btn btn-default" id="calendarView" role="button">Calendar View &raquo;</a></p>
    <div class="col-md-6 right">   

    <h2>Upcoming Events</h2>   
        <!--Adding bulleted list -->
        <?php
        include('TirboConfig.php');

        // Create connection
        $con = mysqli_connect($servername, $username, $password, $dbname);
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySql: " . mysqli_connect_error();
        }

        // QUERY FOR ATHLETIC DIRECTOR INFORMATION 
        //$query = "SELECT C_SPORT, C_SITE, C_START_TIME, C_DATE FROM Contract";
        $query = "SELECT C_ID, C_SPORT, C_SITE, C_START_TIME, C_END_TIME, C_DATE FROM Contract ORDER BY C_DATE DESC LIMIT 5";
        $result = mysql_query($query);
        $prevDate = mktime(0,0,0,12,2,1997);
        $sameDate = False;

        echo "<ul>";

        while($row = mysql_fetch_array($result)){
            $phpdate = strtotime($row['C_DATE']);
            if($phpdate!=$prevDate) {
                /*will only get here once date changes and the div is already started.*/
                /*allows the offset of the events*/
                if($sameDate) {
                    echo "</div>";
                    $sameDate = False;
                }
                echo "<h4 class='EventList' style='font-size:1.4em;'>".date('F jS Y', $phpdate)."</h4>";
                echo "<div class='EventDiv'>";
                $prevDate = $phpdate;
                $sameDate = True;
            }
            $start = strtotime($row['C_START_TIME']);
            $end   = strtotime($row['C_END_TIME']);
            echo "<div style='width:auto;'>";
            echo "<a class = 'eventLink' href='/contractfinalized.php?id=".$row['C_ID']."'>" 
            . ucwords($row['C_SPORT'])
            ." at "
            . ucwords($row['C_SITE'])
            . "<br><small style='font-size:.7em;'>"
            . date('h:i A',$start)
            . " - "
            . date('h:i A',$end)
            . '</small></a><br></div><br>';
            /*echo "<a style='color: white; font-size:.8em;' href='/contractfinalized.php?id=".$row['C_ID']."'>" 
            . date('h:i A',$start)
            ." - "
            . date('h:i A',$end)
            . "</a><br></div><br>";*/
        }
        echo "</div>";
        echo "<ul>";
        // Close connection
        mysqli_close($con);
        ?>
    </div>
    <!-- Pending approvals -->
    <div class="col-md-6 left">  
        <h2>Pending Approvals</h2>  
        <!--Adding bulleted list -->
        <?php
        include('TirboConfig.php');

        // Create connection
        $con = mysqli_connect($servername, $username, $password, $dbname);
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySql: " . mysqli_connect_error();
        }

        // QUERY FOR ATHLETIC DIRECTOR INFORMATION 
        //$query = "SELECT C_SPORT, C_SITE, C_START_TIME, C_DATE FROM Contract";
        $query = "SELECT C_ID, C_SPORT, C_SITE, C_START_TIME, C_END_TIME, C_DATE FROM Contract ORDER BY C_DATE DESC LIMIT 5";
        $result = mysql_query($query);
        $prevDate = mktime(0,0,0,12,2,1997);
        $sameDate = False;

        echo "<ul>";

        while($row = mysql_fetch_array($result)){
            $phpdate = strtotime($row['C_DATE']);
            if($phpdate!=$prevDate) {
                /*will only get here once date changes and the div is already started.*/
                /*allows the offset of the events*/
                if($sameDate) {
                    echo "</div>";
                    $sameDate = False;
                }
                echo "<h4 class='EventList' style='font-size:1.4em;'>".date('F jS Y', $phpdate)."</h4>";
                echo "<div class='EventDiv'>";
                $prevDate = $phpdate;
                $sameDate = True;
            }
            $start = strtotime($row['C_START_TIME']);
            $end   = strtotime($row['C_END_TIME']);
            echo "<div style='width:auto;'>";
            echo "<a class = 'eventLink' href='/contractedit.php?id=".$row['C_ID']."'>" 
            . ucwords($row['C_SPORT'])
            ." at "
            . ucwords($row['C_SITE'])
            . "<br><small style='font-size:.7em;'>"
            . date('h:i A',$start)
            . " - "
            . date('h:i A',$end)
            . '</small></a><br></div><br>';
            /*echo "<a style='color: white; font-size:.8em;' href='/contractfinalized.php?id=".$row['C_ID']."'>" 
            . date('h:i A',$start)
            ." - "
            . date('h:i A',$end)
            . "</a><br></div><br>";*/
        }
        echo "</div>";
        echo "<ul>";
        // Close connection
        mysqli_close($con);
        ?>
    </div>
    </div><!-- end of the list view -->
    <div id='calendar' style='width: 80%; margin-left: 10%;'></div>
</div>


<!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; Business & Technology Professionals 2016</p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/grayscale.js"></script>

    <!-- Custom CSS -->   
    <link href="main.css" rel="stylesheet">

    <link rel='stylesheet' href='fullcalendar/fullcalendar.css' />
    <script src='js/jquery.js'></script>
    <script src='js/moment.js'></script>
    <script src='fullcalendar/fullcalendar.js'></script>

    <script type="text/javascript">
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            customButtons: {
                myCustomButton: {
                    text: 'List View',
                    click: function() {
                        $(".listView").show();
                        $("#calendar").hide();
                    }
                }
            },
            height : 'auto',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month myCustomButton'
            },
            eventLimit: 4,
            // put your options and callbacks here
            eventSources: [
                // your event source
                {
                    url: 'myfeed.php',
                    type: 'POST',
                    error: function() {
                        alert('there was an error while fetching events!');
                    },
                    color: '#42dca3',   // a non-ajax option
                    textColor: 'black' // a non-ajax option
                }

                // any other sources...

            ]
        });

        $("#calendarView").click(function(event) {
            $(".listView").hide();
            $("#calendar").show();
            $("#calendar").fullcalendar('render');
        });

        $(".listView").hide();
    });
    </script>



</body>
</html>