<?php
session_start();
unset($_SESSION['a_email']);
echo "<script>window.location.href='a_signin.php'</script>";

?>