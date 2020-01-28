<?php
// echo "error";
$servername = "localhost";
$username = "root";
$password = "Word@579";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn -> select_db('Emp');
if(isset($_POST)){
    $emp_name = $_POST['emp_name'];
    $emp_last_name = $_POST['emp_last_name'];
    $emp_salary = $_POST['emp_salary'];
    $emp_percentage = $_POST['emp_percentage'];
    $emp_doamin = $_POST['emp_doamin'];
    $emp_code_name = $_POST['emp_code_name'];
}
//echo "$emp_name $emp_last_name $emp_salary $emp_percentage $emp_doamin";
$sql = "insert into employee_code_table(employee_name,employee_code_name,employee_domain) values ('$emp_name','$emp_code_name','$emp_doamin')";
if($conn->query($sql)){
    echo "new record added sucessfully";
} 
$id = $conn-> insert_id;
$sql = "insert into employee_salary_table(employee_const,employee_salary,employee_code) value ('RU','$emp_salary','$id')";
if($conn->query($sql)){
    echo "new record added sucessfully";

} 
$id = $conn->insert_id;

$sql = "insert into employee_detail_table(employee_const,employee_id,employee_first_name,employee_last_name,graduation_percentile) values('RU','$id','$emp_name','$emp_last_name','$emp_percentage')";
if($conn->query($sql)){
    echo "new record added sucessfully";
    header("Location:index.html");
}
 elseif($conn->error){
    echo "$conn->error";
}
?>