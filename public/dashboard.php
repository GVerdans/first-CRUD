<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();


include __DIR__ . '/includes/header.php';
require_once __DIR__ . '/../src/helpers/helpers.php';
require_once __DIR__ . '/../src/controller/controllerDashBoard.php';

if (!isset($_SESSION['usuario'])) {
    redirectToIndex();
    exit;
}
?>

<div class="container">
    <div class="row text-center">
        <div class="col-12 mt-3">
            <h2>Usuários</h2>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
            </tr>
        </thead>

        <tbody>
            <?php if(!empty($listUsers)): ?>
            <?php foreach ($listUsers as $user): ?>
                <tr>
                    <td> <?= htmlspecialchars($user['username']) ?></td>
                    <td> <?= htmlspecialchars($user['email']) ?></td>
                </tr>
            <?php endforeach; ?>
            <?php else :?>
                <tr><p>Não há registros para mostrar !</p></tr>
            <?php endif; ?>

        </tbody>

    </table>
</div>






<?php include __DIR__ . '/includes/footer.php' ?>