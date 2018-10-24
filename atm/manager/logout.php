<?php
session_start();// to destroy login
session_destroy();
echo "<script>window.open('index.php','_self');</script>";
?>