export class FiltroService {

    constructor() {
        this.filtros = [];
    }

    getFiltros() {
        const params = new URLSearchParams(window.location.search);

        return Object.fromEntries(params.entries());
    }

    //Atualizar URL 
    atualizarUrl() {
        const params = new URLSearchParams();

        this.filtros.forEach(filtro => {
            params.set(filtro.tipo, filtro.valor);
        });

        const queryStr = params.toString();

        const novaUrl = queryStr
            ? `${window.location.pathname}?${queryStr}`
            : window.location.pathname;

        window.history.replaceState({}, '', novaUrl);
    }

    carregarFiltros() {
        const filtrosUrl = this.getFiltros();

        Object.entries(filtrosUrl).forEach(([tipo, valor]) => {

            this.filtros.push({
                tipo,
                valor
            });
        });
    }

    adicionar(filtro) {

        // Se selecionou "Nenhum", apenas remove o filtro desse tipo
        if (!filtro.valor) {
            this.filtros = this.filtros.filter(
                item => item.tipo !== filtro.tipo
            );

            this.atualizarUrl();
            return;
        }

        this.filtros = this.filtros.filter(
            item => item.tipo !== filtro.tipo
        );

        this.filtros.push(filtro);

        this.atualizarUrl();
    }


    //Remove pela chave e atualiza url
    remove(index) {
        const filtro = this.filtros[index];

        if (!filtro) {
            return;
        }

        this.filtros.splice(index, 1);
        this.atualizarUrl();
    }

    //Limpa todos os filtro
    removeAll() {
        this.filtros = []
        this.atualizarUrl();
    }

    listar() {
        return this.filtros;
    }
}