<?php
/**
 * Created by PhpStorm.
 * User: diljit
 * Date: 22/1/15
 * Time: 8:11 PM
 */
//require_once '../includes/Database.php';

class Views
{

    public static function ViewInvitees($userid)
    {
        $db =  DatabaseManager::getConnection();
        $query = "SELECT * FROM invitees where UserId = :UserId";

         $bindings = array(
            'UserId' => $userid
            );

        return  $db->select($query,$bindings);
    }

     public static function DeleteInvitees($inviteid)
    {

        $db = DatabaseManager::getConnection();
        $queryString = "DELETE from invitees WHERE InviteId=:inviteid";

        $bindings = array(
            'inviteid' => $inviteid

        );
       return $db->insert($queryString,$bindings);
        
    }
    public static function EditInvitees($InviteId)
    {
        $db =  DatabaseManager::getConnection();
        $query = "SELECT * FROM invitees where InviteId = :InviteId";

         $bindings = array(
            'InviteId' => $InviteId
            );

        return  $db->select($query,$bindings);
    }
}



?>