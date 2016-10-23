<!doctype html>
<html>
<head>
    <title>Login page</title>
</head>
<body>

<p><a href="register.php">Register</a> | <a href="login.php">Login</a></p>
<h3>Login Form</h3>
<form action="" method="POST">
    Username: <input type="text" name="user"><br />
    Password: <input type="password" name="pass"><br />
    <input type="submit" value="Login" name="submit" />
</form>
<?php
if(isset($_POST["submit"])){

    if(!empty($_POST['user']) && !empty($_POST['pass'])) {
        $user=$_POST['user'];
        $pass=$_POST['pass'];

        $con=mysql_connect('localhost','root','15797') or die(mysql_error());
        mysql_select_db('chatDB') or die("cannot select DB");

        $query=mysql_query("SELECT * FROM login WHERE username='".$user."' AND password='".$pass."'");
        $numrows=mysql_num_rows($query);
        if($numrows!=0)
        {
            while($row=mysql_fetch_assoc($query))
            {
                $dbusername=$row['username'];
                $dbpassword=$row['password'];
            }

            if($user == $dbusername && $pass == $dbpassword)
            {
                session_start();
                $_SESSION['sess_user']=$user;

                /* Redirect browser */
                header("Location: index.php");
            }
        } else {
            echo "Invalid username/password!";
        }

    } else {
        echo "Fill all fields!";
    }
}
?>

</body>
</html>