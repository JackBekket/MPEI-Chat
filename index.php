<html>
<head>
    <title>Chat</title>
    <link rel="stylesheet" type="text/css" href="chat_style.css">
</head>
<body>
<h2>Mini-chat! <a href="logout.php">Want to logout</a></h2>

<?php
/**
 * Date: 10/15/2016
 * Time: 9:45 AM
 */
require('core.inc.php');
$mes_s ='';
if(isset($_POST['send']))
{
    if(send_msg($_POST['sender'],$_POST['message']))
    {
        $mes_s = 'Message was sent';;
    }
    else
        $mes_s = 'Message failed to sent!';
}
?>

<div id="messages">
    <?php
    echo $stat_mes1;
    echo $stat_mes2;
    echo $mes_s;
    ?>
</div>

<script language="JavaScript" type="text/javascript" src="https://comet-server.ru/template/Profitable_site/js/jquery-2.0.3.min.js"></script>
<script language="JavaScript" type="text/javascript" src="chat.mes.js"></script>

<?php
session_start();
$user_str;
if(!isset($_SESSION["sess_user"])){
    header("location:login.php");
} else {
    $user_str = $_SESSION["sess_user"];
    ?>
    <form action="index.php" method="post">
        <div id="ChatForm"> <textarea readonly name="main-textarea" id="ChatMainID"></textarea></div>
        <div id="NameForm">
            <textarea readonly name="sender" id="ChatTextID"><?php echo $user_str; ?> </textarea>
        </div>
        <div id="TextForm"> <textarea name="message" id="ChatTextID" placeholder="Please send a message!"></textarea><br>
            <input type="submit" name="send" value="Send message!"/>
        </div>
    </form>
    <?php
}
?>

</body>
</html>
