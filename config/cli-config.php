<?php

require_once __DIR__ . '/config/bootstrap.php';

use Doctrine\ORM\Tools\Console\ConsoleRunner;

// Retorna a configuração do EntityManager
return ConsoleRunner::createHelperSet($entityManager);