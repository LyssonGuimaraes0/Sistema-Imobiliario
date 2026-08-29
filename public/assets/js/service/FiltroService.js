export class FiltroService {

    constructor() {

        this.filtros = [];
        this.enderecos = [];
    }

    getFiltros() {

        const params =
            new URLSearchParams(
                window.location.search
            );

        return Object.fromEntries(
            params.entries()
        );
    }

    atualizarUrl() {

        const params =
            new URLSearchParams();

        this.filtros.forEach(filtro => {

            params.set(
                filtro.tipo,
                filtro.valor
            );
        });

        const queryStr =
            params.toString();

        const novaUrl = queryStr
            ? `${window.location.pathname}?${queryStr}`
            : window.location.pathname;

        window.history.replaceState(
            {},
            '',
            novaUrl
        );
    }

    carregarEnderecos(enderecos) {

        this.enderecos = enderecos;
    }

    listarEnderecos() {

        return this.enderecos;
    }

    carregarFiltros() {

        const filtrosUrl =
            this.getFiltros();

        Object.entries(filtrosUrl)
            .forEach(([tipo, valor]) => {

                this.filtros.push({
                    tipo,
                    valor
                });
            });
    }

    adicionar(filtro) {

        if (!filtro.valor) {

            this.filtros =
                this.filtros.filter(
                    item => item.tipo !== filtro.tipo
                );

            this.atualizarUrl();

            return;
        }

        this.filtros =
            this.filtros.filter(
                item => item.tipo !== filtro.tipo
            );

        this.filtros.push(filtro);

        this.atualizarUrl();
    }

    remove(index) {

        const filtro =
            this.filtros[index];

        if (!filtro) {
            return;
        }

        this.filtros.splice(index, 1);

        this.atualizarUrl();
    }

    removeAll() {

        this.filtros = [];

        this.atualizarUrl();
    }

    listar() {

        return this.filtros;
    }
}