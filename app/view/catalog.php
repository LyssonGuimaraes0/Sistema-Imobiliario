<style>

    ul{
        list-style: none;
    }

    .container-section {
        max-width: 1427px;
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

    .card {
        width: 336px;
        padding: 20px;
        height: 421px;
        background-color: #1167a0;
    }

    .container-botoes-paginacao{
        display: flex;
        justify-content: center;
    }
</style>


<section id="catalog">
    <div class="container-section">
        <div class="container-catalog">
            <div class="container-filtro">
                <h1>Filtros fodas</h1>
            </div>
            <div class="container-card">
                <div class="row-calalog">
                    <div class="card"></div>
                    <div class="card"></div>
                    <div class="card"></div>
                    <div class="card"></div>
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

<script src="public/assets/js/catalog.js"></script>