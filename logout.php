<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
echo "<script>
              alert('Logout Account.');
              window.location.href='http://localhost/kirablogspot/';
              </script>";
exit;
?>