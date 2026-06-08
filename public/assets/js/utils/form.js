// Função padrão: recebe o formulário e retorna um objeto pronto com os dados
export function getFormData(form) {
    const formData = new FormData(form);

    // Object.fromEntries transforma as linhas do FormData em um objeto { nome: "João", email: "..." }
    return Object.fromEntries(formData.entries());
}

//Função para coleta de dados de formulario com imagens

export function createImovelFormData(dados, imagens) {
    const body = new FormData();
    //Dados restantes
    body.append(
        'imovel',
        JSON.stringify(dados)
    );

    //Armaneza dados de Imagem para banco
    body.append(
        'imagensInfo',
        JSON.stringify(
            imagens.map(imagem => ({
                id: imagem.id,
                ordem: imagem.ordem,
                capa: imagem.capa
            }))
        )
    );

    //Dados da Imagem
    imagens.forEach((imagem) => {
        body.append('imagens[]', imagem.file);
    });

    return body;
}