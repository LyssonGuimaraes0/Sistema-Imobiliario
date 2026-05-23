<!DOCTYPE html>
<html lang="pt-BR">
<?php include_once VIEW_PATH . '/components/head.php'; ?>



<body class="layout-admin">
    <!--Navbar Admin-->
    <?php include_once VIEW_PATH . "/components/admin/navbar-admin.php" ?>

    <!--Estrutura de dashBoard-->
    <main class="main-admin">

        <section class="admin-home" id="home">

            <div class="container-admin-home">
                <div class="admin-home-left">
                    <i class="fa-solid fa-house-chimney"></i>
                    <span>Catálogo/ Imovel</span>
                </div>
                <div class="admin-home-rigth"></div>
            </div>

        </section>
    </main>


    <script type="module" src=<?= SCRIPT_URL . "/admin/dashboard.js" ?>></script>
</body>

</html>