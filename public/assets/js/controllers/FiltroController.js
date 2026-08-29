export class FiltroController {

    constructor(service) {

        this.service = service;

        this.templateTag =
            document.querySelector('#template-tag');

        this.templateTagmore =
            document.querySelector('#template-tagmore');

        this.tagMoreContainer = document.querySelector('.tag-more-container')

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

        this.configurarEndereco();
    }

    adicionar(filtro) {

        this.service.adicionar(filtro);

        this.render();
    }

    configurarEndereco() {

        this.inputEndereco.addEventListener('input', () => {

            const valor =
                this.inputEndereco.value
                    .toLowerCase()
                    .trim();

            this.dropdownEndereco.innerHTML = '';

            if (!valor) {
                this.dropdownEndereco.style.display = 'none';
                return;
            }

            const enderecos =
                this.service.listarEnderecos();

            const resultados =
                enderecos.filter(endereco =>
                    endereco.bairro
                        .toLowerCase()
                        .includes(valor)
                );

            resultados.forEach(endereco => {

                const option =
                    document.createElement('div');

                option.classList.add(
                    'dropdown-option'
                );

                option.textContent =
                    `${endereco.bairro} - ${endereco.municipio} - ${endereco.estado}`;

                option.dataset.bairro =
                    endereco.bairro;

                this.dropdownEndereco.appendChild(option);
            });

            // MOSTRA / ESCONDE O DROPDOWN
            this.dropdownEndereco.style.display =
                resultados.length > 0
                    ? 'block'
                    : 'none';
        });

        this.dropdownEndereco.addEventListener('click', (event) => {

            const option =
                event.target.closest('.dropdown-option');

            if (!option) return;

            this.inputEndereco.value =
                option.textContent
                    .replace(/\s+/g, ' ')
                    .trim();

            this.dropdownEndereco.innerHTML = '';
            this.dropdownEndereco.style.display = 'none';
        });
    }

    remove(id) {

        this.service.remove(id);

        this.render();
    }

    removeAll() {

        this.service.removeAll();

        this.render();
    }

    listar() {
        return this.service.listar();
    }

render() {

    this.container.innerHTML = '';

    const filtros = this.listar();

    this.tagMoreContainer.innerHTML = '';
    this.tagMoreContainer.style.display = 'none';

    filtros.forEach((filtro, index) => {

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

        if (index < 3) {
            this.container.appendChild(tag);
        } else {
            this.tagMoreContainer.appendChild(tag);
        }
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