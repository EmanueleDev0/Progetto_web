<?php

session_start();

session_destroy(); //termine della sessione

header("Location: index.php");
exit;
?>