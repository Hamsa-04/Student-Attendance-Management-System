<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Student Attendance Management System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f4f7fc;
}

.card:hover{
    transform:scale(1.05);
    transition:0.3s;
}

</style>

</head>

<body>

<nav class="navbar navbar-dark bg-primary">

<div class="container">

<a class="navbar-brand fw-bold">
🎓 Student Attendance Management System
</a>

<div>

<span class="text-white me-3">
Welcome,
<b><?php echo $_SESSION['admin']; ?></b>
</span>

<a href="logout.php" class="btn btn-danger">
Logout
</a>

</div>

</div>

</nav>

<div class="container mt-5">

<div class="row">

<div class="col-md-3">

<div class="card shadow">

<div class="card-body text-center">

<h3>➕</h3>

<h5>Add Student</h5>

<a href="add_student.php" class="btn btn-primary">
Open
</a>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card shadow">

<div class="card-body text-center">

<h3>👨‍🎓</h3>

<h5>View Students</h5>

<a href="view_students.php" class="btn btn-success">
Open
</a>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card shadow">

<div class="card-body text-center">

<h3>📝</h3>

<h5>Mark Attendance</h5>

<a href="mark_attendance.php" class="btn btn-warning">
Open
</a>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card shadow">

<div class="card-body text-center">

<h3>📅</h3>

<h5>View Attendance</h5>

<a href="view_attendance.php" class="btn btn-info">
Open
</a>

</div>

</div>

</div>

</div>

</div>

</body>
</html>