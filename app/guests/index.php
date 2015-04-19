<?php


include '../classes/guest.php';
    //check whether the user is logged in or not,
date_default_timezone_set('Asia/Kolkata');
$currentTime = new DateTime();
$startTime = new DateTime();
$endTime = new DateTime();
$currentTime->setTimestamp(strtotime(date('Y-m-d H:i:s')));

if(isset($_POST["submit"]) )
{
	
			$contactno = $_POST['contactno'];
			$key = $_POST['key'];
			
			$result = Guests::GuestAccess($contactno,$key);
			$startTime->setTimestamp(strtotime(($result[0]["AccessIn"])));
			$endTime->setTimestamp(strtotime($result[0]["AccessOut"]));
			
			if ($result!=false)
			{
					//retrieve the status of the lock

				$locktatus = Guests::getLockStatus($result[0]['UserId']);


			}


				
}

?>
<html>
  
  <head>
    <meta charset="utf-8">
    <title>Smart Lock | Guest</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" media="all" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
		
		
		
		
		<style type="text/css">
			*{ font-size:12px; font-family:verdana; }
			h1 { font-size:22px; }
			.wrapper { width:900px; margin:0px auto; padding:15px;background-color:#eee; }
			input { width:250px; border: 2px solid #CCC; line-height:20px;height:20px; border-radius:10px; padding:5px; }
		</style>
		
	
	
	
	
  </head>
  
  <body>
   	
    <div class="container" width="auto">
      <div class="row">
        <div class="col-md-12">
          <div class="btn-group btn-group-justified btn-group-vertical">
            <a href="#" class="btn btn-primary">Gnooble Smart Lock | Guest Interface</a>
           
          </div>
        </div>
      </div>
    </div>
   
	<br>
   
      
	  
	  <div class="container" width="auto">
	  <div class="col-md-12" draggable="true" style="">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Hello Guest,</h3>
						<br>
						<p class="text-danger" style="color:#000000">Now you can access our lock through this app. Enter your contact number and the pass key you received through SMS.
              			<br>You can access this lock for the specified time mentioned by the admin.&nbsp;</p>
					</div>
					<?php if ($currentTime>=$startTime && $currentTime<=$endTime){ ?>
					<div class="panel-body">
              
					<form role="form" method="POST">
						<div class="form-group" draggable="true">
							<input class="form-control" name="contactno" id="contactno" placeholder="Enter Contact Number" type="text">
						</div>
					
						<div class="form-group" draggable="true">
							<input class="form-control" name="key" id="name" placeholder="Enter Pass Key" type="text">
						</div>

						<button type="submit" name="submit" class="btn btn-default">Submit</button>

					</form>


						<?php  if(isset($result) && $result!=false) :?>

						<div class="container" width="auto">
      					<div class="row">
        				<div class="col-md-12">
          				<div class="col-md-12">
           			
						<br>
            			<div class="col-md-12 text-center">
             			<div class="btn-group">
             			<button type="button" class="btn btn-danger btn-lg " id="led1offbutton"  onclick="switchLock(0,'Y',<?php echo $result[0]['UserId']; ?>)">Unlock</button>
               				<button type="button" class="btn btn-success btn-lg " id="led1onbutton"  onclick="switchLock(1,'N',<?php echo $result[0]['UserId']; ?>)">Lock</button>
               			<?php if($locktatus[0]['Status']==='Y') :?>
               				<script>$("#led1offbutton").show();$("#led1onbutton").hide();</script>

						<?php endif;?>
						<?php if($locktatus[0]['Status']==='N') :?>
							<script>$("#led1onbutton").show();$("#led1offbutton").hide();</script>
						<?php endif;?>
    
						<script type="text/javascript">
						var deviceID    = "53ff6e066667574838121267";
						var accessToken = "5e598de5dc954dfd73d3ed5fb00240adf58bceec";
						var setFunc = "lock";

						function switchLock(controlStatus,lockstatus,userId) 
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
							
							$.ajax({
					
									url:"updateDB.php",
								type : "POST",
								crossDomain: true,
								data:{ 	
									lockstatus: lockstatus,
										controlstatus: controlStatus,
										userid:userId
											
										},
								dataType: "json",
								success:function(result){
									//alert(result);
									if(result === 'Unlocked')
										{
											$("#led1offbutton").hide();
											$("#led1onbutton").show();
										}
										else
										{
											
											$("#led1onbutton").hide();
											$("#led1offbutton").show();
										}
														
							},
							complete: function(){
						
							},
							error: function (msg) {
					
							}
						});
						
					
			
						}
						</script>
			   
               
			  			</div>
				
           				</div>
           				</div>
         				</div>
         				</div>
      					</div>
	  					<br><br>
	  					<?php endif; ?>

	  				<?php }else{ ?>
	  				<div class = "alert alert-info" >
	  					Time limit exceeded. You can no longer access the lock.
	  				</div>
	  				<?php } ?>


					
						
              		
					</div>
				</div>
			  
		</div>
		</div>
    </div>
  </body>

</html>