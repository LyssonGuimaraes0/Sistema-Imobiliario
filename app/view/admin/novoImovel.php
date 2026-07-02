<!DOCTYPE html>
<html lang="pt-BR">
<?php include_once VIEW_PATH . '/components/head.php'; ?>


<body class="layout-admin">
    <!--Navbar Admin-->
    <?php include_once VIEW_PATH . "/components/admin/navbar-admin.php" ?>
    <!--Modal-->
    <?php include_once VIEW_PATH . "/components/modal.php" ?>



    <!--Estrutura de dashBoard-->
    <main class="main-admin">

        <section class="novoimovel-home">

            <div class="container-admin-home">
                <div class="admin-home-left">
                    <i class="fa-solid fa-house-chimney"></i>
                    <span>Catálogo/ Imovel /Novo Imovel</span>
                </div>
                <div class="admin-home-rigth"></div>
            </div>
            <div class="admin-body">
                <div class="titulo-imoveis">
                    <h2>Cadastrar novo imóvel</h2>
                    <span>Preencha as informações do imóvel para adicioná-lo ao catálogo.</span>
                </div>
                <div class="container-card-admin">
                    <!--Container Formulario-->
                    <div class="container-form-imovel">
                        <div class="head-form-imovel">
                            <div class="menu-title-form">
                                <i class="fa-regular fa-file-lines"></i>
                                <h3>Informações Basicas</h3>
                            </div>
                        </div>
                        <form action="" id="formNovoImovel">
                            <div class="body-form-imovel">
                                <div class="container-input-header">
                                    <label class="label-form-imovel label-form-imovel-required">Titulo do anúncio</label>
                                    <input class="input-default input-header input-header-first" placeholder="Ex:Apartamento 4 quartos" name="nome_imovel" type="text">
                                </div>
                                <div class="row-form-imovel">
                                    <div class="container-input-form">
                                        <label class="label-form-imovel label-form-imovel-required">Tipo de Imovel</label>
                                        <select class="input-default-select" name="tipo-imovel">
                                            <option value="" hidden selected>Selecione Tipo Imovel</option>
                                            <option value="1">Residencial</option>
                                            <option value="2">Comercial</option>
                                            <option value="3">Terreno</option>
                                            <option value="4">Especial</option>
                                        </select>
                                        <div class="dropdown-input-element">
                                        </div>
                                    </div>
                                </div>
                                <div class="container-input-form">
                                    <label class="label-form-imovel">Descrição</label>
                                    <textarea class="input-default textarea-form-imovel" name="descricao"></textarea>
                                </div>
                            </div>
                            <div class="div-separetion"></div>
                            <div class="head-form-imovel">
                                <div class="menu-title-form">
                                    <i class="fa-solid fa-dollar-sign"></i>
                                    <h3>Valores</h3>
                                </div>
                            </div>
                            <div class="body-form-imovel" id="container-valores">
                                <div class="row-form-imovel">
                                    <div class="container-input-form">
                                        <label class="label-form-imovel label-form-imovel-required">Preço do Imovel</label>
                                        <input class="input-default" placeholder="Ex:R$ 0,00" name="preco" type="text">
                                    </div>
                                    <div class="container-input-form">
                                        <label class="label-form-imovel">Condominio <small>(opcional)</small></label>
                                        <input class="input-default" placeholder="Ex:R$ 0,00" name="condominio" type="text">
                                    </div>
                                </div>

                                <div class="row-form-imovel">
                                    <div class="container-input-form">
                                        <label class="label-form-imovel label-form-imovel-required">Modalidade</label>
                                        <select class="input-default-select" name="modalidade" required>
                                            <option hidden selected>Nenhum</option>
                                            <option value="venda">Venda</option>
                                            <option value="aluguel">Aluguel</option>
                                            <option value="permuta">Permuta</option>
                                        </select>
                                    </div>
                                    <div class="container-input-form">
                                        <label class="label-form-imovel">Destaque</label>
                                        <select class="input-default-select" name="destaque">
                                            <option value="1" selected>Nenhum</option>
                                            <option value="2">Destaque</option>
                                            <option value="3">Lançamento</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="div-separetion"></div>
                            <div class="head-form-imovel">
                                <div class="menu-title-form">
                                    <i class="fa-solid fa-ruler-combined"></i>
                                    <h3>Características</h3>
                                </div>
                            </div>
                            <div class="body-form-imovel" id="container-caracteristicas">
                                <div class="row-form-imovel">
                                    <div class="container-input-form">
                                        <label class="label-form-imovel label-form-imovel-required">Área Total (m<sup>2</sup>)</label>
                                        <input class="input-default" placeholder="Ex:00" maxlength="5" name="area_total" type="text">
                                    </div>
                                    <div class="container-input-form">
                                        <label class="label-form-imovel label-form-imovel-required">Área útil (m<sup>2</sup>)</label>
                                        <input class="input-default" placeholder="Ex:00" maxlength="5" name="area_util" type="text">
                                    </div>
                                </div>
                                <div class="row-form-imovel">
                                    <div class="container-input-form">
                                        <label class="label-form-imovel">Quartos</label>
                                        <input class="input-default" value="0" min=0 name="quarto" type="number">
                                    </div>
                                    <div class="container-input-form">
                                        <label class="label-form-imovel">Banheiros</label>
                                        <input class="input-default" value="0" min=0 name="banheiro" type="number">
                                    </div>
                                    <div class="container-input-form">
                                        <label class="label-form-imovel">Suítes</label>
                                        <input class="input-default" value="0" min=0 name="suite" type="number">
                                    </div>
                                </div>
                                <div class="row-form-imovel">
                                    <div class="container-input-form">
                                        <label class="label-form-imovel">Sala de Estar</label>
                                        <input class="input-default" value="0" min=0 name="sala_de_estar" type="number">
                                    </div>
                                    <div class="container-input-form">
                                        <label class="label-form-imovel">Cozinhas</label>
                                        <input class="input-default" value="0" min=0 name="cozinha" type="number">
                                    </div>
                                    <div class="container-input-form">
                                        <label class="label-form-imovel">Garagem</label>
                                        <input class="input-default" value="0" min=0 name="garagem" type="number">
                                    </div>
                                </div>
                                <div>
                                    <div class="menu-title-form">
                                        <h4>Complementos</h4>
                                    </div>
                                    <div class="container-checkbox-form">
                                        <div class="item-checkbox-form">
                                            <input type="checkbox" name="piscina">
                                            <label>Piscina</label>
                                        </div>
                                        <div class="item-checkbox-form">
                                            <input type="checkbox" name="churrasqueira">
                                            <label>Churrasqueira</label>
                                        </div>
                                        <div class="item-checkbox-form">
                                            <input type="checkbox" name="varanda">
                                            <label>Varanda</label>
                                        </div>
                                        <div class="item-checkbox-form">
                                            <input type="checkbox" name="quintal">
                                            <label>Quintal</label>
                                        </div>
                                        <div class="item-checkbox-form">
                                            <input type="checkbox" name="salao_de_festa">
                                            <label>Salão de Festa</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="div-separetion"></div>
                            <div class="head-form-imovel">
                                <div class="menu-title-form">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <h3>Endereço</h3>
                                </div>
                            </div>
                            <div class="body-form-imovel" id="container-endereco">
                                <div class="row-form-imovel">
                                    <div class="container-input-form">
                                        <label class="label-form-imovel label-form-imovel-required">CEP</label>
                                        <input class="input-default" placeholder="Ex:00000-000" id="cep-input" name="cep" type="text">
                                    </div>
                                    <div class="container-input-form">
                                        <label class="label-form-imovel label-form-imovel-required">Rua/Longradouro</label>
                                        <input class="input-default" placeholder="Ex:Rua exemplo" name="rua" type="text">
                                    </div>
                                </div>
                                <div class="row-form-imovel">
                                    <div class="container-input-form">
                                        <label class="label-form-imovel label-form-imovel-required">Número</label>
                                        <input class="input-default" placeholder="Ex:00" maxlength="3" id="numero-input" name="numero" type="text">
                                    </div>
                                    <div class="container-input-form">
                                        <label class="label-form-imovel label-form-imovel-required">Complemento</label>
                                        <input class="input-default" placeholder="Ex:Exemplo" name="complemento" type="text">
                                    </div>
                                </div>
                                <div class="row-form-imovel">
                                    <div class="container-input-form">
                                        <label class="label-form-imovel label-form-imovel-required">Bairro</label>
                                        <input class="input-default" placeholder="Ex:Sâo Cristovão" name="bairro" type="text">
                                    </div>
                                    <div class="container-input-form">
                                        <label class="label-form-imovel label-form-imovel-required">Municipio</label>
                                        <input class="input-default" placeholder="Ex:Salvador" name="municipio" type="text">
                                    </div>
                                    <div class="container-input-form">
                                        <label class="label-form-imovel label-form-imovel-required">Estado</label>
                                        <select class="input-default-select" name="estado" required>
                                            <option value="BA" selected>BA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="div-separetion"></div>
                            <div class="head-form-imovel">
                                <div class="menu-title-form">
                                    <i class="fa-solid fa-images"></i>
                                    <h3>Fotos</h3>
                                </div>
                            </div>
                            <div class="body-form-imovel">
                                <div class="contaiener-imagem-form" id="drop-area">
                                    <i class="fa-solid fa-cloud-arrow-up"></i>
                                    <span>Arraste e solte ou clique aqui para subir uma imagem</span>
                                    <input class="" type="file" name="foto" id="fileInput" accept="image/*" hidden>
                                </div>
                                <div class="container-imagem-preview">
                                    <span>Fotos adicionadas (<span id="text-imgs-upload">0</span>) </span>
                                    <?php require_once COMPONENTS_PATH . '/admin/card-admin.php'; ?>
                                    <div class="list-imagens-select">

                                    </div>
                                </div>
                            </div>
                            <div>
                                <input class="btn-default btn-blue" type="submit" value="Enviar Formulario">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>
    </main>

    <script type="module" src=<?= SCRIPT_URL . "/admin/admin.js" ?>></script>
    <script type="module" src=<?= SCRIPT_URL . "/admin/novoimovel.js" ?>></script>
</body>

</html>