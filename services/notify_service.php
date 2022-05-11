<?php

function notify(string $message, string $type):void
{
    if($message){
        ?>
<div class="alert <?php echo $type ?> d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
        <use xlink:href="#exclamation-triangle-fill" />
    </svg>
    <div>
    <?=$message ?>
    </div>
</div>

<?php
    }

}

?>