<style>
    ul {
        list-style: none;
    }

    .container-section {
        max-width: 1310px;
        margin: 0 auto;
    }

    .container-filtro {
        width: 250px;
        padding: 15px;
        height: 900px;
        background-color: #f2f5f7;
    }

    .container-catalog {
        display: flex;
        gap: 17px;
        margin: 10px 0;
    }

    .container-card {
        width: 100%;
        padding: 15px;
        background-color: #d5e7f7;
        height: auto;
    }

    .container-option-catalog {
        width: 100%;
        height: 70px;
        display: flex;
        justify-content: space-between;
    }

    .row-option-right {
        width: 350px;
        display: flex;
    }

    .option-btn-catalog {
        width: 35px;
        height: 35px;
        padding: 5px;
    }


    .option-select-catalog {
        width: 130px;
        height: 35px;
        padding: 5px;
    }

    .row-calalog {
        display: flex;
        /* Ativa o modo Flexbox */
        flex-wrap: wrap;
        /* Faz os cards descerem quando o limite é atingido */
        gap: 10px;
        /* Cria um espaçamento entre os cards */
        width: 100%;
    }

    .container-paginacao {
        width: 100%;
        height: 30px;
        padding: 10px;
        background-color: #d5e7f7;
        margin: 0 auto;
    }

    .container-botoes-paginacao {
        display: flex;
        justify-content: center;
    }
</style>


<section id="catalog">
    <div class="container-section">
        <div class="container-catalog">
            <div class="container-filtro">
                <h1>Filtros Em Breve</h1>
            </div>
            <div class="container-card">
                <div class="container-option-catalog">
                    <div class="row-option-left"><span>700 imoveis em Pernabuens</span></div>

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

<script type="module" src="public/assets/js/catalog.js"></script>