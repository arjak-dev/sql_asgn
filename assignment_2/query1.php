<?php

    $connection = new mysqli('localhost','root','Word@579','Emp');
    if($connection){
      //  echo "connection successful";
    }
    $q=$_GET['q'];
    switch($q){

    case 1:
    $sql = "select employee_first_name from employee_detail_table where employee_id in (select employee_id from employee_salary_table where employee_salary>50000)";
    // print_r($result);
    echo "<table border = '2px solid black'>";
    echo "<th> Employee_first_name</th>";
    if($result = $connection->query($sql)){
        
        while($row = $result->fetch_assoc()){
           echo "<tr>";
           echo "<td>".$row['employee_first_name']."</td>";
           echo "</tr>";
        }
        echo "</table>";
        // print_r($result->fetch_assoc());
        $result -> free();
    }else 
        "$connection ->error";
    $connection->close();
    break;
    case 2:
        $sql = "select employee_last_name from employee_detail_table where graduation_percentile>70";
        echo "<table border = '2px solid black'>";
        echo "<th> Employee_last_name</th>";
    if($result = $connection->query($sql)){
        
        while($row = $result->fetch_assoc()){
           echo "<tr>";
           echo "<td>".$row['employee_last_name']."</td>";
           echo "</tr>";
        }
        echo "</table>";
        // print_r($result->fetch_assoc());
        $result -> free();
    }else 
        "$connection ->error";
    $connection->close();
    break;
    case 3:
        $sql = "select employee_last_name from employee_detail_table where graduation_percentile<70";
        echo "<table border = '2px solid black'>";
        echo "<th> Employee_last_name</th>";
    if($result = $connection->query($sql)){
        
        while($row = $result->fetch_assoc()){
           echo "<tr>";
           echo "<td>".$row['employee_last_name']."</td>";
           echo "</tr>";
        }
        echo "</table>";
        // print_r($result->fetch_assoc());
        $result -> free();
    }else 
        "$connection ->error";
    $connection->close();
    break;
    case 4:
        $sql = "select employee_first_name,employee_last_name from employee_detail_table where employee_id in(select employee_id from employee_salary_table where employee_code in(select employee_code from employee_code_table where not employee_domain= 'Java'))";
        echo "<table border = '2px solid black'>";
        echo "<tr>";
        echo "<th> Employee_first_name</th>";
        echo "<th> Employee_last_name</th>";
        echo "</tr>";
        if($result = $connection->query($sql)){
        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$row['employee_first_name']."</td>";
            echo "<td>".$row['employee_last_name']."</td>";
            echo "</tr>";
         }
         echo "</table>";
         // print_r($result->fetch_assoc());
         $result -> free();
     }else 
     $connection->close();
     break;
     case 5:
        $sql = "select SUM(es.employee_salary) as salary_sum, ec.employee_domain from employee_salary_table es inner join employee_code_table ec on es.employee_code = ec.employee_code group by ec.employee_domain";
        if ($result = $connection->query($sql)){
            echo "<table border = '2px solid black'>";
            echo "<tr>";
            echo "<th>Salary_Sum</th>";
            echo "<th>Employee_Domain</th>";
            echo "</tr>";
            while($row= $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$row['salary_sum']."</td>";
                echo "<td>".$row['employee_domain']."</td>";
                echo "</tr>";
            }
            echo "</tr>";
            $result ->free();

        }else 
            "$connection ->error";
        $connection->close();
    break;
    case 6:
        $sql = "select SUM(es.employee_salary) as salary_sum , ec.employee_domain from employee_salary_table es inner join employee_code_table ec on es.employee_code = ec.employee_code where es.employee_salary>30000 group by ec.employee_domain";
        if ($result = $connection->query($sql)){
            echo "<table border = '2px solid black'>";
            echo "<tr>";
            echo "<th>Salary_Sum</th>";
            echo "<th>Employee_Domain</th>";
            echo "</tr>";
            while($row= $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$row['salary_sum']."</td>";
                echo "<td>".$row['employee_domain']."</td>";
                echo "</tr>";
            }
            echo "</tr>";
            echo "</table>";
            $result ->free();

        }else 
            "$connection ->error";
        $connection->close();
    break;
    case 7:
        $sql = "select es.employee_id from employee_salary_table es inner join employee_code_table ec where ec.employee_code is NULL";
        $result = $connection->query($sql);
       
         if(mysqli_num_rows($result)){
            
        }else{
            echo "empty set";
         }
        break;
    }

?>