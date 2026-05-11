import { formatTextForMoney } from "./utils/format.js";
import { request } from "./service/ajax.js";
import { delay } from "./utils/delay.js";
import { mostrarSkeleton } from "./utils/card.js";
import { filterToInputs } from "./utils/filter.js";
import { filterToSelectOption } from "./utils/filter.js";


//================Funções Principais==============

//Função de Carregamento de Imoveis(Com OU sem Filtro)
async function carregarImoveis(pagina) {

    //apresentação loading
    mostrarSkeleton(containerCatalog, template);

    await delay(800);

    // Captura os parâmetros da URL atual (ex: ?municipio=sao_paulo)
    const queryParams = window.location.search;

    // PEGA URL ATUALIZADA
    const params = new URLSearchParams(window.location.search);

    // Atualiza página
    params.set('page', pagina);

    const response = await request(
        'http://localhost/trabalhos/imobiliaria/api/imoveis/?' +
        params.toString()
    );

    const dadosImovel = response.data.data;

    containerCatalog.innerHTML = '';


    dadosImovel.forEach(dadoImovel => {
        containerCatalog.appendChild(
            CriarCard(dadoImovel, 'default')
        );
    });

}

//=============================================================


//Função de Geração de Paginação do catalogo

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

//=================================================


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

//=================================================



//================Ações da Pagína===================

//Coleta de dados de Páginação na primeira recarga

const queryParams = window.location.search;

let totalPaginas = 0;
let totalImovel = 0;
//Ver url e busca informação de page, caso n tenha torna pagina 1
const params = new URLSearchParams(window.location.search);
let paginaAtual = parseInt(params.get('page')) || 1;


//Selecionar Inputs de search
const inputSearh = document.querySelector('[search]');
const dropdown = document.querySelector('.dropdown-input-element');

//Coleta de itens de catalogo
const containerCatalog = document.querySelector('.row-calalog');
const template = document.querySelector('#card-template');


request('http://localhost/trabalhos/imobiliaria/api/imoveis/' + queryParams)
    .then(response => {
        totalPaginas = response.data.pagination.total_paginas;
        totalImovel = response.data.pagination.total_registros
        const listAddress = response.data.address_to_list;

        //Gera Total Imoveis encontrados

        const totalImoveisTexto = document.querySelector('.option-text-catalog');
        totalImoveisTexto.textContent = `${totalImovel} imoveis encontrados`;

        GerarPaginacao(totalPaginas);

        carregarImoveis(paginaAtual);

        filterToSelectOption(inputSearh, dropdown, listAddress)
    });

/* ============================================================================ */


//Configurações de Filtros do Header

const btnFilterHeader = document.querySelector('#btn-filter-header');

btnFilterHeader.addEventListener('click', async function () {
    const inputs = document.querySelectorAll('[data-filter]');
    let queryFilter = filterToInputs(inputs);

    //Trava botão para impedir varios clique
    btnFilterHeader.disabled = true;

    try {
        const response = await request('http://localhost/trabalhos/imobiliaria/api/imoveis/?' + queryFilter)

        //Atualiza URL com filtros
        paginaAtual = 1;

        //Atualiza URL com filtros
        history.pushState(
            null,
            '',
            `catalog?page=${paginaAtual}&${queryFilter}`
        );

        totalPaginas = response.data.pagination.total_paginas;
        totalImovel = response.data.pagination.total_registros

        const totalImoveisTexto = document.querySelector('.option-text-catalog');
        totalImoveisTexto.textContent = `${totalImovel} imoveis encontrados`;

        GerarPaginacao(totalPaginas);

        await carregarImoveis(paginaAtual);

    } catch (error) {

        console.error(error);

    } finally {

        btnFilterHeader.disabled = false;
    }


})


/* ============================================================================ */


//=============Configuração de Botão Next e Prev de Páginação===================

const ulCatalogo = document.querySelector('.container-botoes-paginacao');

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

    const params = new URLSearchParams(window.location.search);

    params.set('page', paginaAtual);

    history.pushState(null, '', `?${params.toString()}`);

    carregarImoveis(paginaAtual);
});

/* ============================================================================ */

/* ==========================Evento de clique em dropdown===================================== */


dropdown.addEventListener('click', (event) => {

    const option = event.target.closest('.dropdown-option');

    if(!option) return;

    inputSearh.value = option.textContent
    .replace(/\s+/g, ' ')
    .trim();

});



/* ============================================================================ */


//Verificar cliques do usuario para libera outros inputs
/*
const inputCategory = document.querySelector('#input-category');
const inputType = document.querySelector('#input-type');
const inputModality = document.querySelector('#input-modality');

let timeout;

inputCategory.addEventListener('input', () => {
    clearTimeout(timeout);

    if (inputCategory.value == "") {
        inputType.setAttribute('readonly',true)
        inputModality.setAttribute('readonly',true)
        return
    }



    timeout = setTimeout(() => {
        inputType.removeAttribute('readonly')
        inputModality.removeAttribute('readonly')
    }, 500);
}); */

//============================//





