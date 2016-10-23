<!doctype html>
<html>
<head>
    <title>Register</title>
</head>
<body>

<p><a href="register.php">Register</a> | <a href="login.php">Login</a></p>
<h3>Registration Form</h3>
<form action="" method="POST">
    Username: <input type="text" name="user"><br />
    Password: <input type="password" name="pass"><br />
    <input type="submit" value="Register" name="submit" />
</form>
<?php
if(isset($_POST["submit"])){

    if(!empty($_POST['user']) && !empty($_POST['pass'])) {
        $user=$_POST['user'];
        $pass=$_POST['pass'];

        $con=mysql_connect('localhost','root','15797') or die(mysql_error());
        mysql_select_db('chatDB') or die("cannot select DB");

        $query=mysql_query("SELECT * FROM login WHERE username='".$user."'");
        $numrows=mysql_num_rows($query);
        if($numrows==0)
        {
            $sql="INSERT INTO login(username,password) VALUES('$user','$pass')";

            $result=mysql_query($sql);


            if($result){
                echo "Account was created";
            } else {
                echo "Failure!";
            }

        } else {
            echo "That username already exists! Enter another.";
        }

    } else {
        echo "Fill all fields!";
    }
}
?>

</body>
</html>