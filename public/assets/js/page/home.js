import { request } from "../service/ajax.js";
import {
    mostrarSkeleton,
    carregarImoveis,
    GerarPaginacao
} from "../utils/card.js";

let response
let dadosImovel
const params = new URLSearchParams(window.location.search);

//Criação de Cards carrosel

//Coleta de itens de catalogo
const containerCarrossel = document.querySelector('.carrosel-list');
const template = document.querySelector('#card-template');
let paginaAtual = parseInt(params.get('page')) || 1;
//Parametro padrão
const queryParams = {
    query: {
        limit: 9
    }
};

mostrarSkeleton(containerCarrossel, template);

//Busca dados para criar cards
try {
    response = await request(`${urlBase}/api/imoveis/?` + queryParams);

    dadosImovel = response.data.data;

    await carregarImoveis(template, containerCarrossel, paginaAtual, dadosImovel);

} catch (error) {
    console.log(error)
}

//Verifica Botões de movimenta carrosel

let position = 0;
let cardAtual = 0;

const dots = document.querySelectorAll('.dott-pagination');

document.querySelector('.next').addEventListener('click', () => {

    const card = document.querySelector('.card');
    const cardsPorPagina = Math.floor(containerCarrossel.clientWidth / card.offsetWidth);
    const translateValue = cardsPorPagina * card.offsetWidth;

    // Impede passar do último dot
    const paginaAtual = Math.floor(cardAtual / 3);

    const totalCards = document.querySelectorAll('.card').length;

    if (cardAtual + cardsPorPagina >= totalCards) {
        return;
    }

    position += translateValue;
    cardAtual += cardsPorPagina;

    containerCarrossel.style.transform = `translateX(-${position}px)`;

    updateDots();

});

document.querySelector('.prev').addEventListener('click', () => {

    const card = document.querySelector('.card');
    const cardsPorPagina = Math.floor(containerCarrossel.clientWidth / card.offsetWidth);
    const translateValue = cardsPorPagina * card.offsetWidth;

    if (cardAtual <= 0) {
        return;
    }

    position -= translateValue;
    cardAtual -= cardsPorPagina;

    if (cardAtual < 0) {
        cardAtual = 0;
    }

    containerCarrossel.style.transform = `translateX(-${position}px)`;

    updateDots();

});

function updateDots() {

    const paginaAtual = Math.floor(cardAtual / 3);

    dots.forEach(dot => dot.classList.remove('active'));

    dots[paginaAtual].classList.add('active');

}
