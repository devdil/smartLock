<?php
/**
 * User: Diljit Ramachandran
 * Date: 6/1/15
 * Time: 1:57 PM
 * Last Modified : 19th Jan,2015
 */
session_start();
include 'Database.php';

class Authenticate
{

    public static function isLoggedIn()
    {
        return isset($_SESSION['username']);
    }

    public static function login($useremail,$password)
    {

        $db = DatabaseManager::getConnection();
        $queryString = 'SELECT * FROM admin WHERE EmailId = :useremail AND Password = :password';
        $bindings = array(
            'useremail' => $useremail,
            'password'  =>  $password
        );
        $result = $db->select($queryString,$bindings);
        if ($result != false)
        {

            $_SESSION['username'] = $result[0]['Name'];
            $_SESSION['emailid'] = $result[0]['EmailId'];
            $_SESSION['userid'] = $result[0]['UserId'];
            return isset($_SESSION['username']);
        }

        return false;
    }




    public static function redirect()
    {
        
            header('Location: http://'.$_SERVER['SERVER_NAME'].'/welcome/');
            exit(0);
            return;
    }


    public static function logout()
    {
        $serverURL = $_SERVER['SERVER_NAME'];
        session_start();
        session_destroy();
        $_SESSION = array();
        header('Location: http://'.$_SERVER['SERVER_NAME'].'/login/');
        exit(0);
    }

    public static function areFieldsFilled($fields)
    {
        $flag = true;
        foreach($fields as $fieldItem)
        {
            if(!isset($fieldItem))
                $flag = false;
            if(empty($fieldItem))
            {
                return false;
            }

        }
        return $flag;
    }

    public static function preventUnauthorisedLogin()
    {
        //check whether the user is logged in or not,
        if (!self::isLoggedIn())
        {
            Authenticate::logout();
        }
//protects the student section
            //self::redirect();


    }




}