// logout.php
<?php
session_start();
session_unset(); // Remove all session variables
session_destroy(); // Destroy the session
header("Location: admin.php");
exit();
?>
