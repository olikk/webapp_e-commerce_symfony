<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src/Entity"), $isDevMode);

// database configuration parameters
$conn = array(
'driver' => 'pdo_mysql',
'user' => 'olgapi',
'password' => '',
'dbname' => 'siteEcommerce',
'port' => '3306'
);

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);