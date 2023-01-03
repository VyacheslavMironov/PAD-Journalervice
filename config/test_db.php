<?php
$db = require __DIR__ . '/db.php';
// test database! Important not to run tests on production or development databases
$db['dsn'] = 'pgsql:host=localhost;dbname=pad_db_test';
$db['username'] = 'raptor22';
$db['password'] = 'lama22';
$db['charset'] = 'utf8';

return $db;