<?php
/**
 * Date: 10/15/2016
 * Time: 9:44 AM
 */
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '15797';
$db_name = 'chatDB';

$stat_mes1;
$stat_mes2;

if($connection = mysql_connect($db_host,$db_user,$db_pass))
{
    $stat_mes1 = 'Connected to Database Server... ';
    if($database = mysql_select_db($db_name,$connection))
    {
        $stat_mes2 = 'Database has been selected... ';
    }
    else
    {
        $stat_mes2 = 'Database was not found';
    }
}
else
{
    $stat_mes1 = 'Unable to connect to MySQL Server!';
}
?>