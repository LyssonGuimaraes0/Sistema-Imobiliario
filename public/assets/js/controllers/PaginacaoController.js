// PaginacaoController.js

export class PaginacaoController {

    constructor(service) {

        this.service = service;
    }

    render(pagination) {

        this.service.render(
            pagination
        );
    }
}