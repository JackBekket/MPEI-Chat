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

        $con=mysqli_connect('localhost','root','admin') or die(mysql_error());
        mysqli_select_db($con,'chatDB1') or die("cannot select DB");

        $user=mysqli_real_escape_string($con,$user);
        $pass=mysqli_real_escape_string($con,$pass);

        $dbusername="u";
        $dbpassword="p";
        $dbsalt="s";


        // $query=mysqli_query($con,"SELECT * FROM login WHERE username='".$user."' AND password='".$pass."'");

        $query=mysqli_query($con,"SELECT * FROM login WHERE username='".$user."'");

        $numrows=mysqli_num_rows($query);
        if($numrows!=0)
        {
            while($row=mysqli_fetch_assoc($query))
            {
                $dbusername=$row['username'];
            //    echo $dbusername;
                $dbpassword=$row['password'];
            //    echo $dbpassword;
            $dbsalt=$row['salt'];
            }


// if(md5(md5($_POST['pass']).$row['salt']) == $row['pass'])

            if($user == $dbusername && md5(md5($pass).$dbsalt)==$dbpassword)
            {
                session_start();
                $_SESSION['sess_user']=$user;

                /* Redirect browser */
                header("Location: index.php");
            }
        } else {
            echo "Invalid username/password!";
            echo " </br>";
            echo $pass;
            echo " </br>";
            echo $dbsalt;
            echo " </br>";
            echo $dbpassword;
            echo " </br>";
            echo md5(md5($pass).$dbsalt);

            echo mysqli_error($con);
          //  echo $sql;
/*
            echo $user;
            echo "/n";
            echo $pass;
            echo "/n";
            echo $dbusername;
            echo "/n";
            echo $dbpassword;
            */
        }

    } else {
        echo "Fill all fields!";
    }
}
?>

</body>
</html>
