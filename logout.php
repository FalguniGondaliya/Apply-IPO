<?php
setcookie("unm",$_COOKIE["unm"],time()-3600);
header("location:login.php");
?>