form_call.onsubmit = function(){
    var valid_input = /^[a-zA-Z]+$/;
    if(document.getElementById('emp_first_name').value.match(valid_input)){
        return true;
    }else if(document.getElementById('emp_last_name').value.match(valid_input)){
        return true;
    }else if(document.getElementById('emp_domain').value.match(valid_input)){
        return true;
    }
    else{
        console.log("hello");
        return false;
    }
}
