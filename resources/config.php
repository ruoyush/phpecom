<?php

ob_start();

session_start();

defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);

defined("TEMPLATE_FRONT")? null : define ("TEMPLATE_FRONT", __DIR__ . DS . "/templates/front");

defined("TEMPLATE_BACK")? null : define ("TEMPLATE_BACK", __DIR__ . DS . "/templates/back");

defined("UPLOAD_DIR")? null : define ("UPLOAD_DIR", __DIR__ . DS . "/uploads");

defined("ADMIN_AREA")? null : define ("ADMIN_AREA", __DIR__ . DS . "../ecom/public/admin");

defined("DB_HOST")? null : define ("DB_HOST", "localhost:3306");

defined("DB_USER")? null : define ("DB_USER", "root");

defined("DB_PASS")? null : define ("DB_PASS", "palpal123");

defined("DB_NAME")? null : define ("DB_NAME", "db_project");

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

require_once("functions.php");
require_once("cart.php");


?>