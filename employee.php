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

if (isset($_POST['insert'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $job = $_POST['job'];
    $date_joining = $_POST['date_joining'];
    $bank_no = $_POST['bank_no'];
    $salary = $_POST['salary'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO employees (name, email, phone, job, date_joining, bank_no, salary, gender)
            VALUES ('$name', '$email', '$phone', '$job', '$date_joining', '$bank_no', '$salary', '$gender')";

    if ($conn->query($sql) === TRUE) {
        header('Location: employee_list.php');
        exit();
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
    $date_joining = $_POST['date_joining'];
    $bank_no = $_POST['bank_no'];
    $salary = $_POST['salary'];
    $gender = $_POST['gender'];

    $sql = "UPDATE employees SET name='$name', email='$email', phone='$phone', job='$job', date_joining='$date_joining', bank_no='$bank_no', salary='$salary', gender='$gender' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header('Location: employee_list.php');
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM employees WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header('Location: employee_list.php');
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
