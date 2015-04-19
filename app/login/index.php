<?php 

include '../includes/Authenticate.php';
  
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login']))
{

     
  if (!empty($_POST['useremail']) && !empty($_POST['password']))
  {
       
    $useremail = htmlspecialchars($_POST['useremail']);
    $password = htmlspecialchars($_POST['password']);
    
      //validate user and password from the database
          if(Authenticate::login($useremail,$password))
          {
             
            Authenticate::redirect();
            unset($status);
          }
        
          else
          {
            $status = 'Invalid Login Credentials !';
          }
        


  }
  else
    //the user has submitted empty form .Notify :Empty Form Submitted
  $status = 'Empty Form Submitted!';
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
    rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/main.css">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  </head>
  
  <body class="">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="jumbotron">
            <h1 class="text-center">Gnooble Smart Lock</h1>
          </div>
           <?php if (!empty($status) && isset($status)): ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <p>
                        <?php echo "Alert! ".$status; ?>
                    </p>
                </div>
            <?php endif; ?>
          <form class="form-horizontal" role="form" method="POST" >
            <div class="form-group">
              <div class="col-sm-2">
                <label for="inputEmail3" class="control-label">Email</label>
              </div>
              <div class="col-sm-10">
                <input type="email"  name="useremail" class="form-control" id="inputEmail3" placeholder="Email">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-2">
                <label for="inputPassword3" class="control-label">Password</label>
              </div>
              <div class="col-sm-10">
                <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                  <label>
                    <input type="checkbox">Remember me</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                  <label>
                    <input type="checkbox">I accept the term and conditions&nbsp;</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="login" class="btn btn-default">Sign in</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>

</html>