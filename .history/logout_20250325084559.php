<?php
session_start();
session_destroy();
header('Location: ../public/index.php?msg=loggedout');
exit();
?>
