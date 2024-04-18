<?php
session_start();
session_destroy();
header("location: http://sis.test/website/index.php");
exit();