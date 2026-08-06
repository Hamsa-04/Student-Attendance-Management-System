<?php
include 'db.php';
if(isset($_POST['submit'])){

    $name = $_POST['student_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    $sql = "INSERT INTO students(student_name,email,phone,course)
            VALUES('$name','$email','$phone','$course')";

    if(mysqli_query($conn,$sql)){
        echo "Student Added Successfully ✅";
    }
    else{
        echo "Error: ".mysqli_error($conn);
    }
}

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">
<h3>Add Student</h3>
</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">
<label>Name</label>
<input type="text" name="student_name" class="form-control" required>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control">
</div>

<div class="mb-3">
<label>Phone</label>
<input type="text" name="phone" class="form-control">
</div>

<button class="btn btn-success" name="submit">
Add Student
</button>

<a href="index.php" class="btn btn-secondary">
Back
</a>

</form>

</div>

</div>

</div>