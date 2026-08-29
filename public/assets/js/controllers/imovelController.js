// ImovelController.js

import { CardController } from './CardController.js';
import { CardService } from '../service/CardService.js';

import { PaginacaoController } from './PaginacaoController.js';
import { PaginacaoService } from '../service/PaginacaoService.js';

export class ImovelController {

    constructor(service, templateCard, filtroController) {

        this.service = service;

        this.cardController = new CardController(
            new CardService(templateCard)
        );

        this.paginacaoController = new PaginacaoController(
            new PaginacaoService()
        );

        this.filtroController = filtroController;

        this.totalImoveis =
            document.querySelector('.option-text-catalog');
    }

    async carregarImoveis(
        containerCatalog,
        filtros = [],
        pagina = 1
    ) {

        try {

            const resposta =
                await this.service.listar(
                    filtros,
                    pagina
                );

            // Imóveis
            const dadosImovel =
                resposta.data.data;

            this.cardController.carregarCards(
                containerCatalog,
                dadosImovel
            );

        } catch (error) {

            console.error(
                'Erro ao carregar imóveis:',
                error
            );
        }
    }
}