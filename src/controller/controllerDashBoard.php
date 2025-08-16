<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../models/UserModel.php';
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../helpers/helpers.php';

if(!isset($_SESSION['usuario'])){
    redirectToIndex();
    exit;
}

$userModel = new UserModel($pdo);

$listUsers = $userModel->listUsers();


require_once __DIR__ . '/../../public/dashboard.php';

?>