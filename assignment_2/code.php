<?php


$servername = "localhost";
$username = "root";
$password = "Word@579";

//---------------------- Create connection---------------------------//
$conn = new mysqli($servername, $username, $password);
$conn -> select_db('Emp');



//------------------------- Check connection---------------------------//
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//------------------------getting data from html form---------------//
if(isset($_POST)){
    $emp_name = $_POST['emp_name'];
    $emp_last_name = $_POST['emp_last_name'];
    $emp_salary = $_POST['emp_salary'];
    $emp_percentage = $_POST['emp_percentage'];
    $emp_doamin = $_POST['emp_doamin'];
}



//---------------------Buliding Employee ID---------------------------------//
$employee_id="";
$sql= "insert into employee_id(const) value('RU')";

if($conn->query($sql)){
    $id = $conn-> insert_id;
    $employee_id = "RU".$id;
}else{
    echo "Employee Id is not generated";
}


//-----------------------------building employee code name---------------------//
$sql = "Select domain_code_name from emp_domain where emp_domain = '$emp_doamin'";
if($result = $conn->query($sql)){
    $emp_domain_code = $result->fetch_row();
    $employee_code_name = $emp_domain_code[0]."_".$emp_name;
}


//---------------building employee code---------------------------------//
$employee_code = "su_".$emp_name;
$employee_code_like= $employee_code.'%';
$row = $result->fetch_row();
$sql ="select count(employee_code) from employee_code_table where employee_code like '$employee_code_like'";
$result = $conn->query($sql);
$count = $result->fetch_row();
if($count[0]>0){
    $employee_code .= $count[0]+1;
}
//---------------Inserting data into employee cdetail table---------//
$sql = "insert into employee_detail_table(employee_id,employee_first_name,employee_last_name,graduation_percentile) values('$employee_id','$emp_name','$emp_last_name','$emp_percentage')";
if($conn->query($sql)){
    echo "new record added sucessfully";
    header("Location:index.html");
}


//---------------------------inserting data in employee_code_table-----------------------------//
$sql = "insert into employee_code_table(employee_code,employee_code_name,employee_domain) values ('$employee_code ',' $employee_code_name','$emp_doamin')";
if($conn->query($sql)){
    echo "new record added sucessfully";
    header("Location:index.html");
}


//-----------------------------inserting data in employee_salary_table-----------------------//
$sql = "insert into employee_salary_table(employee_id,employee_salary,employee_code) value ('$employee_id','$emp_salary','$employee_code')";
if($conn->query($sql)){
    echo "new record added sucessfully";
    header("Location:index.html");
} 


//-----------------------------------printing sql error if any-----------------------------//
else if($conn->error){
    echo "$conn->error";
}
?>