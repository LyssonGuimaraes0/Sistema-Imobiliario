<!DOCTYPE html>
<html lang="pt-BR">
<?php include_once VIEW_PATH . '/components/head.php'; ?>

<body>
    <!--Navbar-->
    <?php include_once COMPONENTS_PATH . '/navbar.php'; ?>

    <!--Tags-->
    <?php include_once COMPONENTS_PATH . '/imovel/tag.php'; ?>

    <section class="section-catalog" id="catalog">
        <div class="section-container">
            <div class="container-imagens-imovel">

                <div class="container-imagem-capa">
                    <img
                        class="img-cover-container"
                        src="<?= BASE_URL . $capa ?>"
                        alt="">
                </div>

                <div class="container-imagem-segundaria">

                    <?php foreach ($imagens as $ordem => $imagem): ?>
                        <?php 
                        if ($ordem > 4) {
                            return;
                        } ?>
                        <div class="item-imagem">
                            <img
                                class="img-cover-container"
                                src="<?= BASE_URL . $imagem ?>"
                                alt="">
                        </div>
                    <?php endforeach; ?>

                </div>

            </div>
        </div>

    </section>

    <!--Footer-->
    <?php require_once COMPONENTS_PATH . '/footer.php'; ?>

</body>

</html>
<!--<img src=IMAGEM_URL . "/placeholder/image-not-found.png"?>-->