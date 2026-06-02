import { request } from "../service/ajax.js";
import { toggleOptions } from "../utils/navbar-admin.js";

import {
    adicionarArquivo,
    getImagens
} from "../utils/image-manager.js";

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

// Quando for enviar:

console.log(
    getImagens()
);