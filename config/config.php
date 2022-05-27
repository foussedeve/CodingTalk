<?php
$options= [PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'];
define("DB_NAME","digital");
define("DB_HOST","localhost");
define("DB_PASSWORD","");
define("DB_USER","root");
define("DNS","mysql:dbname=".DB_NAME.";host=".DB_HOST);
define("OPTIONS",$options);
define("HTTP_REDIRECT", "Location:http://".$_SERVER["HTTP_HOST"]);
define("BASE_NAME","../src/");
define("VIEW_PATH","../src/Views/");
define("DS",DIRECTORY_SEPARATOR);
define("PUBLIC_PATH","../public/");
