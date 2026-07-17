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

    <!--Sobre Mim-->
    <section class="about-me">
        <div class="section-container">
            <div class="about-body section-body">
                <div class="about-image">
                    <img src="<?= IMAGEM_URL . "/placeholder/image-not-found.png" ?>" alt="Foto do Corretor">
                </div>


                <div class="about-content">
                    <h2>Sobre Mim</h2>

                    <p>Atendimento personalizado para encontrar o imóvel ideal.</p>

                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, culpa libero eaque tenetur, qui rem asperiores blanditiis quia temporibus cum quis eum deserunt, earum excepturi debitis. Numquam animi doloribus explicabo.
                    </p>

                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi voluptas sapiente assumenda, esse, modi, aperiam animi impedit repellendus est id aliquam odit repellat. Corporis repellat velit delectus. Repudiandae, eos dolores?
                    </p>

                    <div class="about-info">
                        <div>
                            <h3>+150</h3>
                            <span>Imóveis</span>
                        </div>

                        <div>
                            <h3>8+</h3>
                            <span>Anos de experiência</span>
                        </div>

                        <div>
                            <h3>100%</h3>
                            <span>Atendimento personalizado</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Footer-->
    <?php include_once COMPONENTS_PATH . '/footer.php'; ?>


    <script src=<?= SCRIPT_URL . "/page/components/navbar.js" ?>></script>
</body>

</html>