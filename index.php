<?php

session_start();

require("core/autoload.php");

$database = new Database();
$database->connect();

$app = new App();

?> yGkcmSrDle