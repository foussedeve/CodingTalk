<?php 
// bootstrap.php
require implode(DIRECTORY_SEPARATOR,[dirname(__DIR__),"vendor","autoload.php"]);
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\Cache\Adapter\PhpFilesAdapter;

// ...
$applicationMode="development";
if ($applicationMode == "development") {
    $queryCache = new ArrayAdapter();
    $metadataCache = new ArrayAdapter();
} else {
    $queryCache = new PhpFilesAdapter('doctrine_queries');
    $metadataCache = new PhpFilesAdapter('doctrine_metadata');
}


//require_once "../vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
$config = Setup::createAnnotationMetadataConfiguration(array(implode(DIRECTORY_SEPARATOR,[dirname(__DIR__),"src","Models"])), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);
// or if you prefer yaml or XML
// $config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
// $config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

// database configuration parameters

$conn = array(
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/db.sqlite',
);

// obtaining the entity manager
return $entityManager = EntityManager::create($conn, $config);