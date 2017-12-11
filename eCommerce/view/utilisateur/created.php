<div style="display: flex;">
<img src="view/images/fleche.png" height="25px">
<h6 style="margin: 2px ">L'utilisateur a bien été update !</h6>
</div>
<?php
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    /* if(isset($message)){
        echo $message;
    } */
    require File::build_path(array('view', 'utilisateur', 'list.php'));
?>