<?php
unset($_SESSION['Name']);
session_destroy();
header("location:../html/login.html");


?>