<?php
/**
 * Date: 10/15/2016
 * Time: 9:45 AM
 */
function get_msg()
{
    $query = "SELECT * FROM chatDB.chat";
    $run = mysqli_query($query);
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
    if(!empty($sender)&&!empty($message))
    {
        $sender = mysqli_real_escape_string($sender);
        $message = mysqli_real_escape_string($message);
        $query = "INSERT INTO chatDB.chat VALUES(null,'{$sender}','$message')";
        if($run = mysqli_query($query))
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
