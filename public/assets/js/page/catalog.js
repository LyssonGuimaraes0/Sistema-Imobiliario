// catalog.js

import { FiltroController } from "../controllers/FiltroController.js";
import { FiltroService } from "../service/FiltroService.js";
import { ImovelController } from "../controllers/imovelController.js";
import { ImovelService } from "../service/ImoveisService.js";

// Filtros
const Filtrosservice = new FiltroService();
const Filtros = new FiltroController(Filtrosservice);

Filtros.render();

// Template
const templateCardDefault =
    document.querySelector('#card-template');

// Container
const containerCatalog =
    document.querySelector('.row-calalog');

// Primeira carga
const Imoveis = new ImovelController(
    new ImovelService(),
    templateCardDefault,
    Filtros
);

//Função de relaod cards
function reloadCards() {
    setTimeout(() => {

        filtrosAtivos = Filtros.listar();

        Imoveis.carregarImoveis(
            containerCatalog,
            filtrosAtivos
        );

    }, 300);
}

reloadCards();


//----------------------Controle de filtros----------------------//

let filtrosAtivos
const btnFilterHeader =
    document.querySelector('#btn-filter-header');

btnFilterHeader.addEventListener('click', () => {

    const filtrosAtivos =
        Filtros.listar();

    Imoveis.carregarImoveis(
        containerCatalog,
        filtrosAtivos,
        1
    );

});


const containerFiltro = document.querySelector('.container-filtro')
const containerFiltroAtivos = document.querySelector('.filtro-tags')
//Remove unico filtro
containerFiltroAtivos.addEventListener('click', (e) => {

    if (!e.target.id === "remove-tag" || !e.target.id === "removerAllFilter") return;

    //btn remover todos filtros
    if (e.target.id === "removerAllFilter") {
        Filtros.removeAll();
        reloadCards()
        return;
    }

    let tag = e.target.closest('.tag')
    Filtros.remove(tag.dataset.id)
    reloadCards()

})


//Selecionar filtros de select e checkbox
containerFiltro.addEventListener('change', (e) => {

    const elemento = e.target;

    if (
        elemento.tagName !== 'SELECT' &&
        !(elemento.tagName === 'INPUT' && elemento.type === 'checkbox')
    ) {
        return;
    }

    const filtro = {
        tipo: elemento.dataset.tipo,
        valor: elemento.value
    };

    if (elemento.type === 'checkbox') {

    if (elemento.checked) {

        const checkboxes = document.querySelectorAll(
            `input[type="checkbox"][data-tipo="${elemento.dataset.tipo}"]`
        );

        checkboxes.forEach(checkbox => {

            if (checkbox !== elemento) {
                checkbox.checked = false;
            }

        });

    }

    filtro.valor = elemento.checked
        ? elemento.value
        : null;
}
    Filtros.adicionar(filtro);

    reloadCards()

})

//Selecionar filtro de input
let timeout;
containerFiltro.addEventListener('input', (e) => {

    clearTimeout(timeout);

    timeout = setTimeout(() => {
        const elemento = e.target;

        if (!elemento.classList.contains('input-filtro')) return;

        const filtro = {
            tipo: elemento.dataset.tipo,
            valor: elemento.value
        };

        Filtros.adicionar(filtro);
        reloadCards()

    }, 500);

});
