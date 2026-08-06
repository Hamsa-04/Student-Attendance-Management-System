<?php
include 'db.php';

if(isset($_GET['search']) && $_GET['search'] != "")
{
    $search = $_GET['search'];
    $query = "SELECT * FROM students
              WHERE student_name LIKE '%$search%'";
}
else
{
    $query = "SELECT * FROM students";
}

$result = mysqli_query($conn, $query);
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Students</title>
    <style>
        table{
            border-collapse: collapse;
            width: 80%;
        }
        table, th, td{
            border:1px solid black;
            padding:10px;
            text-align:center;
        }
        th{
            background:#f2f2f2;
        }
    </style>
</head>
<body>

<h1>Student List</h1>

<table>
<tr>
    <th>ID</th>
    <th>Student Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Edit</th>
    <th>Delete</th>
</tr>


<?php
while($row = mysqli_fetch_assoc($result)){
?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['student_name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['phone']; ?></td>

    <td>
        <a href="edit_student.php?id=<?php echo $row['id']; ?>">Edit</a>
    </td>

    <td>
        <a href="delete_student.php?id=<?php echo $row['id']; ?>"
           onclick="return confirm('Are you sure you want to delete this student?');">
            Delete
        </a>
    </td>
</tr>
<?php
}
?>
<form method="GET">
    <input type="text" name="search" placeholder="Enter student name">
    <input type="submit" value="Search">
</form>

<br>

</table>

<br>
<a href="index.php">⬅ Back to Dashboard</a>

</body>
</html>