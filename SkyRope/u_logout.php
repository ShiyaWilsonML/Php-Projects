<?php

session_start();
unset($_SESSION['u_email']);
echo "<script>window.location.href='u_signin.php'</script>";

?>