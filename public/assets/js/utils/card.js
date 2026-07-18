
//================Funções Principais==============

//Função de Carregamento de Imoveis(Com OU sem Filtro)
export async function carregarImoveis(template, containerCatalog, pagina, dadosImovel) {

    //apresentação loading
    mostrarSkeleton(containerCatalog, template);

    setTimeout(() => {

        //Caso esteja não possua registro de Imovel
        if (Array.isArray(dadosImovel) && dadosImovel.length === 0) {
            containerCatalog.innerHTML = '';
            containerCatalog.appendChild(getMensageSemImoveis());
            return;
        }

        // Captura os parâmetros da URL atual (ex: ?municipio=sao_paulo)
        const queryParams = window.location.search;

        // PEGA URL ATUALIZADA
        const params = new URLSearchParams(window.location.search);

        // Atualiza página
        params.set('page', pagina);


        containerCatalog.innerHTML = '';

        dadosImovel.forEach(dadoImovel => {
            containerCatalog.appendChild(
                CriarCard(template, dadoImovel, 'default')
            );
        });

    }, 820);


}

// Gera mensagem de erro caso não possua imoveis
function getMensageSemImoveis() {
    const div = document.createElement('div');

    div.classList.add('sem-imoveis');

    div.innerHTML = `
        <i class="fa-solid fa-house-circle-xmark"></i>
        <p>Nenhum imóvel foi encontrado.</p>
    `;

    return div;
}


//Criar Modelo para apresentação ao carregar a página
export function mostrarSkeleton(containerCatalog, template, qtd = 9) {

    containerCatalog.innerHTML = '';

    for (let i = 0; i < qtd; i++) {

        const clone = template.content.cloneNode(true);

        const card = clone.querySelector('.card');

        card.classList.add('loading-card');

        containerCatalog.appendChild(clone);
    }
}

//função de Criação de cards

function CriarCard(template, dadoImovel, tipo = 'default') {

    var cloneFragment = template.content.cloneNode(true);

    // 1. Seleciona o elemento real (<article>) de dentro do fragmento
    const cloneCard = cloneFragment.querySelector('.card');

    // 2. Agora sim, adiciona o data-card na raiz do elemento
    cloneCard.dataset.card = dadoImovel.id;

    //Cria Elementos Existentes do card
    Object.entries(dadoImovel).forEach(([chave, valor]) => {
        const elemento = cloneCard.querySelector(`[data-item="${chave}"]`);

        if (elemento) {
            elemento.textContent = valor;
        }
    });

    const imagemCard = cloneCard.querySelector('.card-img');
    imagemCard.src += dadoImovel.caminho_arquivo

    return cloneCard;

}


//Função de Geração de Paginação do catalogo

export function GerarPaginacao(ulCatalogo, totalPaginas, paginaAtual) {

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
