<!DOCTYPE html>
<html lang="pt-BR">
<?php include_once VIEW_PATH . '/components/head.php'; ?>

<body>
    <section class="section-login">
        <div class="login-container">
            <h2>Entrar</h2>
            <form id="form-login">
                <span id="mensagem-error">E-mail ou Senha invalido, Tente Novamente</span>
                <div class="input-group">
                    <label for="email">E-mail</label>
                    <input class="input-default input-login" type="email" id="email" name="email" placeholder="seu@email.com" required>
                </div>

                <div class="input-group">
                    <label for="password">Senha</label>
                    <input class="input-default input-login " type="password" id="password" name="password" placeholder="Sua senha" required>
                </div>
                <button type="submit" id="btn-login" class="btn-default btn-login btn-blue">
                    <div class="loading">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>Acessar
                </button>
            </form>
        </div>
    </section>

    <script type="module" src=<?= SCRIPT_URL . "/login.js" ?>></script>
</body>

</html>