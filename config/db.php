<?php

DEFINE('HOST', 'localhost');
DEFINE('PORT', '3306');
DEFINE('DBNAME', 'CRUD1');
DEFINE('USER', 'gabriel');
DEFINE('PSWD', '352080gT@');

try {
    $pdo = new PDO("mysql: host=" . HOST . ";port=" . PORT . ";dbname=" . DBNAME . ";user=" . USER . ";password=" . PSWD);
    // echo "Deu certo garai";

} catch (PDOException $e){
    die ("A conexão com o DB " . DBNAME . "falhou devido ao erro " . $e->getMessage());
}

?>