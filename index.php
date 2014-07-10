
    <!DOCTYPE html>
    <html lang="en">
      <head>
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/navigation.css">
        <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Dancing+Script:400,700' rel='stylesheet' type='text/css'>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="js/navigation.js"></script>
        <script src="js/emailAjax.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
        <script src="https://maps.googleapis.com/maps/api/js?libraries=geometry&sensor=false"></script>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="This free web application allows you to track your cycling trips easily.">
        <meta name="keywords" content="sports cycling free beta">

        <title>Cycling Tracker Beta - Now for Free! Track your runs easily</title>

      </head>
      <body>

      <!--Google analytics script-->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-52360885-2', 'auto');
  ga('send', 'pageview');

</script>

        <!-- NAVBAR -->

            <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#" style="color: #2ECC71; font-family: 'Oswald', sans-serif;">Cycling Tracker - Early Beta</a>
            </div>
            <div class="collapse navbar-collapse">
              <ul class="navbar-form navbar-right">
                <button id="startButton" class="btn btn-success">
                 <span class="glyphicon glyphicon-time" style="vertical-align:middle;"></span>
                Start trip
                </button>
                <button id="stopButton" class="btn btn-danger">
                <span class="glyphicon glyphicon-remove-circle" style="vertical-align:middle;"></span>
                Stop trip  
                </button>
                </ul>
            </div><!--/.nav-collapse loppuu tähän -->
          </div>
        </div>

        <!-- CONTENT -->

       <div class="col-md-12" style="background: #2ECC71; padding-top: 70px; padding-bottom:50px;">
      <h1 class="text-center" style="color: #EFEFEF; font-family: 'Dancing Script', cursive; font-weight: 700;">Cycling Tracker Beta.</h1>
      </div>

      <!-- TABLE ALKAA-->

      <div class="col-md-12" style="padding:0px; margin:0px; background-color: #EFEFEF;">
            <table class="table table-bordered" style="margin:0px; padding:0px;">
          <thead>
              <tr>
                  <th><span class="glyphicon glyphicon-road"></span> Distance</th>
                  <th><span class="glyphicon glyphicon-dashboard"></span> Current Speed / Avg. Speed</th>
                  <th><span class="glyphicon glyphicon-signal"></span> Accuracy</th>
                  <th><span class="glyphicon glyphicon-time"></span> Duration</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td><p id="distance">N/A</p></td>
                <td><p id="speed">N/A</p></td>
                <td><p id="accuracy">N/A</p></td>
                <td><p id="duration">N/A</p></td>
              </tr>
              </tbody>
          </table>
      </div>

      <!-- MAP -->

      <div id="map" class="col-md-12" style="min-height: 250px; padding:0px; margin:0px; background-color:#EFEFEF;">
      </div>

      <!-- FORM AJAX
      included in the <head>
       -->

      <!-- INVITATION TEXT -->

      <div class="col-md-12 text-center" style="background-color:#EFEFEF; padding-top: 20px;">
      <h3><span class="label label-info">Info</span> We are currently beta testing. If you would like to participate in our beta program, please submit your email address below.</h3> 

      <!-- FORM & BUTTON -->

    <div class="col-md-6 col-md-offset-4" style="background-color:#EFEFEF; padding-top: 20px; padding-bottom: 40px;">
      <form class="form-search" action="./php/email.php" method="post">
        <input id="emailField" type="email" class="form-control input-lg" placeholder="Email" name="email" style="width: 70%; float:left;">
        <button type="submit" id="submitButton" class="btn-lg btn-primary">Send</button>
      </form>
    </div>
    </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      </body>
    </html>