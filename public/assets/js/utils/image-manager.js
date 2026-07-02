// utils/image-manager.js

let imagensSelecionadas = [];
let contador = 0;
let imagemPrincipal = null;

export function getImagens() {
    return imagensSelecionadas;
}

export function getImagemPrincipal() {
    return imagemPrincipal;
}

export function adicionarArquivo(
    file,
    templateCardPreview,
    containerList,
    textImgs
) {

    if (imagensSelecionadas.length === 0) {
        containerList.innerHTML = '';
    }

    const imagem = {
        id: contador,
        file,
        ordem: imagensSelecionadas.length,
        capa: false
    };

    if (imagensSelecionadas.length === 0) {
        imagem.capa = true;
        imagemPrincipal = contador;
    }

    imagensSelecionadas.push(imagem);

    mostrarPreview(
        file,
        contador,
        templateCardPreview,
        containerList,
        textImgs
    );

    contador++;

    textImgs.textContent = imagensSelecionadas.length;
}

export function removerPreview(
    id,
    textImgs,
    containerList
) {

    verificarListaVazia(containerList)

    const containerCard = document.querySelector(
        `#preview-imagem-${id}`
    );

    if (!containerCard) {
        return;
    }

    const containerImg = containerCard.querySelector(
        '.container-img-form'
    );

    const eraCapa =
        containerImg.dataset.capa === "true";

    containerCard.remove();

    imagensSelecionadas = imagensSelecionadas.filter(
        imagem => imagem.id !== id
    );

    textImgs.textContent =
        imagensSelecionadas.length;

    verificarListaVazia(containerList);

    if (eraCapa) {

        imagemPrincipal = null;

        if (imagensSelecionadas.length > 0) {
            adicionarCapa(
                imagensSelecionadas[0].id
            );
        }
    }
}

export function adicionarCapa(id) {

    const imagemAtual = document.querySelector(
        `[data-id="${id}"]`
    );

    const containerAtual = document.querySelector(
        `#preview-imagem-${id}`
    );

    if (!imagemAtual || !containerAtual) {
        return;
    }

    const tagAtual = containerAtual.querySelector(
        '.tag-capa-img'
    );

    if (
        imagemPrincipal !== null &&
        imagemPrincipal !== id
    ) {

        const imagemAnterior = document.querySelector(
            `[data-id="${imagemPrincipal}"]`
        );

        const containerAnterior = document.querySelector(
            `#preview-imagem-${imagemPrincipal}`
        );

        if (
            imagemAnterior &&
            containerAnterior
        ) {

            const tagAnterior =
                containerAnterior.querySelector(
                    '.tag-capa-img'
                );

            const btnAnterior =
                containerAnterior.querySelector(
                    `#btnCapa-${imagemPrincipal}`
                );

            const iconAnterior =
                btnAnterior?.querySelector('i');

            delete imagemAnterior.dataset.capa;

            if (tagAnterior) {
                tagAnterior.style.display = 'none';
            }

            btnAnterior?.classList.remove(
                'btn-capa-form-active'
            );

            containerAnterior.classList.remove(
                'active'
            );

            if (iconAnterior) {
                iconAnterior.classList.remove(
                    'fa-solid'
                );

                iconAnterior.classList.add(
                    'fa-regular'
                );
            }
        }
    }

    imagensSelecionadas.forEach(imagem => {
        imagem.capa = false;
    });

    const imagemSelecionada =
        imagensSelecionadas.find(
            imagem => imagem.id === id
        );

    // NOVO: Localiza a imagem que atualmente é a capa
    const imagemAnterior =
        imagensSelecionadas.find(
            imagem => imagem.id === imagemPrincipal
        );

    // NOVO: Troca a ordem entre a capa antiga e a nova
    if (
        imagemSelecionada &&
        imagemAnterior &&
        imagemSelecionada.id !== imagemAnterior.id
    ) {

        const ordemAnterior =
            imagemSelecionada.ordem;

        imagemSelecionada.ordem = 0;
        imagemAnterior.ordem = ordemAnterior;
    }

    if (imagemSelecionada) {
        imagemSelecionada.capa = true;
    }

    imagemPrincipal = id;

    imagemAtual.dataset.capa = true;

    if (tagAtual) {
        tagAtual.style.display = 'flex';
    }

    const btnAtual =
        containerAtual.querySelector(
            `#btnCapa-${id}`
        );

    btnAtual?.classList.add(
        'btn-capa-form-active'
    );

    containerAtual.classList.add(
        'active'
    );

    const iconAtual =
        btnAtual?.querySelector('i');

    if (iconAtual) {
        iconAtual.classList.remove(
            'fa-regular'
        );

        iconAtual.classList.add(
            'fa-solid'
        );
    }
}

export function mostrarPreview(
    file,
    id,
    templateCardPreview,
    containerList,
    textImgs
) {

    const reader = new FileReader();

    reader.addEventListener('load', (e) => {

        const cloneTemplate =
            templateCardPreview.content.cloneNode(true);

        const containerCard =
            cloneTemplate.querySelector(
                '.card-imagem-preview'
            );

        const containerImg =
            cloneTemplate.querySelector(
                '.container-img-form'
            );

        const btnCapa =
            cloneTemplate.querySelector(
                '#btnCapa'
            );

        const btnRemover =
            cloneTemplate.querySelector(
                '.btn-img-form'
            );

        containerCard.id =
            `preview-imagem-${id}`;

        containerImg.dataset.id = id;

        btnCapa.id =
            `btnCapa-${id}`;

        btnRemover.addEventListener(
            'click',
            () => removerPreview(id, textImgs, containerList)
        );

        btnCapa.addEventListener(
            'click',
            () => adicionarCapa(id)
        );

        const img =
            document.createElement('img');

        img.src = e.target.result;

        containerImg.appendChild(img);

        containerList.appendChild(
            cloneTemplate
        );

        if (imagemPrincipal === id) {
            adicionarCapa(id);
        }
    });

    reader.readAsDataURL(file);
}

//Elementos para quando não tiver imagens selecionadas

export function verificarListaVazia(container) {

    const previews =
        container.querySelectorAll('.card-imagem-preview');

    if (imagensSelecionadas.length === 0) {
        mensageNoImagesSelect(container);
    }
}


export function mensageNoImagesSelect(container) {
    container.innerHTML = `
        <p class="empty-message">
            Nenhuma imagem selecionada.
        </p>
    `;
}