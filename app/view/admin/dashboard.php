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
                    <span>Painel</span>
                </div>
                <div class="admin-home-rigth"></div>
            </div>

            <div class="container-card-dashboard">
                <div class="admin-body">
                    <!--Card 1--->
                    <div class="dashboard-container-card"></div>
                    <div class="card-dashboard ">
                        <h2 class="">Total imóveis<h2>
                                <span></span>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script type="module" src=<?= SCRIPT_URL . "/admin/admin.js" ?>></script>
    <script type="module" src=<?= SCRIPT_URL . "/admin/dashboard.js" ?>></script>
</body>

</html>