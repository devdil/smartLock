 <?php

class Invitees
{
 
    public static function invite($contactno,$name,$key,$accessin,$accessout,$userid)
    {
        $db = DatabaseManager::getConnection();
        $queryString = 'INSERT INTO  invitees(InviteContact,InviteName,InviteKey,AccessIn,AccessOut,UserId) VALUES(:contactno,:name,:key,:accessin,:accessout,:userid)';

        $bindings = array(
            'contactno' => $contactno,
            'name' => $name,
            'key' => $key,
            'accessin' => $accessin,
            'accessout' => $accessout,
            'userid' => $userid
        );

       return $db->insert($queryString,$bindings);

    }
}    

?>