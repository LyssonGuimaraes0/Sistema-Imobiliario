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

            <div class="container-admin">
                <!--Filtro de buscas de imoveis-->
                <h1>Buscar Imovel</h1>
                <span>Use os filtros a baixo para encontrar os imoveis cadastrados</span>
                <div class="container-header">
                    <div class="container-input-header">
                        <span>Localização</span>
                        <input class="input-default input-header input-header-first" placeholder="Localização" type="text" data-filter="bairro_slug" search>
                        <div class="dropdown-input-element">
                        </div>
                    </div>
                    <div class="container-input-header">
                        <span>Categoria</span>
                        <select class="input-default input-header" name="tipo" id="" data-filter="fk_tipo_destaque">
                            <option value="" selected hidden>Selecione</option>
                            <option value="1">Nenhum</option>
                            <option value="2">Destaque</option>
                            <option value="3">Lançamento</option>
                        </select>
                    </div>
                    <div class="container-input-header">
                        <span>Tipo do Imovel</span>
                        <select class="input-default input-header" name="tipo" id="" data-filter="fk_tipo_imovel">
                            <option value="" selected hidden>Selecione</option>
                            <option value="">Nenhum</option>
                            <option value="1">Residencial</option>
                            <option value="2">Comercial</option>
                            <option value="3">Terreno</option>
                            <option value="4">Especial</option>
                        </select>
                    </div>
                    <div class="container-input-header">
                        <span>Finalidade</span>
                        <select class="input-default input-header" name="tipo" id="" data-filter="modalidade">
                            <option value="" selected hidden>Selecione</option>
                            <option value="">Nenhum</option>
                            <option value="venda">Venda</option>
                            <option value="aluguel">Aluguel</option>
                            <option value="permuta">Permuta</option>
                        </select>
                    </div>
                    <div class="container-input-header">
                        <button class="btn-default btn-blue btn-header-catalog" id="btn-filter-header">Buscar</button>
                    </div>


                </div>

                <!---Container de cards-->
                <div class="container-card">
                    <div class="container-option-catalog">
                        <div class="row-option-left"><span class="option-text-catalog"></span></div>

                        <div class="row-option-right">
                            <div class="container-option-catalog">
                                <span>Ordenar por: </span>
                                <select class="option-select-catalog" name="" id="">
                                    <option value="" hidden>Recentes</option>
                                </select>
                                <div class="row-btn-catalog">
                                    <button class="option-btn-catalog"><i class="fa-solid fa-border-all"></i></button>
                                    <button class="option-btn-catalog"><i class="fa-solid fa-list"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-calalog">
                        <?php require_once COMPONENTS_PATH . '/imovel/card.php'; ?>
                    </div>
                </div>

                <div class="container-paginacao">
                    <div class="lista-paginacao">
                        <ul class="container-botoes-paginacao">
                        </ul>
                    </div>
                </div>


            </div>
        </section>
    </main>

    <script type="module" src=<?= SCRIPT_URL . "/admin/admin.js" ?>></script>
    <script type="module" src=<?= SCRIPT_URL . "/service/catalog.js" ?>></script>
    <script src=<?= SCRIPT_URL . "/admin/searchImovel.js" ?>></script>
</body>

</html>