<?php
include 'db.php';

$query = "SELECT students.student_name,
                 attendance.attendance_date,
                 attendance.status
          FROM attendance
          INNER JOIN students
          ON attendance.student_id = students.id
          ORDER BY attendance.attendance_date DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Attendance</title>

    <style>
        table{
            border-collapse: collapse;
            width:80%;
        }

        table,th,td{
            border:1px solid black;
            padding:10px;
            text-align:center;
        }

        th{
            background:#4CAF50;
            color:white;
        }
    </style>
</head>

<body>

<h1>Attendance Records</h1>

<table>

<tr>
    <th>Student Name</th>
    <th>Date</th>
    <th>Status</th>
</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{
?>

<tr>
    <td><?php echo $row['student_name']; ?></td>
    <td><?php echo $row['attendance_date']; ?></td>
    <td><?php echo $row['status']; ?></td>
</tr>

<?php
}
?>

</table>

<br>

<a href="index.php">
<button>Back to Dashboard</button>
</a>

</body>
</html>