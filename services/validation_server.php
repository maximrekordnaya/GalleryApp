<?php
function registrationValidation():array
{
    $result = [
        'succes' => false,
        'errors' => [],
    ];
    $email = $_POST['useremail'];
    $pass = $_POST['pass'];
    $confirm = $_POST['confirm_pass'];
    if(!$email || !$pass || !$confirm){
        $result['errors'][]= 'All files are requered';
    }
    if($pass !== $confirm){
        $result['errors'][]= 'Faild confirm password';
    }
    if(!$result['errors']){
        $result['succes'] = true;
    }
    return $result;
}

function loginValidation():array
{
    $result = [
        'succes' => false,
        'errors' => [],
    ];
    $email = $_POST['useremail'];
    $pass = $_POST['pass'];    
    if(!$email || !$pass){
        $result['errors'][]= 'All fields are requered';
    }
    if(!$result['errors']){
        $result['succes'] = true;
    }
    return $result;
}
?>