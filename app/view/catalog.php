<!DOCTYPE html>
<html lang="pt-BR">
<?php include_once VIEW_PATH . '/components/head.php'; ?>

<body>
    <!--Navbar-->
    <?php include_once COMPONENTS_PATH . '/navbar.php'; ?>

    <section class="section-catalog" id="catalog">
        <div class="container-section">
            <div class="header-catalog">
                <h1>Encontre o imóvel Ideal</h1>
                <span>Use os filtros a baixo para encontrar o melhor imóvel para você</span>
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
                <div class="container-catalog">
                    <div class="container-filtro">
                        <div class="filtro-superior">
                            <h3>Complementos do Imovel</h3>
                            <small>Nós conte do que está precisando.</small>
                            <div class="filtro-tags">

                            </div>
                            <div class="container-btn">
                                <button class="btn-default btn-blue">Adicionar Filtros</button>
                                <button class="btn-default btn-white">Limpar Filtros</button>
                            </div>
                        </div>
                        <div class="filtro-inferior">
                            <div class="row-filtro-inferior">
                                <div class="input-range">
                                    <span>Número de quartos</span>
                                    <input type="range" name="" id="" min="0" value="0" max="5">
                                    <div class="row-numeros-range">
                                        <small>0</small>
                                        <small>1</small>
                                        <small>2</small>
                                        <small>3</small>
                                        <small>4</small>
                                        <small>+5</small>
                                    </div>
                                </div>
                                <div class="input-range">
                                    <span>Número de banheiros</span>
                                    <input type="range" name="" id="" min="0" value="0" max="5">
                                    <div class="row-numeros-range">
                                        <small>0</small>
                                        <small>1</small>
                                        <small>2</small>
                                        <small>3</small>
                                        <small>4</small>
                                        <small>+5</small>
                                    </div>
                                </div>
                                <div class="input-range">
                                    <span>Número de garagem</span>
                                    <input type="range" name="" id="" min="0" value="0" max="5">
                                    <div class="row-numeros-range">
                                        <small>0</small>
                                        <small>1</small>
                                        <small>2</small>
                                        <small>3</small>
                                        <small>4</small>
                                        <small>+5</small>
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

</body>

</html>