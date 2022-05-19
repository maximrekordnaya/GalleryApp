

<!-- <link rel="stylesheet" href="./style/style.css"> -->
<?php
if(!isset($_POST['frm_registration'])){

?>

<div class="col-sm-12 col-md-8 col-lg-4">
<h1 class="display-6 mb-3">Registration</h1>
    <form action="index.php?page=registration" method="POST" id="formReg">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <div class="_email valid-error hidden" id="email-error">Check if your email is correct</div>
            <input type="email" name="useremail" class="form-control _req _email" id="email">
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Password</label>
            <div class="_pass valid-error hidden" id="pass-error">The password must contain at least 6 characters, a number, capital letters and small letters.</div>
            <input type="password" name="pass" class="form-control _req _pass" id="pass">
        </div>
        <div class="mb-3">
            <label for="confirm_pass" class="form-label">Password</label>
            <div class="_confirm valid-error hidden" id="confirm-error">Passwords do not match</div>
            <input type="password" name="confirm_pass" class="form-control _req _confirm" id="confirm_pass">
        </div>

        <input type="hidden" name="frm_registration">

        <button type="submit" id="btn" class="btn btn-primary">SAVE</button>


    </form>
</div>
<script src="../js/validation.js"></script>
<?php

}
else{
    // var_dump($_POST['frm_registration']);
    // require_once($ROOT . '/services/validation_server.php');
    // $valid = registrationValidation();
    // dd($valid);
    
    require_once(ROOT . '/services/validation_server.php');
    require_once(ROOT . '/services/notify_service.php');
    require_once(ROOT . '/services/auth_service.php');
    $valid = registrationValidation();
    //  dd($valid);
     if(!$valid['succes']){
         foreach($valid['errors'] as $error)
         {
             notify($error, 'alert-danger');
         }
     }else{
         if(!signup($_POST['useremail'], $_POST['pass'])){
             notify('You are alredy registered', 'warning');
         }else{
             $albumName = md5($_POST['useremail']);
             $path = STORAGE . '/' .md5($_POST['useremail']);
             if(!file_exists($path)){
                 mkdir($path, 0777, true);
             }
             notify('All OK', 'warning');
         }
     }

}

?>

