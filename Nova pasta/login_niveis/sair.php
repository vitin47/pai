<?php
unset ($_SESSION['login']);
setcookie ("login", "", (time() - 1), "/");
session_destroy();
header ("Location: ".SYS_ROOT_DIR);
?>