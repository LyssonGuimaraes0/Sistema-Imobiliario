<!DOCTYPE html>
<html lang="pt-BR">
<?php include_once VIEW_PATH . '/components/head.php'; ?>

<body>
    <!--Navbar-->
    <?php include_once COMPONENTS_PATH . '/navbar.php'; ?>

    <section class="section-catalog" id="catalog">
        <div class="section-container">
            <div class="header-catalog">
                <div class="header-catalog-titulo">
                    <h2>Encontre o imóvel <span>ideal</span> para você!</h2>
                    <p>Ache o imóvel perfeito para viver momentos incriveis com conforto e segurança.</p>
                </div>
                <div class="container-header">
                    <div class="container-input-header">
                        <label>Localização</label>
                        <input class="input-default search-input" placeholder="Localização" type="text" data-filter="bairro_slug" search>
                        <div class="dropdown-input-element">
                        </div>
                    </div>
                    <div class="container-input-header">
                        <button class="btn-default btn-blue btn-header-catalog" id="btn-filter-header">Buscar</button>
                    </div>
                </div>
            </div>

            <div class="container-catalog">
                <div class="filtro">
                    <div class="filtro-head">
                        <h3>Filtros</h3>
                    </div>
                    <div class="container-filtro">
                        <!--Fitro Ativos--->
                        <div>
                            <span>Filtro Ativos</span>
                            <div class="filtro-tags">
                                <div class="list-tags">
                                    <div class="tag">
                                        <span>Salvador</span>
                                        <i class="fa-solid fa-x"></i>
                                    </div>
                                    <div class="tag">
                                        <span>Apartamento</span>
                                        <i class="fa-solid fa-x"></i>
                                    </div>
                                    <div class="tag">
                                        <span>Psicina</span>
                                        <i class="fa-solid fa-x"></i>
                                    </div>
                                    <div class="tag-more">
                                        <span>+10</span>
                                    </div>
                                </div>
                                <p class="clear-tags">Limpar Filtros</p>
                            </div>
                        </div>
                        <!--Select Filtros--->
                        <div class="grupo-filtro">
                            <div class="item-filtro">
                                <label>Categoria</label>
                                <select class="input-default input-header" name="" id="">
                                    <option value="" selected>Nenhum</option>
                                    <option value="2">Destaque</option>
                                    <option value="3">Lançamento</option>
                                </select>
                            </div>
                            <div class="item-filtro">
                                <label>Tipo</label>
                                <select class="input-default input-header" name="" id="">
                                    <option value="" selected>Nenhum</option>
                                    <option value="1">Residencial</option>
                                    <option value="2">Comercial</option>
                                    <option value="3">Terreno</option>
                                    <option value="4">Especial</option>
                                </select>
                            </div>
                            <div class="item-filtro">
                                <label>Finalidade</label>
                                <select class="input-default input-header" name="" id="">
                                    <option value="" selected>Nenhum</option>
                                    <option value="1">Comprar</option>
                                    <option value="2">Venda</option>
                                    <option value="2">Aluguel</option>
                                </select>
                            </div>
                        </div>

                        <!--Inputs Filtro--->

                        <div class="grupo-filtro">
                            <div class="item-filtro">
                                <label>Faixa de Preço</label>
                                <div class="item-duplo-filtro">
                                    <div class="item-input">
                                        <span>De</span>
                                        <input class="input-default" type="text" placeholder="R$0,00">
                                    </div>
                                    <div class="item-input">
                                        <span>Até</span>
                                        <input class="input-default" type="text" placeholder="R$0,00">
                                    </div>
                                </div>
                            </div>
                            <div class="item-filtro">
                                <label>Área Total <sup>2m</sup></label>
                                <div class="item-duplo-filtro">
                                    <div class="item-input">
                                        <span>De</span>
                                        <input class="input-default" type="text" placeholder="00.00">
                                    </div>
                                    <div class="item-input">
                                        <span>Até</span>
                                        <input class="input-default" type="text" placeholder="00.00">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!---List Checkbox--->
                        <div class="grupo-filtro">
                            <div class="item-filtro">
                                <label>Quartos</label>
                                <div class="item-duplo-filtro">
                                    <div class="item-checkbox">
                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                            <input type="checkbox" name="" id="">
                                            <span><?= ($i == 5) ? "+" . $i : $i ?></span>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="item-filtro">
                                <label>Banheiros</label>
                                <div class="item-duplo-filtro">
                                    <div class="item-checkbox">
                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                            <input type="checkbox" name="" id="">
                                            <span><?= ($i == 5) ? "+" . $i : $i ?></span>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="item-filtro">
                                <label>Vagas</label>
                                <div class="item-duplo-filtro">
                                    <div class="item-checkbox">
                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                            <input type="checkbox" name="" id="">
                                            <span><?= ($i == 5) ? "+" . $i : $i ?></span>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="container-card">
                    <div class="container-option-catalog">
                        <div class="row-option-left"><span class="option-text-catalog"></span></div>

                        <div class="row-option-right">
                            <div class="container-option-catalog">
                                <span>Ordenar por: </span>
                                <select class="input-default input-header" name="" id="">
                                    <option value="" hidden>Recentes</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row-calalog">
                        <?php require_once COMPONENTS_PATH . '/imovel/card.php'; ?>
                    </div>
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


    <!--Footer-->
    <?php require_once COMPONENTS_PATH . '/footer.php'; ?>

    <script type="module" src=<?= SCRIPT_URL . "/service/catalog.js" ?>></script>
    <script src=<?= SCRIPT_URL . "/page/components/navbar.js" ?>></script>

</body>

</html>