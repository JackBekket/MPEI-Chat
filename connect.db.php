<?php
/**
 * Date: 10/15/2016
 * Time: 9:44 AM
 */

/**
* THIS IS REMASTERED TO PHP7 (!!) not php5
**/

$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'admin';
$db_name = 'chatDB1';

$stat_mes1;
$stat_mes2;

if($connection = mysqli_connect($db_host,$db_user,$db_pass))
{
    $stat_mes1 = 'Connected to Database Server... ';
    if($database = mysqli_select_db($connection,$db_name))
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
