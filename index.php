<?php
// Start the session
session_start();
$_SESSION['check'] = 1;
header('location: step1.php');
