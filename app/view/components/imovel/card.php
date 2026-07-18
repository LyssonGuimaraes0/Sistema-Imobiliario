<!--Card Default-->
<template id="card-template">
    <article class="card" data-card="">
        <div class="card-head">
            <img class="card-img" src= "<?= BASE_URL ?>" alt="Imagem do Imovel">
        </div>
        <div class="card-description">
            <div class="card-header-titulo">
                <h3 data-item="nome_imovel"></h3>
                <p data-item="bairro"></p>
            </div>
            <ul class="card-list-item">
                <li class="card-item"><span data-item="area_total"></span> m<sup>2</sup></li>
                <li class="card-item"><span data-item="quarto"></span>Quarto</li>
                <li class="card-item"><span data-item="sala_de_estar"></span>Sala de Estar</li>
                <li class="card-item"><span data-item="banheiro"></span>Banheiro</li>
            </ul>
            <div class="card-container-text">
                <div class="card-text-left">
                    <p class="card-subtitulo-valor">IPTU+Condominio: R$<span data-item="condominio"></span></p>
                    <p class="card-valor">R$ <span data-item="preco"></span></p>
                </div>
                <div class="card-text-right">
                    <button class="card-button">Ver Mais</button>
                </div>
            </div>
        </div>
    </article>
</template>
<!--Card Large-->