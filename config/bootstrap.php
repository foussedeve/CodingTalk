<?php 
require implode(DIRECTORY_SEPARATOR,[dirname(__DIR__),"vendor","autoload.php"]);
use Doctrine\ORM\Configuration;
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

$config = new Configuration;


$driverImpl = $config->newDefaultAnnotationDriver(implode(DIRECTORY_SEPARATOR,[dirname(__DIR__),"src","Models"]),false);
$config->setMetadataCache($metadataCache);
$config->setMetadataDriverImpl($driverImpl);
$config->setQueryCache($queryCache);
$config->setProxyDir(implode(DIRECTORY_SEPARATOR,[dirname(__DIR__),"src","Proxies"]));
$config->setProxyNamespace('Graph\Proxies');

if ($applicationMode == "development") {
    $config->setAutoGenerateProxyClasses(true);
} else {
    $config->setAutoGenerateProxyClasses(false);
}

// database configuration parameters
$conn = [
     'driver' => 'pdo_mysql',
     'host' => 'localhost',
     'charset' => 'utf8',
     'user' => 'root',
     'password' => '',
     'dbname' => 'poll',
     ];

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);

return $entityManager;