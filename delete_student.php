<?php
include 'db.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    // Delete attendance records first
    mysqli_query($conn, "DELETE FROM attendance WHERE student_id='$id'");

    // Then delete the student
    mysqli_query($conn, "DELETE FROM students WHERE id='$id'");

    header("Location: view_students.php");
    exit();
}
?>