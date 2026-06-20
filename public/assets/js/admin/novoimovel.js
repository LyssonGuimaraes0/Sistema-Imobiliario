import { request } from "../service/ajax.js";
import { toggleOptions } from "../utils/navbar-admin.js";
import { getFormData, createImovelFormData } from "../utils/form.js";
import { showModalToast } from "../utils/modal.js";

import {
    formatInputToMoney,
    formatTextToNumber,
    formatTextToString
} from "../utils/format.js";

import {
    adicionarArquivo,
    getImagens,
    mensageNoImagesSelect
} from "../utils/image-manager.js";

//Ações do formulario

// checkbox

const itemsCheckbox =
    document.querySelectorAll(
        '.item-checkbox-form'
    );

itemsCheckbox.forEach(item => {

    item.addEventListener(
        'click',
        (event) => {

            const input =
                item.querySelector('input');

            if (event.target !== input) {
                input.checked =
                    !input.checked;
            }
        }
    );

});

//Verificar caso não tenha nenhuma imagem adicionada

// upload

const templateCardPreview =
    document.querySelector(
        '#templatePreview'
    );

const dropArea =
    document.querySelector(
        '#drop-area'
    );

const fileInput =
    document.querySelector(
        '#fileInput'
    );

const containerList =
    document.querySelector(
        '.list-imagens-select'
    );

mensageNoImagesSelect(containerList);

const textImgs =
    document.querySelector(
        '#text-imgs-upload'
    );

dropArea.addEventListener(
    'click',
    () => fileInput.click()
);

fileInput.addEventListener(
    'change',
    () => {

        for (const file of fileInput.files) {



            adicionarArquivo(
                file,
                templateCardPreview,
                containerList,
                textImgs
            );

        }

    }
);

dropArea.addEventListener(
    'dragover',
    (e) => e.preventDefault()
);



dropArea.addEventListener('dragenter', () => {
    dropArea.classList.add('drag-over');
});

dropArea.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropArea.classList.add('drag-over');
});

dropArea.addEventListener('dragleave', () => {
    dropArea.classList.remove('drag-over');
});

dropArea.addEventListener(
    'drop',
    (e) => {

        e.preventDefault();

        for (const file of e.dataTransfer.files) {

            adicionarArquivo(
                file,
                templateCardPreview,
                containerList,
                textImgs
            );

        }

    }
);

//Sistema para filtra valores digitados pelo usuario

//Todos Inputs para remoção de caracteres especiais
const inputs = document.querySelectorAll('input')
const textarea = document.querySelector('textarea')

inputs.forEach(input => {
    input.addEventListener('input', (e) => {

        if (input.type === 'file') {
            return;
        }

        let valor = e.target.value
        valor = formatTextToString(valor)
        e.target.value = valor;
    })

});

textarea.addEventListener('input', (e) => {

    let valor = e.target.value
    valor = formatTextToString(valor)
    e.target.value = valor;
})



//Inputs de valores

const containerValores = document.querySelector('#container-valores')
const inputsValores = containerValores.querySelectorAll('input')

inputsValores.forEach(input => {
    input.addEventListener('input', (e) => {

        let valor = e.target.value
        valor = formatInputToMoney(valor)
        e.target.value = valor;
    })
});

//Inputs de Características

const containerCaracteristica = document.querySelector('#container-caracteristicas')
const inputsCaracteristica = containerCaracteristica.querySelectorAll('input')

inputsCaracteristica.forEach(input => {
    input.addEventListener('input', (e) => {
        let valor = e.target.value
        valor = formatTextToNumber(valor)
        e.target.value = valor;
    })
});

//Inputs de Endereço

const containerEndereco = document.querySelector('#container-endereco')
const cepInput = containerEndereco.querySelector('#cep-input')
const numeroInput = containerEndereco.querySelector('#numero-input')


numeroInput.addEventListener('input', (e) => {
    let valor = e.target.value
    valor = formatTextToNumber(valor)
    e.target.value = valor;
})

cepInput.addEventListener('input', (e) => {
    let valor = e.target.value
    valor = formatTextToNumber(valor)
    if (valor.length > 5) {
        valor = valor.slice(0, 5) + '-' + valor.slice(5, 8);
    }

    e.target.value = valor;
})




//Envio de formulario

const formCreateImovel = document.querySelector('#formNovoImovel');

//Coleta os dados do formulario
formCreateImovel.addEventListener('submit', async (event) => {
    event.preventDefault();

    try {

        const dados = getFormData(event.target)
        delete dados.foto

        const body = createImovelFormData(
            dados,
            getImagens()
        );

        const response = await request(
            '../../api/imovel/create',
            {
                method: 'POST',
                body
            }
        );
        console.log(response);

        if (!response?.success) {
            throw new Error(
                response.error ??
                response.message ??
                "Erro interno do servidor"
            );
        }

        formCreateImovel.reset();
        containerList.innerHTML = "";
        textImgs.textContent = "0"

        mensageNoImagesSelect(containerList);

        // Vai para o topo
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });

        showModalToast(response.data)

    } catch (error) {
        showModalToast(error, "error")
    }


})