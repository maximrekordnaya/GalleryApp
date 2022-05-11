<?php
function signup(string $email, string $pass){
    //file_get_contents()
    //file_put_contant()

    //json_decode
    //jsom_decode
    $users = json_decode(file_get_contents( DB_USERS), true);
    if(in_array($email, array_column($users, 'email'))){
        return false;
    }
    $user = [
        'email' => $email,
        'pass' => md5($pass),
    ];
    $users[] = $user;
    
    file_put_contents(DB_USERS, json_encode($users));
    return true;

}

function signin(string $email, string $pass):bool
{
    $users = json_decode(file_get_contents( DB_USERS), true);
    // dump($email);
    // dd($pass);
   
    if(!in_array($email, array_column($users, 'email'))){
        return false;
    }
    $user = $users[array_search($email, array_column($users, 'email'))];
    
    return $user['pass'] === md5($pass);
}

function isLogin(){
    return $_SESSION['login'];
}

?>