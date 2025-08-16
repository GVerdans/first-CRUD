<?php
session_start();
include __DIR__ . '/includes/header.php';
require_once __DIR__ . '/../src/helpers/helpers.php';

if(!isset($_SESSION['usuario'])) {
    redirectToIndex();
    exit;
}

?>






















<?php include __DIR__ . '/includes/footer.php' ?>