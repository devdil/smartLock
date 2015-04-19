<?php
include '../classes/guest.php';

if (isset($_POST))
{

   $lockstatus = $_POST['lockstatus'];
   $controlstatus = $_POST['controlstatus'];
   $userid=$_POST['userid'];

   if($lockstatus ==='Y')
   {
   	Guests::Unlock($userid);
   	echo json_encode("Unlocked");
   }

   else{
   	Guests::Lock($userid);
   		echo json_encode("Locked");
   }





}


?>