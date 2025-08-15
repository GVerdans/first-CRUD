<?php
session_start();
include __DIR__ . "/includes/header.php";

?>



<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center my-3">Login</h2>
        </div>

        <div class="row">
            <div class="col-12 col-lg-8 d-block m-auto">

                <form method="post" action="../src/controller/controllerLogin.php" class="form-control text-center p-5">

                    <?php if (!empty($_SESSION['sucesso-registro'])): ?>
                        <div class="alert alert-success alert-dismissible fade show mt-3">
                            <?= htmlspecialchars($_SESSION['sucesso-registro']) ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($_SESSION['sucesso-registro']) ?>
                    <?php endif; ?>

                    <!-- User -->
                    <label for="ipt-user-login" class="form-label col-12 col-lg-5 px-2"> Usuário:
                        <input type="text" name="ipt-user-login" id="ipt-user-login" class="form-control">
                    </label>

                    <!-- Password -->
                    <label for="ipt-pswd-login" class="form-label col-12 col-lg-5 px-2"> Senha:
                        <input type="password" name="ipt-pswd-login" id="ipt-pswd-login" class="form-control">
                    </label>

                    <!-- Submit -->
                    <input type="submit" class="btn btn-outline-primary d-block mx-auto my-3 py-2" value="Entrar">

                    <a href="register.php" class="link-secondary">Não Possui uma Conta ? Registre-se Aqui</a>
                </form>

                <?php if (!empty($_SESSION['erros'])) : ?>
                    <div class="alert alert-danger mt-3">
                        <?= htmlspecialchars($_SESSION['erros']) ?>
                    </div>
                    <?php unset($_SESSION['erros']) ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . "/includes/footer.php"; ?>