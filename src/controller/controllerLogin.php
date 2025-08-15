<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
// var_dump($_POST);
require_once __DIR__ . '/../helpers/helpers.php';

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    redirectToIndex();
    die ('Acesso Negado !');
}

$user = $_POST['ipt-user-login'] ?? '';
$pswd = $_POST['ipt-pswd-login'] ?? '';

// var_dump($user, $pswd);

if(empty($user) || empty($pswd)){
    $_SESSION['erros'] = 'Preencha todos os campos !';
    redirectToIndex();
    exit;
}

// Conexão com DB
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../models/UserModel.php';

$userModel = new UserModel($pdo);

// Validação de Login
$usuario = $userModel->checkLogin($user, $pswd);

// print_r($usuario);

if(!$usuario){
    $_SESSION['erros'] = 'Usuário ou Senha inválidos !';
    redirectToIndex();
    exit;
    
} else {
    $_SESSION['usuario'] = $usuario;
    redirectToDashboard();
    exit;
    // echo 'login sucesso !';
}

// $_SESSION['usuario'] = $usuario['usuario'];

?>