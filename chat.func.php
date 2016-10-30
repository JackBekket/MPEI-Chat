<?php
/**
 * Date: 10/15/2016
 * Time: 9:45 AM
 */
// require_once('connect.db.php');
//include('connect.db.php');




function get_msg()
{
  include("connect.db.php");
/*
    $query = "SELECT * FROM chatDB1.chat";
*/

$query = "SELECT * FROM pm2016.chat_ponomarev";
    $run = mysqli_query($connection,$query);
    $messages = array();
    while($message = mysqli_fetch_assoc($run))
    {
        $messages[] = array('sender'=>$message['sender'],
            'message'=>$message['message']);
    }
    return $messages;
}
function send_msg($sender,$message)
{
  include("connect.db.php");
    if(!empty($sender)&&!empty($message))
    {
        $sender = mysqli_real_escape_string($connection,$sender);
        $message = mysqli_real_escape_string($connection,$message);

      //  $query = "INSERT INTO chatDB1.chat VALUES(null,'{$sender}','$message')";

        $query = "INSERT INTO pm2016.chat_ponomarev VALUES('{$sender}','$message')";

        if($run = mysqli_query($connection,$query))
        {
            return true;
        }
        else
            return false;
    }
    else
    {
        return false;
    }
}

//GenericSaltSimple
function salt()
 {
	$salt = substr(md5(uniqid()), -8);
	return $salt;
 }
?>
