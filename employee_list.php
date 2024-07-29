<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, email, phone, job, date_joining, bank_no, salary, gender FROM employees";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="title">
    <h1><span>E</span>mployee List</h1>
    </div>
    <table class="table table-striped" id="employeeTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Job</th>
                <th>Date of Joining</th>
                <th>Bank Number</th>
                <th>Salary</th>
                <th>Gender</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"]. "</td>";
                    echo "<td>" . $row["name"]. "</td>";
                    echo "<td>" . $row["email"]. "</td>";
                    echo "<td>" . $row["phone"]. "</td>";
                    echo "<td>" . $row["job"]. "</td>";
                    echo "<td>" . $row["date_joining"]. "</td>";
                    echo "<td>" . $row["bank_no"]. "</td>";
                    echo "<td>" . $row["salary"]. "</td>";
                    echo "<td>" . $row["gender"]. "</td>";
                    echo '<td><button class="edit btn btn-primary" data-id="'.$row["id"].'">Edit</button>';
                    echo '<button class="delete btn btn-danger" data-id="'.$row["id"].'">Delete</button></td>';
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='10'>No employees found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>
<script src="script.js"></script>
</body>
</html>
