// PaginacaoService.js

export class PaginacaoService {

    constructor() {

        this.container =
            document.querySelector(
                '.container-botoes-paginacao'
            );
    }

    render(pagination) {

        const {
            total_paginas,
            page
        } = pagination;

        this.container.innerHTML = '';

        for (
            let pagina = 1;
            pagina <= total_paginas;
            pagina++
        ) {

            const li =
                document.createElement('li');

            const link =
                document.createElement('a');

            link.href = `?page=${pagina}`;

            link.dataset.page = pagina;

            link.textContent = pagina;

            li.appendChild(link);

            this.container.appendChild(li);
        }
    }
}