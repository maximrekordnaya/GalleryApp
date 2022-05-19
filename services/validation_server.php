<?php
function registrationValidation():array
{
    $passReg = '/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{6,}/';
    $emailReg = '/^([\w\!\#$\%\&\'\*\+\-\/\=\?\^\`{\|\}\~]+\.)*[\w\!\#$\%\&\'\*\+\-\/\=\?\^\`{\|\}\~]+@((((([a-z0-9]{1}[a-z0-9\-]{0,62}[a-z0-9]{1})|[a-z])\.)+[a-z]{2,6})|(\d{1,3}\.){3}\d{1,3}(\:\d{1,5})?)$/';
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
    if(preg_match($emailReg, $email)==0){
        $result['errors'][]= "wtf";
    }
    if(preg_match($passReg, $pass)==0){
        $result['errors'][]= "wtf2";
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