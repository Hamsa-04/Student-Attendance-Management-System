<?php
session_start();
include 'db.php';

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admin
              WHERE username='$username'
              AND password='$password'";

    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result)>0)
    {
        $_SESSION['admin']=$username;
        header("Location:index.php");
        exit;
    }
    else
    {
        $error="Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
</head>

<body>

<h2>Admin Login</h2>

<?php
if(isset($error))
{
    echo "<p style='color:red;'>$error</p>";
}
?>

<form method="POST">

Username<br>
<input type="text" name="username" required><br><br>

Password<br>
<input type="password" name="password" required><br><br>

<input type="submit" name="login" value="Login">

</form>

</body>
</html>