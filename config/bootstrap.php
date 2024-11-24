<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

// Configuração do Doctrine
$isDevMode = true;
$paths = [__DIR__ . '/../src/Model'];

$dbParams = [
    'driver'   => 'pdo_pgsql',
    'user'     => 'postgres',
    'password' => 'password',
    'dbname'   => 'teste_magazord',
    'host'     => 'db',
    'port'     => '5432',
];

// Criação da configuração do Doctrine
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

// Criação do EntityManager
$entityManager = EntityManager::create($dbParams, $config);

// Retorna o EntityManager para ser usado na CLI
return $entityManager;
