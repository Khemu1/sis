<?php
session_start();
session_destroy();
header("location: http://sis.test/views/php/login.php");
exit();