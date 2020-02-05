document.getElementById('form_call').onsubmit = function(){
    document.getElementById("emp_first_name_error").innerHTML = " "; 
    document.getElementById("emp_last_name_error").innerHTML = " "; 
    document.getElementById('emp_code_name_error').innerHTML = " ";
    document.getElementById('emp_domain_error').innerHTML = " ";
    if(emp_first_name() && emp_last_name() && emp_domain() && emp_code_name()){
        return true;
    }
     else{
         return false;
     }
    
}

function emp_first_name(){
    var valid_input = /^[a-zA-Z]+$/;
    console.log("hello1");
    var input = document.getElementById('emp_first_name').value ;
    if(input.trim().match(valid_input)){
    return true;
    }else{
        document.getElementById("emp_first_name_error").innerHTML = "invalid input";    
        return false;
    }
}

function emp_last_name(){
    var valid_input = /^[a-zA-Z]+$/;
    console.log("hello1");
    var input = document.getElementById('emp_last_name').value ;
    if(input.trim().match(valid_input)){
    return true;
    }else{
        document.getElementById("emp_last_name_error").innerHTML = "invalid input";    
        return false;
    }
}
function emp_code_name(){
    var valid_input = /^[a-zA-Z]{2}_[a-zA-Z]+$/;
    var input  = document.getElementById('emp_code_name').value;
    if(input.trim().match(valid_input)){
        return true;
    }else{
        document.getElementById('emp_code_name_error').innerHTML = "Invalid Input";
        return false;
    }
}

function emp_domain(){
    var input = document.getElementById('emp_domain').value;
    console.log(input);

    var valid_input = /^[a-zA-Z]+ *[a-zA-Z]+$/;
    console.log("hello5");
    // Console.log(input);
     if(input.match(valid_input)){
         return true;
        // return false;
     }else{
         console.log("eeor");
         document.getElementById('emp_domain_error').innerHTML = "Invalid Input";
         return false;
     }
  
}
