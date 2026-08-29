// CardService.js

export class CardService {

    constructor(template) {

        this.card = {
            tipo: 'default',
            template: template,
            seletor: '.card',
            imagem: '.card-img',
            atributoId: 'card',
            item: 'data-item'
        };
    }

    criar(dadoImovel) {

        const {
            template,
            seletor,
            imagem,
            atributoId,
            item
        } = this.card;

        const fragment =
            template.content.cloneNode(true);

        const card =
            fragment.querySelector(seletor);

        card.dataset[atributoId] =
            dadoImovel.id;

        Object.entries(dadoImovel).forEach(
            ([chave, valor]) => {

                const elemento =
                    card.querySelector(
                        `[${item}="${chave}"]`
                    );

                if (elemento) {
                    elemento.textContent = valor;
                }
            }
        );

        const imagemCard =
            card.querySelector(imagem);

        if (
            imagemCard &&
            dadoImovel.caminho_arquivo
        ) {
            imagemCard.src +=
                dadoImovel.caminho_arquivo;
        }

        return card;
    }

    mostrarSkeleton(container, quantidade = 9) {

        container.innerHTML = '';

        for (let i = 0; i < quantidade; i++) {

            const clone =
                this.card.template.content.cloneNode(true);

            const card =
                clone.querySelector(
                    this.card.seletor
                );

            card.classList.add(
                'loading-card'
            );

            container.appendChild(clone);
        }
    }

    carregar(container, dados) {

        container.innerHTML = '';

        if (
            !Array.isArray(dados) ||
            dados.length === 0
        ) {

            container.appendChild(
                this.mensagemSemResultados()
            );

            return;
        }

        dados.forEach(dadoImovel => {

            container.appendChild(
                this.criar(dadoImovel)
            );
        });
    }

    mensagemSemResultados() {

        const div =
            document.createElement('div');

        div.classList.add(
            'sem-imoveis'
        );

        div.innerHTML = `
            <i class="fa-solid fa-house-circle-xmark"></i>
            <p>Nenhum imóvel foi encontrado.</p>
        `;

        return div;
    }
}