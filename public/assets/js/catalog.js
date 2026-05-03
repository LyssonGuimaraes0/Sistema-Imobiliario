//Coleta de dados de Páginação

fetch('http://localhost/trabalhos/imobiliaria/api/imoveis')
    .then(response => {
        // Aqui você vê o "envelope" que postou na pergunta
        return response.json(); // Isso extrai os dados do body e converte em objeto
    })
    .then(data => {
        const totalPaginas = data.data.total_paginas;
        console.log(totalPaginas);
        GerarPaginacao(totalPaginas);
    });

function GerarPaginacao(totalPaginas) {
    const ulCatalogo = document.querySelector('.container-botoes-paginacao');
    const liprev = document.createElement('li');
    const liNext = document.createElement('li');
    liprev.textContent = "<";
    liNext.textContent = ">";
    ulCatalogo.appendChild(liprev);
    for (let index = 1; index <= totalPaginas; index++) {
        const itemLista = document.createElement('li');
        itemLista.textContent = index;
        itemLista.value = index;
        ulCatalogo.appendChild(itemLista);

    }
    ulCatalogo.appendChild(liNext);
}
