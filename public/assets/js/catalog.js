import { formatTextForMoney } from "./utils/format.js";
import { request } from "./service/ajax.js";



//Coleta de dados de Páginação na primeira recarga

const queryParams = window.location.search;


let totalPaginas = 0;
//Ver url e busca informação de page, caso n tenha torna pagina 1
const params = new URLSearchParams(window.location.search);
let paginaAtual = parseInt(params.get('page')) || 1;


request('http://localhost/trabalhos/imobiliaria/api/imoveis/'+ queryParams)
    .then(response => {
        totalPaginas = response.data.pagination.total_paginas;

        GerarPaginacao(totalPaginas);

        carregarImoveis(paginaAtual);
    });


//Segunda recarga da Página atraves de clique
function carregarImoveis(pagina) {
    // Captura os parâmetros da URL atual (ex: ?municipio=sao_paulo)
    const queryParams = window.location.search;
    params.set('page', pagina);
    request('http://localhost/trabalhos/imobiliaria/api/imoveis/?' + params.toString())
        .then(response => {
            const dadosImovel = response.data.data;

            const containerCatalog = document.querySelector('.row-calalog');

            // LIMPA antes de renderizar
            containerCatalog.innerHTML = '';

            dadosImovel.forEach(dadoImovel => {
                containerCatalog.appendChild(CriarCard(dadoImovel, 'default'))
            });
        });
}


const ulCatalogo = document.querySelector('.container-botoes-paginacao');

//função de Geração de Páginação
function GerarPaginacao(totalPaginas) {

    ulCatalogo.innerHTML = '';

    //Li padrão e link
    const itemLi = document.createElement('li')
    const link = document.createElement('a');

    //Define link
    link.href = "#";

    //Define Botoes next e prev
    const CloneliPrev = itemLi.cloneNode(true)
    const CloneliNext = itemLi.cloneNode(true)


    //Clone de link
    const ClonelinkPrev = link.cloneNode(true)
    const ClonelinkNext = link.cloneNode(true)
    ClonelinkPrev.innerHTML = "<i class='fa-solid fa-angle-left'></i>";
    ClonelinkNext.innerHTML = "<i class='fa-solid fa-angle-right'></i>";

    ClonelinkPrev.classList.add('btn-prev');
    ClonelinkNext.classList.add('btn-next');

    //Configura visualização de link

    (paginaAtual == 1) ? ClonelinkPrev.href = `?page=${paginaAtual}` : ClonelinkPrev.href = `?page=${paginaAtual - 1}`;

    (totalPaginas == paginaAtual) ? ClonelinkNext.href = `?page=${paginaAtual}` : ClonelinkNext.href = `?page=${paginaAtual + 1}`

    //Define link para li
    CloneliPrev.appendChild(ClonelinkPrev);
    CloneliNext.appendChild(ClonelinkNext);

    ulCatalogo.appendChild(CloneliPrev);

    for (let index = 1; index <= totalPaginas; index++) {
        const itemLista = itemLi.cloneNode(true)
        const itemLink = link.cloneNode(true)

        //Define link
        itemLink.href = `?page=${index}`;
        itemLink.dataset.page = index;
        itemLink.textContent = index;
        itemLista.classList.add('card-page')

        //Configura link na li
        itemLista.appendChild(itemLink);

        itemLista.value = index;
        ulCatalogo.appendChild(itemLista);


    }
    ulCatalogo.appendChild(CloneliNext);


}

ulCatalogo.addEventListener('click', (e) => {
    const link = e.target.closest('a');
    if (!link) return;

    e.preventDefault();

    let page = link.dataset.page;

    // NEXT
    if (link.classList.contains('btn-next')) {
        if (paginaAtual < totalPaginas) {
            page = paginaAtual + 1;
        }
    }
    //PREV
    if (link.classList.contains('btn-prev')) {
        if (paginaAtual > 1) {
            page = paginaAtual - 1;
        }
    }

    if (!page) return;

    paginaAtual = parseInt(page);

    history.pushState(null, '', `?page=${paginaAtual}`);

    carregarImoveis(paginaAtual);
});






//função de Criação de cards

const templateCardDefault = document.querySelector('#card-template')

function CriarCard(dadoImovel, tipo = 'default') {
    if (tipo == 'default') {
        var cloneCard = templateCardDefault.content.cloneNode(true);
    }
    //Adição de Elementos a cards
    cloneCard.querySelector('.card-titulo').textContent = dadoImovel.nome_imovel;
    cloneCard.querySelector('.card-dimensao').innerHTML = `${dadoImovel.dimensao}<sup>2</sup>m`
    cloneCard.querySelector('#item-quarto').textContent += dadoImovel.quarto;
    cloneCard.querySelector('#item-sala_estar').textContent += dadoImovel.sala_de_estar;
    cloneCard.querySelector('#item-banheiro').textContent += dadoImovel.bunheiro;
    cloneCard.querySelector('#item-suit').textContent += dadoImovel.suit;
    cloneCard.querySelector('.card-valor').textContent = formatTextForMoney(dadoImovel.preco.toString());

    return cloneCard;


}