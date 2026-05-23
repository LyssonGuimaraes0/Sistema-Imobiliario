<!DOCTYPE html>
<html lang="pt-BR">
<?php include_once VIEW_PATH . '/components/head.php'; ?>


<body class="layout-admin">
    <!--Navbar Admin-->
    <?php include_once VIEW_PATH . "/components/admin/navbar-admin.php" ?>

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
                        <form action="">
                            <div class="body-form-imovel">
                                <div class="container-input-header">
                                    <label class="label-form-imovel label-form-imovel-required" for="">Titulo do anúncio</label>
                                    <input class="input-default input-header input-header-first" placeholder="Ex:Apartamento 4 quartos" type="text">
                                </div>
                                <div class="row-form-imovel">
                                    <div class="container-input-form">
                                        <label class="label-form-imovel label-form-imovel-required" for="">Tipo de Imovel</label>
                                        <select class="input-default-select" name="tipo-imovel" id="">
                                            <option value="" hidden selected>Selecione Tipo Imovel</option>
                                        </select>
                                        <div class="dropdown-input-element">
                                        </div>
                                    </div>
                                    <div class="container-input-form">
                                        <label class="label-form-imovel label-form-imovel-required" for="">Finalidade</label>
                                        <select class="input-default-select" name="tipo-imovel" id="" required>
                                            <option value="" hidden selected>Selecione Finalidade</option>
                                        </select>
                                        <div class="dropdown-input-element">
                                        </div>
                                    </div>
                                </div>
                                <div class="container-input-form">
                                    <label class="label-form-imovel" for="">Descrição</label>
                                    <textarea class="input-default textarea-form-imovel" name="" id=""></textarea>
                                </div>
                            </div>
                            <div class="div-separetion"></div>
                            <div class="head-form-imovel">
                                <div class="menu-title-form">
                                    <i class="fa-solid fa-dollar-sign"></i>
                                    <h3>Valores</h3>
                                </div>
                            </div>
                            <div class="body-form-imovel">
                                <div class="row-form-imovel">
                                    <div class="container-input-form">
                                        <label class="label-form-imovel label-form-imovel-required" for="">Preço do Imovel</label>
                                        <input class="input-default" placeholder="Ex:R$ 0,00" type="text">
                                    </div>
                                    <div class="container-input-form">
                                        <label class="label-form-imovel" for="">Condominio <small>(opcional)</small></label>
                                        <input class="input-default" placeholder="Ex:R$ 0,00" type="text">
                                    </div>
                                </div>

                                <div class="row-form-imovel">
                                    <div class="container-input-form">
                                        <label class="label-form-imovel label-form-imovel-required" for="">Modalidade</label>
                                        <select class="input-default-select" name="tipo-imovel" id="" required>
                                            <option value="" selected>Nenhum</option>
                                            <option value="">Venda</option>
                                            <option value="">Aluguel</option>
                                            <option value="">Permuta</option>
                                        </select>
                                    </div>
                                    <div class="container-input-form">
                                        <label class="label-form-imovel" for="">Destaque</label>
                                        <select class="input-default-select" name="tipo-imovel" id="" required>
                                            <option value="" selected>Nenhum</option>
                                            <option value="">Destaque</option>
                                            <option value="">Lançamento</option>
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
                            <div class="body-form-imovel">
                                <div class="row-form-imovel">
                                    <div class="container-input-form">
                                        <label class="label-form-imovel label-form-imovel-required" for="">Área Total (m<sup>2</sup>)</label>
                                        <input class="input-default" placeholder="Ex:R$ 0,00" type="text">
                                    </div>
                                    <div class="container-input-form">
                                        <label class="label-form-imovel label-form-imovel-required" for="">Área útil (m<sup>2</sup>)</label>
                                        <input class="input-default" placeholder="Ex:R$ 0,00" type="text">
                                    </div>
                                </div>
                                <div class="row-form-imovel">
                                    <div class="container-input-form">
                                        <label class="label-form-imovel" for="">Quartos</label>
                                        <input class="input-default" value="0" min=0 type="number">
                                    </div>
                                    <div class="container-input-form">
                                        <label class="label-form-imovel" for="">Banheiros</label>
                                        <input class="input-default" value="0" min=0 type="number">
                                    </div>
                                    <div class="container-input-form">
                                        <label class="label-form-imovel" for="">Suítes</label>
                                        <input class="input-default" value="0" min=0 type="number">
                                    </div>
                                </div>
                                <div class="row-form-imovel">
                                    <div class="container-input-form">
                                        <label class="label-form-imovel" for="">Sala de Estar</label>
                                        <input class="input-default" value="0" min=0 type="number">
                                    </div>
                                    <div class="container-input-form">
                                        <label class="label-form-imovel" for="">Cozinhas</label>
                                        <input class="input-default" value="0" min=0 type="number">
                                    </div>
                                    <div class="container-input-form">
                                        <label class="label-form-imovel" for="">Garagem</label>
                                        <input class="input-default" value="0" min=0 type="number">
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
                            <div class="body-form-imovel">
                                <div class="container-input-header">
                                    <label class="label-form-imovel label-form-imovel-required" for="">Titulo do anúncio</label>
                                    <input class="input-default input-header input-header-first" placeholder="Ex:Apartamento 4 quartos" type="text">
                                </div>
                                <div class="row-form-imovel">
                                    <div class="container-input-form">
                                        <label class="label-form-imovel label-form-imovel-required" for="">Tipo de Imovel</label>
                                        <select class="input-default-select" name="tipo-imovel" id="">
                                            <option value="" hidden selected>Selecione Tipo Imovel</option>
                                        </select>
                                        <div class="dropdown-input-element">
                                        </div>
                                    </div>
                                    <div class="container-input-form">
                                        <label class="label-form-imovel label-form-imovel-required" for="">Finalidade</label>
                                        <select class="input-default-select" name="tipo-imovel" id="" required>
                                            <option value="" hidden selected>Selecione Finalidade</option>
                                        </select>
                                        <div class="dropdown-input-element">
                                        </div>
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
                                <div class="container-input-header">
                                    <label class="label-form-imovel label-form-imovel-required" for="">Titulo do anúncio</label>
                                    <input class="input-default input-header input-header-first" placeholder="Ex:Apartamento 4 quartos" type="text">
                                </div>
                                <div class="row-form-imovel">
                                    <div class="container-input-form">
                                        <label class="label-form-imovel label-form-imovel-required" for="">Tipo de Imovel</label>
                                        <select class="input-default-select" name="tipo-imovel" id="">
                                            <option value="" hidden selected>Selecione Tipo Imovel</option>
                                        </select>
                                        <div class="dropdown-input-element">
                                        </div>
                                    </div>
                                    <div class="container-input-form">
                                        <label class="label-form-imovel label-form-imovel-required" for="">Finalidade</label>
                                        <select class="input-default-select" name="tipo-imovel" id="" required>
                                            <option value="" hidden selected>Selecione Finalidade</option>
                                        </select>
                                        <div class="dropdown-input-element">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>
    </main>


    <script type="module" src=<?= SCRIPT_URL . "/admin/dashboard.js" ?>></script>
</body>

</html>