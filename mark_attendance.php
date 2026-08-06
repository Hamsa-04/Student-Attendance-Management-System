<?php
include 'db.php';
// Save Attendance
if(isset($_POST['submit'])){

    $date = $_POST['date'];

    // Delete old attendance for the selected date
mysqli_query($conn, "DELETE FROM attendance WHERE attendance_date='$date'");

foreach($_POST['attendance'] as $student_id => $status){

    $query = "INSERT INTO attendance(student_id, attendance_date, status)
              VALUES('$student_id','$date','$status')";

    mysqli_query($conn,$query);
}

    echo "<h3 style='color:green;'>Attendance Saved Successfully ✅</h3>";
}

// Fetch Students
$students = mysqli_query($conn, "SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mark Attendance</title>
</head>
<body>

<h1>Mark Attendance</h1>

<form method="POST">

<label>Date:</label>
<input type="date" name="date" required><br><br>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Student Name</th>
    <th>Attendance</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($students)){
?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['student_name']; ?></td>
    <td>
        <select name="attendance[<?php echo $row['id']; ?>]">
            <option value="Present">Present</option>
            <option value="Absent">Absent</option>
        </select>
    </td>
</tr>

<?php
}
?>

</table>

<br>

<input type="submit" name="submit" value="Save Attendance">

</form>

<br>
<a href="index.php">⬅ Back to Dashboard</a>

</body>
</html>