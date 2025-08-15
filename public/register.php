<?php
session_start();
include __DIR__ . "/includes/header.php";
?>


<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center my-3">Registro</h2>
        </div>

        <div class="row">
            <div class="col-12 col-lg-8 d-block m-auto">
                <form action="../src/controller/controllerNewUser.php" method="post" class="form-control text-center p-5">
                    <!-- New User -->
                    <label for="ipt-user-register" class="form-label col-12 col-lg-5 px-2"> Usuário:
                        <input type="text" name="ipt-user-register" id="ipt-user-register" class="form-control">
                    </label>

                    <!-- New Password -->
                    <label for="ipt-pswd-register" class="form-label col-12 col-lg-5 px-2"> Senha:
                        <input type="password" name="ipt-pswd-register" id="ipt-pswd-register" class="form-control">
                    </label>

                    <!-- New Email -->
                    <label for="ipt-email-register" class="form-label col-12 col-lg-5 px-2"> Email:
                        <input type="email" name="ipt-email-register" id="ipt-email-register" class="form-control">
                    </label>

                    <!-- Btn Register -->
                    <input type="submit" class="btn btn-outline-primary d-block mx-auto my-3 py-2" value="Registrar">

                    <a href="index.php" class="link-secondary">Voltar para página de Login</a>

                </form>

                <?php if (!empty($_SESSION['erros-registro'])): ?>
                    <div class="alert alert-danger mt-3">
                        <?php foreach ($_SESSION['erros-registro'] as $erro) : ?>
                            <?= htmlspecialchars($erro) ?><br>
                        <?php endforeach; ?>
                    </div>
                    <?php unset($_SESSION['erros-registro']) ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . "/includes/footer.php"; ?>