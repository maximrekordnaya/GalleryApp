<?php
if(!isset($_POST['frm_login'])){

?>
<div class="col-sm-12 col-md-8 col-lg-4">
<h1 class="display-6 mb-3">Login</h1>
    <form action="index.php?page=login" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="useremail" class="form-control" id="email">
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Password</label>
            <input type="password" name="pass" class="form-control" id="pass">
        </div>
        <input type="hidden" name="frm_login">
        <button type="submit" class="btn btn-primary">SAVE</button>
    </form>
</div>
<?php
}
else{   
    require_once(ROOT . '/services/validation_server.php');
    require_once(ROOT . '/services/notify_service.php');
    require_once(ROOT . '/services/auth_service.php');
    
     $valid = loginValidation();
     if(!$valid['succes']){
         foreach($valid['errors'] as $error)
         {
             notify($error, 'alert-danger');
         }
     }else{
         if(!signin($_POST['useremail'], $_POST['pass'])){
                notify('Email or pass invalid', 'alert-danger');
         }else{
             $_SESSION['login'] = true;
             header('Location: index.php');
            
         }
     }

}

?>