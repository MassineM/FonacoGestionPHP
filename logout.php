<?php

session_start();
session_unset();
session_destroy();
if ( session_status() == PHP_SESSION_NONE){ $in = 1 ;}

header("location: index.php");
?>