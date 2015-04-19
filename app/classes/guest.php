<?php
/**
 * Created by PhpStorm.
 * User: diljit
 * Date: 22/1/15
 * Time: 8:11 PM
 */require_once '../includes/Database.php';

class Guests
{

    public static function GuestAccess($contactno,$key)
    {
        $db =  DatabaseManager::getConnection();
        $query = "SELECT * FROM invitees where InviteContact = :contactno and InviteKey = :key";

         $bindings = array(
            'contactno' => $contactno,
            'key' => $key
            );

      	return $db->select($query,$bindings);


    }

    public static function getLockStatus($userid)
    {
    		$db =  DatabaseManager::getConnection();
       		$query = "SELECT * FROM admin where UserId = :userid ";

         $bindings = array(
            'userid' => $userid
            
            );

      	return $db->select($query,$bindings);

    }

     public static function Lock($userId)
    {
    		$db =  DatabaseManager::getConnection();
       		$query = "UPDATE admin SET Status='Y' where UserId = :userid ";
       				$bindings = array('userid' => $userId);
        

      	return $db->insert($query,$bindings);

    }
    public static function Unlock($userId)
    {
    		$db =  DatabaseManager::getConnection();
       		$query = "UPDATE admin SET Status='N' where UserId = :userid ";
       			$bindings = array('userid' => $userId);
        

      	return $db->insert($query,$bindings);

    }
    public static function UpdateIsAccessing($userId)
    {
    	$db =  DatabaseManager::getConnection();
       		$query = "SELECT * FROM admin where UserId = :userid ";

         $bindings = array(
            'userid' => $userid
            
            );

      	$isAccessing = $db->select($query,$bindings)[0]['IsAccessing'];

      	if ($isAccessing=='Y')
      	{
      		//turn this to N
      		$query = "UPDATE admin SET IsAccessing='N' where UserId = :userid ";

        

      	return $db->insert($query);
      	}

      	else
      	{
      		//turn this to Y
      	$query = "UPDATE admin SET IsAccessing='Y' where UserId = :userid ";

        

      	return $db->insert($query);
      	}

    }




}

?>