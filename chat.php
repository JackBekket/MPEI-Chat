<?php
require('connect5.db.php');
require('chat.func.php');
$messages = get_msg();
foreach($messages as $message)
{
    echo "\n".$message['sender'].": ";
    echo $message['message'];
}
?>
