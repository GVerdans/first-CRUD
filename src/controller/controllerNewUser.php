<?php
// Aprenseta os erros.
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

session_start();

// Array de erros
if(!isset($_SESSION['erros-registro'])){
    $_SESSION['erros-registro'] = [];
}

require_once __DIR__ . '/../helpers/helpers.php';

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    redirectToIndex();
    die ('Acesso Negado !');
}

$user = $_POST['ipt-user-register'] ?? '';
$pswd = $_POST['ipt-pswd-register'] ?? '';
$email = $_POST['ipt-email-register'] ?? '';

// Valida campos vazios
if(empty($user) || empty($pswd) || empty($email)){
    $_SESSION['erros-registro'][] = 'Preencha todos os campos !';
    redirectToRegister();
    exit;
}

// Valida Email
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $_SESSION['erros-registro'][] = 'E-mail inválido !';
    // redirectToRegister();
    // exit;
}

// Senha com minimo de 6 caracteres
if(strlen($pswd) < 6 ){
    $_SESSION['erros-registro'][] = 'A senha precisa de 6 caracteres no mínimo !';
    // redirectToRegister();
    // exit;
}

require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../models/UserModel.php';

$userModel = new UserModel($pdo);

// Verifica se o Usuário ja existem.
if($userModel->userExists($user)){
    $_SESSION['erros-registro'][] = 'Usuário já Existente !';
    // redirectToRegister();
    // exit;
}

// Verifica se o email ja existe.
if ($userModel->emailExists($email)){
    $_SESSION['erros-registro'][] = 'Email já cadastrado !';
    redirectToRegister();
    exit;
}

// Cadastra novo user
if($userModel->newUser($user, $pswd, $email)){
    $_SESSION['sucesso-registro'] = 'Usuário Criado com Sucesso !';
    redirectToIndex();
    exit;
} else {
    $_SESSION['erros-registro'][] = 'Erro ao cadastra novo Usuário !';
    redirectToRegister();
    exit;
}
?>