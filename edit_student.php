<?php
include 'db.php';

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM students WHERE id='$id'");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $name=$_POST['student_name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];

    mysqli_query($conn,"UPDATE students
    SET student_name='$name',
        email='$email',
        phone='$phone'
    WHERE id='$id'");

    header("Location: view_students.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Student</title>
</head>
<body>

<h2>Edit Student</h2>

<form method="POST">

Name<br>
<input type="text" name="student_name"
value="<?php echo $row['student_name']; ?>"><br><br>

Email<br>
<input type="email" name="email"
value="<?php echo $row['email']; ?>"><br><br>

Phone<br>
<input type="text" name="phone"
value="<?php echo $row['phone']; ?>"><br><br>

<input type="submit" name="update" value="Update Student">

</form>

</body>
</html>