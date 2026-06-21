import { formatTextForMoney } from "../utils/format.js";
import { request } from "./ajax.js";
import { delay } from "../utils/delay.js";
import {
    mostrarSkeleton,
    carregarImoveis,
    GerarPaginacao
} from "../utils/card.js";
import { filterToInputs } from "../utils/filter.js";
import { filterToSelectOption } from "../utils/filter.js";


const ulCatalogo = document.querySelector('.container-botoes-paginacao');
const totalImoveisTexto = document.querySelector('.option-text-catalog');

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

//apresentação loading
mostrarSkeleton(containerCatalog, template);

let dadosImovel

//Carregar cards
let response = await request(`${urlBase}/api/imoveis/?` + params.toString());


dadosImovel = response.data.data;

//Carrega Páginação e cards


try {
    const response = await request(
        'http://localhost/trabalhos/imobiliaria/api/imoveis/' + queryParams
    );

    totalPaginas = response.data.pagination.total_paginas;
    totalImovel = response.data.pagination.total_registros
    const listAddress = response.data.address_to_list;

    //Gera Total Imoveis encontrados

    totalImoveisTexto.style.display = "none";

    totalImoveisTexto.textContent = `${totalImovel} imoveis encontrados`;

    GerarPaginacao(ulCatalogo, totalPaginas, paginaAtual);

    await carregarImoveis(template, containerCatalog, paginaAtual, dadosImovel);

    totalImoveisTexto.style.display = "block"

    filterToSelectOption(inputSearh, dropdown, listAddress)


} catch (error) {
    console.log(error)
}




/* ============================================================================ */


//Configurações de Filtros do Header

const btnFilterHeader = document.querySelector('#btn-filter-header');

btnFilterHeader.addEventListener('click', async function () {
    const inputs = document.querySelectorAll('[data-filter]');

    totalImoveisTexto.style.display = "none";


    let queryFilter = filterToInputs(inputs);

    //Trava botão para impedir varios clique
    btnFilterHeader.disabled = true;

    try {
        const response = await request('http://localhost/trabalhos/imobiliaria/api/imoveis/?' + queryFilter)

        //Atualiza URL com filtros
        paginaAtual = 1;

        //Atualiza URL com filtros
        const url = new URL(window.location);

        url.searchParams.set('page', paginaAtual);

        history.pushState({}, '', url);

        dadosImovel = response.data.data;
        totalPaginas = response.data.pagination.total_paginas;
        totalImovel = response.data.pagination.total_registros

        //apresentação loading
        mostrarSkeleton(containerCatalog, template);


        totalImoveisTexto.textContent = `${totalImovel} imoveis encontrados`;

        GerarPaginacao(ulCatalogo, totalPaginas, paginaAtual);

        await carregarImoveis(template, containerCatalog, paginaAtual, dadosImovel);

        setTimeout(() => {
            totalImoveisTexto.style.display = "block"
        }, 820);



    } catch (error) {

        console.error(error);

    } finally {

        btnFilterHeader.disabled = false;
    }


})


/* ============================================================================ */


//=============Configuração de Botão Next e Prev de Páginação===================

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

    carregarImoveis(template, containerCatalog, paginaAtual, dadosImovel);

});

/* ============================================================================ */

/* ==========================Evento de clique em dropdown===================================== */


dropdown.addEventListener('click', (event) => {

    const option = event.target.closest('.dropdown-option');

    if (!option) return;

    inputSearh.value = option.textContent
        .replace(/\s+/g, ' ')
        .trim();

});







