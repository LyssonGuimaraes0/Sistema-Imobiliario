//Criar Modelo para apresentação ao carregar a página
export function mostrarSkeleton(containerCatalog,template,qtd = 9) {

    containerCatalog.innerHTML = '';

    for (let i = 0; i < qtd; i++) {

        const clone = template.content.cloneNode(true);

        const card = clone.querySelector('.card');

        card.classList.add('loading');

        containerCatalog.appendChild(clone);
    }
}
