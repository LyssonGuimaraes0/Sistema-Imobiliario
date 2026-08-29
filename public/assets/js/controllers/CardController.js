// CardController.js

export class CardController {

    constructor(service) {

        this.service = service;
    }

    carregarCards(containerCatalog, dadosImovel) {

        this.service.mostrarSkeleton(
            containerCatalog
        );

        setTimeout(() => {

            this.service.carregar(
                containerCatalog,
                dadosImovel
            );

        }, 820);
    }

    gerarPaginacao(ul, totalPaginas, paginaAtual) {

        this.service.gerarPaginacao(
            ul,
            totalPaginas,
            paginaAtual
        );
    }
}