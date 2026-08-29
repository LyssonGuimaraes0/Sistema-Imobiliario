export class FiltroController {

    constructor(service) {
        this.service = service;

        this.templateTag =
            document.querySelector('#template-tag');

        this.templateTagmore =
            document.querySelector('#template-tagmore');

        this.container =
            document.querySelector('.list-tags');

        // Endereço
        this.inputEndereco =
            document.querySelector('[search]');

        this.dropdownEndereco =
            document.querySelector('.dropdown-input-element');

        this.modificadores = {
            quarto: 'Quartos',
            banheiro: 'Banheiros',
            garagem: 'Vagas',
            preco_max: 'Pr. min',
            preco_min: 'Pr. max',
            area_min: 'Ár. max',
            area_max: 'Ár. min',
        };

        this.service.carregarFiltros();
    }

    // Adicionar filtro
    adicionar(filtro) {
        this.service.adicionar(filtro);
        this.render();
    }


    // Remover filtro
    remove(id) {
        this.service.remove(id);
        this.render();
    }

    // Remove todos filtros
    removeAll() {
        this.service.removeAll();
        this.render();
    }

    // Listar filtros
    listar() {
        return this.service.listar();
    }

    // Renderizar no HTML
    render() {

        this.container.innerHTML = '';

        const filtros = this.listar();

        filtros.slice(0, 3).forEach((filtro, index) => {

            const clone =
                this.templateTag.content.cloneNode(true);

            const tag =
                clone.querySelector('.tag');

            const texto =
                this.modificadores[filtro.tipo]
                    ? `${this.modificadores[filtro.tipo]}: ${filtro.valor}`
                    : filtro.valor;

            tag.dataset.id = index;

            const nameTag =
                tag.querySelector('span');

            nameTag.textContent = texto;

            this.container.appendChild(tag);
        });

        if (filtros.length > 3) {

            const clone =
                this.templateTagmore.content.cloneNode(true);

            const tagMore =
                clone.querySelector('.tag-more');

            const nameTag =
                tagMore.querySelector('span');

            nameTag.textContent =
                `+${filtros.length - 3}`;

            this.container.appendChild(tagMore);
        }
    }
}