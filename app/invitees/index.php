<?php

include '../includes/Authenticate.php';
include '../classes/invitees.php';
    //check whether the user is logged in or not,
if (!Authenticate::isLoggedIn())
{
    Authenticate::logout();
}

$userid = $_SESSION['userid'];

$queryResult = Views::ViewInvitees($userid);

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
            <p>Your Current Invitees for your Spark Lock</p>
          </blockquote>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
        

      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
          <th>Sl no</th>
              <th>Name</th>
              <th>Contact Number</th>
              <th>Key</th>
              <th>Access In time</th>
          <th>Access Out time</th>
            </tr>
          </thead>
        <?php if (($queryResult)): ?>
          <tbody>
            <?php foreach($queryResult as $result): ?>
            <tr>
              <td><?php echo ++$index; ?></td>
              <td><?php echo $result["InviteName"]; ?> </td>
              <td><?php echo $result["InviteContact"]; ?> </td>
              <td><?php echo $result["InviteKey"]; ?> </td>
              <td><?php echo $result["AccessIn"]; ?></td>
              <td><?php echo $result["AccessOut"]; ?></td>
              <td><a href="?eid=<?php echo $result['InviteId']; ?>">Edit</a></td>
              <td><a href="?did=<?php echo $result['InviteId']; ?>">Remove</a></td>
              <?php
                if(isset($_GET['did']))
                {
                    $inviteid = $_GET['did'];
                    $query = Views::DeleteInvitees($inviteid);
                    header("Location:../invitees/");
                }
                if(isset($_GET['eid']))
                {
                    $inviteid = $_GET['eid'];
                    $_SESSION['editinvitees'] = $inviteid;
                    header("Location:editinvitees.php");
                }
              ?> 
            </tr>
          <?php endforeach; ?>
            
          </tbody>
        <?php endif; ?>
        </table>
      </div>


        </div>
      </div>
    </div>
  </body>

</html>