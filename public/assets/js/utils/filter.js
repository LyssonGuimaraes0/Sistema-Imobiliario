//Função de Padronização de textoFormatado

function normalizeText(texto) {
    return texto
        .normalize('NFD')
        .replace(/[\u0300-\u036f]/g, '')
        .toLowerCase();
}


//Função padrão para coletar dados do input text para solicitar API
export function filterToInputs(inputs) {

    let queryParams = ""

    const inputsPreenchidos = [...inputs].filter(input => {
        return input.value.trim() !== '';
    });

    //Varre nodelist e busca todos dados digitados
    inputsPreenchidos.forEach((input, index) => {

        // ignora vazio
        if (!input.value.trim()) return;

        let valorInput = input.value;

        //Remove tudo depois de " - "
        let resultado = valorInput.split('-')[0].trim();

        let LimparValue = resultado.normalize('NFD')
            .replace(/[\u0300-\u036f]/g, "") // remove acentos
            .replace(/[^a-zA-Z0-9\s]/g, "_") // remove especiais;
            .replace(/\s/g, "_")
            .toLowerCase();

        if (index === inputsPreenchidos.length - 1) {
            queryParams += `${input.dataset.filter}=${LimparValue}`
        } else {
            queryParams += `${input.dataset.filter}=${LimparValue}&`
        }

    });
    return queryParams;
}


/* ============================================================================ */


//Função para Mostrar opções de escolha no input

export function filterToSelectOption(inputSearh, dropdown, arraySearch) {

    let valoresFiltrados = [];

    inputSearh.addEventListener('input', () => {

        let valorSearchInput = inputSearh.value.toLowerCase();

        valoresFiltrados = [];

        dropdown.innerHTML = '';

        arraySearch.forEach(itemSearch => {

            let textoFormatado = `
                ${itemSearch.bairro} - 
                ${itemSearch.municipio}/${itemSearch.estado.toUpperCase()}
                `;

            const encontrou = normalizeText(textoFormatado)
                .includes(normalizeText(valorSearchInput));

            if (encontrou) {
                valoresFiltrados.push(textoFormatado);
            }

        });

        if (valorSearchInput.length > 0 && valoresFiltrados.length === 0) {

            let optionSearch = document.createElement('div');

            optionSearch.classList.add('dropdown-option');

            optionSearch.innerHTML = '<span>Sem opções encontrada</span>';

            dropdown.appendChild(optionSearch);

            return;
        }

        valoresFiltrados.slice(0, 10).forEach(valorFiltrado => {

            let optionSearch = document.createElement('div');

            optionSearch.classList.add('dropdown-option');

            optionSearch.textContent = valorFiltrado

            optionSearch.name = valorFiltrado

            dropdown.appendChild(optionSearch);

        });

    });

    //Funções Para desativer barra de pesquisa

    inputSearh.addEventListener('focus', () => {
        dropdown.classList.add('active');
    });

    inputSearh.addEventListener('blur', () => {
        setTimeout(() => {
            dropdown.classList.remove('active');
        }, 300);
    });


    //Funções Para aplicar valor ao input da barra de pesquisa


}

/* ============================================================================ */

