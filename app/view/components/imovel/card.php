<!--Card Default-->
<template id="card-template">
    <article class="card">
        <div class="card-head">
            <img class="card-img" src= "<?= IMAGEM_URL?>/placeholder/image-not-found.png" alt="Image-not-found">
        </div>
        <div class="card-description">
            <h3 class="card-titulo"></h3>
            <div class="card-container-text">
                <div class="card-text-left">
                    <span class="card-item card-dimensao"> <sup>2</sup></span>
                    <ul>
                        <li class="card-item" id="item-quarto">Quarto </li>
                        <li class="card-item" id="item-sala_estar">Sala de Estar </li>
                        <li class="card-item" id="item-banheiro">Banheiro </li>
                        <li class="card-item" id="item-suit">Suit </li>
                    </ul>
                </div>
                <div class="card-text-right">
                    <span class="card-valor"></span>
                    <button class="card-button">Ver Mais</button>
                </div>
            </div>
        </div>
    </article>
</template>
<!--Card Large-->