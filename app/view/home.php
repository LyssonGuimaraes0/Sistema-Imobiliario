<!-- <h1>HOME</h1> -->
<!DOCTYPE html>
<html lang="pt-BR">
<?php include_once COMPONENTS_PATH . '/head.php'; ?>

<body>
    <!--Navbar-->
    <?php include_once COMPONENTS_PATH . '/navbar.php'; ?>

    <!--Banner-->
    <section class="banner">
        <!--Background Imagem-->
        <img
            src="<?= IMAGEM_URL . "\banner\background-banner.jpg" ?>"
            alt="background-banner"
            class="banner-image">
        <div class="banner-overlay"></div>
        <div class="section-container">
            <div class="banner-body">
                <div class="banner-content">
                    <span class="banner-subtitle">
                        Tenha um atendimento personalizado
                    </span>
                    <h1 class="banner-title">
                        Encontre o imóvel ideal para você
                    </h1>
                    <p class="banner-description">
                        Compra, aluguel e oportunidades nas melhores regiões de Salvador.
                    </p>
                </div>
                <div class="banner-search">
                    <div>
                        <h2>Qual seu imóvel ideal?</h2>
                        <span>Ache seu imóvel selecionado:</span>
                    </div>
                    <div class="banner-filter">
                        <div class="item-banner-filter">
                            <label>Bairro</label>
                            <div class="search-box">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                <input class="search-input"
                                    type="search"
                                    placeholder="Busque por Localidade ou Tipo de Imovel ">
                            </div>
                        </div>

                        <div class="item-banner-filter">
                            <label>Categoria</label>
                            <select class="input-default input-header" name="tipo" id="" data-filter="fk_tipo_destaque">
                                <option value="" selected hidden>Selecione</option>
                                <option value="1">Nenhum</option>
                                <option value="2">Destaque</option>
                                <option value="3">Lançamento</option>
                            </select>
                        </div>

                        <div class="item-banner-filter">
                            <label>Tipo do Imovel</label>
                            <select class="input-default input-header" name="tipo" id="" data-filter="fk_tipo_imovel">
                                <option value="" selected hidden>Selecione</option>
                                <option value="">Nenhum</option>
                                <option value="1">Residencial</option>
                                <option value="2">Comercial</option>
                                <option value="3">Terreno</option>
                                <option value="4">Especial</option>
                            </select>
                        </div>

                        <button class="btn-search">
                            Buscar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!--Footer-->
    <?php include_once COMPONENTS_PATH . '/footer.php'; ?>
</body>

</html>