<?php
session_start();
session_unset();   // Clear all session variables
session_destroy(); // Destroy the session

// Redirect to login page or homepage
header("Location: ./user_action.php");
exit;
