<?php

$dbConnection = $_ENV['DB_CONNECTION'] ?? 'mysql';
$dbHost = $_ENV['DB_HOST'] ?? 'localhost';
$dbName = $_ENV['DB_NAME'] ?? 'db';

return [
    'class' => 'yii\db\Connection',
    'dsn' => "{$dbConnection}:host={$dbHost};dbname={$dbName}",
    'username' => $_ENV['DB_USER'] ?? 'user',
    'password' => $_ENV['DB_PASSWORD'] ?? '',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
