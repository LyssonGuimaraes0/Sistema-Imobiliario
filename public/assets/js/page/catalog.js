import { FiltroController } from "../controllers/FiltroController.js";
import { FiltroService } from "../service/FiltroService.js";

//Instancia Classes
const service = new FiltroService()
const Filtros = new FiltroController(service)
Filtros.render();

//----------------------Controle de filtros----------------------//
const containerFiltro = document.querySelector('.container-filtro')
const containerFiltroAtivos = document.querySelector('.filtro-tags')
//Remove unico filtro
containerFiltroAtivos.addEventListener('click', (e) => {

    if (!e.target.id === "remove-tag" || !e.target.id === "removerAllFilter") return;

    //btn remover todos filtros
    if (e.target.id === "removerAllFilter") {
        Filtros.removeAll();
        return;
    }

    let tag = e.target.closest('.tag')
    Filtros.remove(tag.dataset.id)
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
        filtro.valor = elemento.checked
            ? elemento.value
            : null;
    }

    Filtros.adicionar(filtro);


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
        
    }, 500);

});
