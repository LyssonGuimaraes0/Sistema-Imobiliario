import { FiltroController } from "../controllers/FiltroController.js";
import { FiltroService } from "../service/FiltroService.js";
import { ImovelController } from "../controllers/imovelController.js";
import { ImovelService } from "../service/ImoveisService.js";

// Filtros
const filtrosService =
    new FiltroService();

const Filtros =
    new FiltroController(
        filtrosService
    );

Filtros.render();

// Template
const templateCard =
    document.querySelector(
        '#card-template'
    );

// Container
const containerCatalog =
    document.querySelector(
        '.row-calalog'
    );

// Imóveis
const Imoveis =
    new ImovelController(
        new ImovelService(),
        templateCard,
        Filtros
    );

// Primeira carga
Imoveis.carregarImoveis(
    containerCatalog,
    Filtros.listar(),
    1
);

// Função de reload
function reloadCards() {

    const tagContainer= document.querySelector('.tag-more-container');

        if (tagContainer && tagContainer.children.length === 0) {
            tagContainer.classList.remove('active')
        }

    setTimeout(() => {

        filtrosAtivos =
            Filtros.listar();

        Imoveis.carregarImoveis(
            containerCatalog,
            filtrosAtivos
        );

    }, 300);
}

//---------------------- Controle de filtros ----------------------//

let filtrosAtivos;

// Endereço
const inputEndereco =
    document.querySelector('[search]');

const dropdownEndereco =
    document.querySelector('.dropdown-input-element');

// Clique no endereço do dropdown
dropdownEndereco.addEventListener('click', (e) => {

    const option =
        e.target.closest('.dropdown-option');

    if (!option) return;

    inputEndereco.value =
        option.textContent
            .replace(/\s+/g, ' ')
            .trim();

    dropdownEndereco.innerHTML = '';
    dropdownEndereco.style.display = 'none';
});

// Botão Buscar
const btnFilterHeader =
    document.querySelector('#btn-filter-header');

btnFilterHeader.addEventListener('click', () => {

    if (inputEndereco.value.trim() !== '') {

        const resultado =
            inputEndereco.value
                .split('-')[0]
                .trim();

        const valorFiltro =
            resultado.normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .replace(/[^a-zA-Z0-9\s]/g, '_')
                .replace(/\s/g, '_')
                .toLowerCase();

        Filtros.adicionar({
            tipo: inputEndereco.dataset.filter,
            valor: valorFiltro
        });
    }

    Imoveis.carregarImoveis(
        containerCatalog,
        Filtros.listar(),
        1
    );
});

const containerFiltro =
    document.querySelector('.container-filtro');

const containerFiltroAtivos =
    document.querySelector('.filtro-tags');

// Remove filtro
// Remove filtro
containerFiltroAtivos.addEventListener('click', (e) => {

    const tagMore =
        e.target.closest('.tag-more');

    const removeTag =
        e.target.closest('#remove-tag');

    const removeAll =
        e.target.closest('#removerAllFilter');

    if (!tagMore && !removeTag && !removeAll) {
        return;
    }

    if (tagMore) {

        document
            .querySelector('.tag-more-container')
            .classList.toggle('active');

        return;
    }

    if (removeAll) {

        Filtros.removeAll();

        reloadCards();

        return;
    }

    const tag =
        removeTag.closest('.tag');

    Filtros.remove(
        tag.dataset.id
    );

    reloadCards();
});
//Clicou dentro da tagMore
containerFiltro.addEventListener('click', (e) => {

    const tagMore =
        e.target.closest('.tag-more-container');

    if (!tagMore) {
        return;
    }


    const tag =
        e.target.closest('.tag');

    Filtros.remove(
        tag.dataset.id
    );

    reloadCards();

});

// Select e checkbox
containerFiltro.addEventListener('change', (e) => {

    const elemento = e.target;

    if (
        elemento.tagName !== 'SELECT' &&
        !(
            elemento.tagName === 'INPUT' &&
            elemento.type === 'checkbox'
        )
    ) {
        return;
    }

    const filtro = {
        tipo: elemento.dataset.tipo,
        valor: elemento.value
    };

    if (elemento.type === 'checkbox') {

        if (elemento.checked) {

            const checkboxes =
                document.querySelectorAll(
                    `input[type="checkbox"][data-tipo="${elemento.dataset.tipo}"]`
                );

            checkboxes.forEach(checkbox => {

                if (checkbox !== elemento) {
                    checkbox.checked = false;
                }

            });
        }

        filtro.valor =
            elemento.checked
                ? elemento.value
                : null;
    }

    Filtros.adicionar(filtro);

    reloadCards();
});

// Input de filtros
let timeout;

containerFiltro.addEventListener('input', (e) => {

    clearTimeout(timeout);

    timeout = setTimeout(() => {

        const elemento = e.target;

        if (
            !elemento.classList.contains(
                'input-filtro'
            )
        ) {
            return;
        }

        const filtro = {
            tipo: elemento.dataset.tipo,
            valor: elemento.value
        };

        Filtros.adicionar(filtro);

        reloadCards();

    }, 500);
});