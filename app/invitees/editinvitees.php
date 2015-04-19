<?php

include '../includes/Authenticate.php';
include '../classes/invitees.php';
    //check whether the user is logged in or not,
if (!Authenticate::isLoggedIn())
{
    Authenticate::logout();
}

$inviteid = $_SESSION['editinvitees'];

$queryresult = Views::EditInvitees($inviteid);

    $index = 0;


?>
<html>
  
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"
    rel="stylesheet">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" media="all" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" media="all" type="text/css" href="jquery-ui-timepicker-addon.css" />

    <style type="text/css">
      *{ font-size:12px; font-family:verdana; }
      h1 { font-size:22px; }
      .wrapper { width:900px; margin:0px auto; padding:15px;background-color:#eee; }
      input { width:250px; border: 2px solid #CCC; line-height:20px;height:30px; border-radius:10px; padding:5px; }
    </style>

  </head>
  
  <body>
    <div class="navbar navbar-default navbar-static-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <a type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"></a>
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <a class="navbar-brand" href="#">Welcome</a>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav navbar-right"></ul>
          <ul class="nav navbar-nav navbar-right"></ul>
          <p class="navbar-text navbar-right">Signed in as
            <a href="#" class="navbar-link">Arshad Feeroz</a>
          </p>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="btn-group btn-group-justified btn-group-vertical">
            <a href="../welcome/" class="btn btn-primary">Home</a>
            <a href="../invitees/" class="btn btn-primary">Invitees</a>
            <a href="../logs/" class="btn btn-primary">Logs</a>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="btn-group btn-group-justified">
            <a href="../settings/" class="btn btn-primary">Settings</a>
            <a href="../logout/" class="btn btn-primary">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <blockquote>
            <p>Edit your Invitees</p>
          </blockquote>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
        

      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Contact Number</th>
              <th>Key</th>
              <th>Access In time</th>
              <th>Access Out time</th>
            </tr>
          </thead>

        <?php if (($queryresult)): ?>
          <tbody>
            <tr>
              <form method="POST">
             
              <td><?php echo $queryresult[0]["InviteName"]; ?> </td>
              <td><?php echo $queryresult[0]["InviteContact"]; ?> </td>
              <td><?php echo $queryresult[0]["InviteKey"]; ?> </td>
              <td><input type="text" class="datetime-control" value="<?php echo $queryresult[0]["AccessIn"]; ?>" name="accessin"></td>
              <td><input type="text" class="datetime-control"  value="<?php echo $queryresult[0]["AccessOut"]; ?>" name="accessout"></td>
              <td><input type="submit" name="submit" class="btn btn-success"></td>

              <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
              <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
              <script>
                    $(document).ready(function(){
                      $('.datetime-control').datetimepicker({
                       dateFormat: 'yy-mm-dd',
                        timeFormat: 'HH:mm'
                     });
                    });
              </script>

              </form>
            </tr>
          </tbody>
        <?php endif; ?>
        </table>
      </div>


        </div>
      </div>
    </div>
  </body>

</html>