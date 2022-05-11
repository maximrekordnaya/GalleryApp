


<?php
if(!isset($_POST['frm_registration'])){

?>

<div class="col-sm-12 col-md-8 col-lg-4">
<h1 class="display-6 mb-3">Registration</h1>
    <form action="index.php?page=registration" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="useremail" class="form-control" id="email">
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Password</label>
            <input type="password" name="pass" class="form-control" id="pass">
        </div>
        <div class="mb-3">
            <label for="confirm_pass" class="form-label">Password</label>
            <input type="password" name="confirm_pass" class="form-control" id="confirm_pass">
        </div>

        <input type="hidden" name="frm_registration">

        <button type="submit" class="btn btn-primary">SAVE</button>


    </form>
</div>

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