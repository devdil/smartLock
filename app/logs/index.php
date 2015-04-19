<?php

include '../includes/Authenticate.php';
    //check whether the user is logged in or not,
if (!Authenticate::isLoggedIn())
{
    Authenticate::logout();
}

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
	<br><br>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="navbar navbar-default navbar-inverse">
            <div class="navbar-header">
              <a type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"></a>
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <a class="navbar-brand" href="#">Search your logs</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <ul class="nav navbar-nav navbar-right"></ul>
              <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input class="form-control" placeholder="Name or Contact number" style="width:250px;"
                  type="text">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
		<div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Logged In</th>
                <th>Logged Out</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Arshad</td>
                <td>8981892663</td>
                <td>12/02/2015 | 03:45:00</td>
                <td>12/02/2015 | 03:45:00</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Faraz</td>
                <td>9874658923</td>
                <td>12/02/2015 | 03:45:00</td>
                <td>12/02/2015 | 03:45:00</td>
              </tr>
              <tr>
                <td>3</td>
                <td>Neha</td>
                <td>9903689565</td>
              	<td>12/02/2015 | 03:45:00</td>
                <td>12/02/2015 | 03:45:00</td>
              </tr>
              <tr>
                <td>4</td>
                <td>Arshad</td>
                <td>8981892663</td>
              	<td>10/02/2015 | 03:45:00</td>
                <td>10/02/2015 | 16:30:00</td>
              </tr>
            </tbody>
          </table>
		 </div> 
        </div>
      </div>
    </div>
  </body>

</html>