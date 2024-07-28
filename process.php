<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['insert'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $job = $_POST['job'];
    $bank_no = $_POST['bank_no'];
    $date_joining = $_POST['date_joining'];
    $salary = $_POST['salary'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO employees (name, email, phone, job, bank_no, date_joining, salary, gender)
            VALUES ('$name', '$email', '$phone', '$job', '$bank_no', '$date_joining', '$salary', '$gender')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $job = $_POST['job'];
    $bank_no = $_POST['bank_no'];
    $date_joining = $_POST['date_joining'];
    $salary = $_POST['salary'];
    $gender = $_POST['gender'];

    $sql = "UPDATE employees SET name='$name', email='$email', phone='$phone', job='$job', bank_no='$bank_no', date_joining='$date_joining', salary='$salary', gender='$gender' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM employees WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
header("Location: index.html");
exit();
?>
