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

    $query = "SELECT * FROM chatDB1.chat";
    $run = mysqli_query($connection,$query);
    $messages = array();
    while($message = mysqli_fetch_assoc($run))
    {
        $messages[] = array('sender'=>$message['Sender'],
            'message'=>$message['Message']);
    }
    return $messages;
}
function send_msg($sender,$message)
{
  include("connect.db.php");
    if(!empty($sender)&&!empty($message))
    {
        $sender = mysqli_real_escape_string($sender);
        $message = mysqli_real_escape_string($message);

      //  $query = "INSERT INTO chatDB1.chat VALUES(null,'{$sender}','$message')";

        $query = "INSERT INTO chatDB1.chat VALUES('{$sender}','$message')";

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
?>
