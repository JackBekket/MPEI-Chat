<?php
require('connect.db.php');
require('chat.func.php');
$messages = get_msg();
foreach($messages as $message)
{
    echo "\n".$message['sender'].": ";
    echo $message['message'];
}
?>
