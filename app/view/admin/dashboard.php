<!DOCTYPE html>
<html lang="pt-BR">
<?php include_once VIEW_PATH . '/components/head.php'; ?>



<body class="layout-dashboard">
    <!--Navbar Admin-->
    <?php include_once VIEW_PATH . "/components/admin/navbar-admin.php" ?>

    <!--Estrutura de dashBoard-->
    <main class="main-dashboard">

        <section class="dashboard-home" id="home">

            <div class="container-dashboard-home">
                <div class="dashboard-home-left">
                    <i class="fa-solid fa-house-chimney"></i>
                    <span>Painel</span>
                </div>
                <div class="dashboard-home-rigth"></div>
            </div>

            <div class="container-card-dashboard">
                <div class="dashboard-body">
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



</body>

</html>