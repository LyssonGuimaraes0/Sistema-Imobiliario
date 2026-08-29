// ImoveisService.js

import { getImoveis } from "./api/imoveisApi.js";

export class ImovelService {

    constructor() {
        this.cache = {};
    }

    //Lista imoveis baseados na busca
    async listar(filtros = [], pagina = 1) {

        const filtrosOrdenados = [...filtros].sort(
            (a, b) => a.tipo.localeCompare(b.tipo)
        );

        const params = new URLSearchParams();

        filtrosOrdenados.forEach(filtro => {

            if (
                filtro.valor !== null &&
                filtro.valor !== ''
            ) {
                params.set(
                    filtro.tipo,
                    filtro.valor
                );
            }

        });

        params.set('page', pagina);

        const chave = params.toString();
        
        //Verifica se existe cache
        if (this.cache[chave]) {
            return this.cache[chave];
        }

        const resposta =
            await getImoveis(chave);

        this.cache[chave] = resposta;

        return resposta;
    }
}