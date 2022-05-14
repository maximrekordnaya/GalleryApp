<?php 

if(!isset($_POST['frm_upload'])){
?>

<div class="col-sm-12 col-md-8 col-lg-4">
    <h1 class="display-6 mb-3">Image uploading...</h1>
    <form action="index.php?page=load" method="POST" enctype="multipart/form-data">
        <!-- <input type="file" id="date-input" name="date_input">
        <input type="hidden" name="MAX_FILE_SIZE" value="111111">
        <input type="submit" name="file_sbmt">
        <input type="hidden" name="file_get"> -->
        <input type="hidden" name="MAX_FILE_SIZE" value="1111111">
        <div class="mb-3">
            <label for="img_file" class="form-label">Default file input example</label>
            <input class="form-control" type="file" id="img_file" accept="image/*" name="user_image">
        </div>
        <input type="hidden" name="frm_upload"> 
        <button class="btn btn-primary" type="submit">Load</button>
    </form>
</div>

<?php
}else{
    require_once(ROOT . '/services/notify_service.php');
    if($_FILES['user_image']['error']>0){
        notify("Upload error: " . $_FILES['user_image']['error'], 'alert-warning');  
    }else{
        if(is_uploaded_file($_FILES['user_image']['tmp_name'])){
            $dest = STORAGE . '/' . $_SESSION['hash'] . '/' . $_FILES['user_image']['name'];
            move_uploaded_file($_FILES['user_image']['tmp_name'], $dest);
            notify("File was uploaded", 'succes');
        }
    }
    
    
    
}
?>