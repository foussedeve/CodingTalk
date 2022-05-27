<?php
require implode(DIRECTORY_SEPARATOR,[dirname(__DIR__),"vendor","autoload.php"]);
 $entityManager = require 'bootstrap.php';
return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);


