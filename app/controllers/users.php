
<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validateUser.php");

$username = "";
$email = "";
$password = "";
$passwordConf = "";

if(isset($_POST['register-btn'])){
     
    $errors = validateUser($_POST);

    if(count($errors) === 0){
        unset($_POST['register-btn'], $_POST['password-conf']);
        $_POST['admin'] = 0;
    
        $_POST['password'] = password_hash($_POST['password'],PASSWORD_DEFAULT);
    
    
        $userid = create("users", $_POST);
    
        $user = selectOne("users", ['id' => $userid]);
    
        dd($user);

    }else{
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['password-conf'];
    }
   
}



?>