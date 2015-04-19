<?php

include '../includes/authenticate.php';
include '../classes/welcome.php';
include '../classes/smsapi.php';
		//check whether the user is logged in or not,
if(!Authenticate::isLoggedIn())
{
    Authenticate::logout();
}

if(isset($_POST["submit"]) )
{
	
			$contactno = $_POST['contactno'];
			$name = $_POST['name'];
			$accessin = $_POST['accessin'];
			$accessout = $_POST['accessout'];

			$userid = $_SESSION['userid'];
			$key = rand(1000,9999);

			$fields = array($contactno,$name,$accessin,$accessout);

			if (Authenticate::areFieldsFilled($fields))
			{
				$isSuccessful = Invitees::invite($contactno,$name,$key,$accessin,$accessout,$userid);

				if ($isSuccessful === DatabaseManager::INSERT_SUCCESS)
				{
					   $invitation = new SmsApi($contactno,$key);
					   if ($invitation->sendKey())
					   {
					   	  $status = 'Invitation sent successfull';
					   }

				}
				else
						$status = 'Unsuccessfull';

				
			}	
			else
				$status = ' Please fill all fields correctly';	
}


?>

<html>
  
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" media="all" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
		<link rel="stylesheet" media="all" type="text/css" href="jquery-ui-timepicker-addon.css" />
		
		
		
		<style type="text/css">
			*{ font-size:12px; font-family:verdana; }
			h1 { font-size:22px; }
			.wrapper { width:900px; margin:0px auto; padding:15px;background-color:#eee; }
			input { width:250px; border: 2px solid #CCC; line-height:20px;height:20px; border-radius:10px; padding:5px; }
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
	
    <div class="container" width="auto">
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
    <div class="container" width="auto">
      <div class="row">
        <div class="col-md-12">
          <div class="btn-group btn-group-justified">
            <a href="../settings/" class="btn btn-primary">Settings</a>
            <a href="../logout/" class="btn btn-primary">Logout</a>
          </div>
        </div>
      </div>
    </div>
	<br>
    <div class="container" width="auto">
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-12">
            <h1 class="text-center" contenteditable="true">Your Lock Status :  <strong style="font-size:20px" class="text-primary" >Locked</strong></h1>
			
			<br>
            <div class="col-md-12 text-center">
              <div class="btn-group">
               
					<button type="button" class="btn btn-success btn-lg" id="led1onbutton"  onclick="switchLock(1)">Lock</button>
					<button type="button" class="btn btn-danger btn-lg" id="led1offbutton"  onclick="switchLock(0)">Unlock</button>
    
					<script type="text/javascript">
						var deviceID    = "53ff6e066667574838121267";
						var accessToken = "5e598de5dc954dfd73d3ed5fb00240adf58bceec";
						var setFunc = "lock";

						function switchLock(controlStatus) 
						{
							var paramStr;
							if (controlStatus == 1) 
							{ 
								paramStr = "ON";
							} 
							else 
							{
								paramStr = "OFF";
							}
							var requestURL = "https://api.spark.io/v1/devices/" +deviceID + "/" + setFunc + "/";
							$.post( requestURL, { params: paramStr, access_token: accessToken });
						}
					</script>
			   
               
			  </div>
				
              </div>
            </div>
          </div>
          
        </div>
      </div>
	  <br><br>
      
	  
	  <div class="container" width="auto">
	  <div class="col-md-12" draggable="true" style="">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Grant Access Controls</h3>
						<br>
						<p class="text-danger" style="color:#000000">Now you can allow access to your lock just by entering the contact number
              of the person.
              <br>Grant access for an hour, day or months.&nbsp;</p>
					</div>
					
					<div class="panel-body">
              
					<form role="form" method="POST">
						<div class="form-group" draggable="true">
							<input class="form-control" name="contactno" id="contactno" placeholder="Enter Contact Number" type="text">
						</div>
					
						<div class="form-group" draggable="true">
							<input class="form-control" name="name" id="name" placeholder="Enter Name" type="text">
						</div>
					
						<p>Choose Access in date and Time</p>
							<div class="form-group" draggable="true" width="auto">
								<input type="text" class="datetime-control" name="accessin" placeholder="Choose date and time"/>
							</div>
					
						<p>Choose Access out date and Time</p>
						<div class="form-group" draggable="true">
							<input type="text" class="datetime-control" name="accessout" placeholder="Choose date and time"/>
						</div>
					
			
			
							<!--loading jQuery and other library-->
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
					
					 				<?php if(isset($status) && isset($_POST['submit'])): ?>
                					<div class="alert alert-danger alert-dismissable">
                    				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    				<p>
                    				<?php echo $status; ?></p>
               						</div>
            						<?php endif; ?>
							<button type="submit" name="submit" class="btn btn-default">Submit</button>
              		</form>
					</div>
				</div>
			  
		</div>
		</div>
    </div>
  </body>

</html>