
<p>L'utilisateur a bien été créée !</p>

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