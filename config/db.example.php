<?php

DEFINE('HOST', '#');
DEFINE('PORT', '#');
DEFINE('DBNAME', '#');
DEFINE('USER', '#');
DEFINE('PSWD', '#');

try {
    $pdo = new PDO("mysql: host=" . HOST . ";port=" . PORT . ";dbname=" . DBNAME . ";user=" . USER . ";password=" . PSWD);

} catch (PDOException $e){
    die ("A conexão com o DB " . DBNAME . "falhou devido ao erro " . $e->getMessage());
}

?>