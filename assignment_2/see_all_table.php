<?php

echo "<b>Employee code Table<b>";
$sql = "select * from employee_code_table";
table_display($sql);
echo "</br>";

echo "<b>Employee Salary Table<b>";
$sql = "select * from employee_salary_table";
table_display($sql);
echo "</br>";


echo "<b>Employee Details Table<b>";
$sql = "select * from employee_detail_table";
table_display($sql);
echo "</br>";


function table_display($sql){
    $connection =  new mysqli('localhost','root','Word@579','Emp');
    if($connection){
    // echo "connection successful";
    echo "</br>";
    }

    $result = $connection->query($sql);

    if(mysqli_num_rows($result)>0){
        echo "<table border = '2px solid black'>";
            $i = 1;
        while($row = $result->fetch_assoc()){
            // print_r($row);
            //echo "</br>";
            if($i == 1){
                echo "<tr>";
                foreach($row as $name => $val){
                    echo "<td>".$name."</td>";
                }
                echo "</tr>";
                $i +=1;
            }else{
                echo "<tr>";
                foreach($row as $name=>$val){

                    echo "<td>".$val."</td>";
                    
                }
                echo "</tr>";
            }    
        }
        echo "</table>";
        $result ->free();
        $connection -> close();
    }else{
        echo "Empty Table";
    }
}


?>