<?php 

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Attributes
$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: [__DIR__ . '/../src/model'],
    isDevMode: true,
);

$connectionParams = [
    'driver'   => 'pdo_pgsql',
    'user'     => 'postgres',
    'password' => 'teste123',
    'dbname'   => 'teste_backend',
    'host'     => 'db',
    'port'     => '5432',
];

// configuring the database connection
$connection = DriverManager::getConnection($connectionParams, $config);

// obtaining the entity manager
$entityManager = new EntityManager($connection, $config);
return $entityManager;