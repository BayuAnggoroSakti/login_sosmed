<?php 
session_start();
session_unset();
    $_SESSION['id'] = NULL;
    $_SESSION['nama'] = NULL;
    $_SESSION['email'] =  NULL;
header("Location: index.php");        // you can enter home page here ( Eg : header("Location: " ."http://www.krizna.com"); 
?>
