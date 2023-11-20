<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=pgsql;port=5432;dbname=wiam',
    'username' => 'db_user',
    'password' => 'db_pass',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
