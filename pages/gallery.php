<div class="col-sm-12 col-md-8 col-lg-4">
    <h1 class="display-6">Files</h1>
</div>
<?php
$album_dir = $_SESSION['hash'];
$path = STORAGE . '/' . $_SESSION['hash'];
$images = array_diff(scandir($path), ['.', '..']);

foreach($images as $image):
?>
    <a href="<?php echo 'storage/' . $album_dir . '/' . $image ?>" target="_blank">
        <img class="photo img-fluid" src="<?php echo 'storage/' . $album_dir . '/' . $image ?>" alt="<?=  $image ?>">
    </a>
<?php
endforeach;
?>
