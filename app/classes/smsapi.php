<?php

class SmsApi
{

	private static $apiKey = 'http://api.mVaayoo.com/mvaayooapi/MessageCompose';
	private static $userPass = "diljitpr@gmail.com:diljit123"; 
	private static $senderID = "TEST SMS"; 
	//private $from = '';
	private $to='';
	private $message ='';
	private $lockKey ='';


public function __construct($to,$lockKey)
{
	//$this->from = $from;
	$this->to = $to;
	$this->lockKey = $lockKey;
	$this->message = "Hey I have given you access to my lock. visit this link and enter this pass key.".$lockKey;
	

}


public function sendKey()
{
	$postString="user=".SmsApi::$userPass."&senderID=".SmsApi::$senderID."&receipientno=".$this->to."&msgtxt=".$this->message;
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL, SmsApi::$apiKey);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,$postString);
	$buffer = curl_exec($ch);
		if(empty ($buffer))
			{ echo " buffer is empty "; }
		else
			{ echo $buffer; } 
	curl_close($ch);

}


public function getKey()
{

}


}

?>




