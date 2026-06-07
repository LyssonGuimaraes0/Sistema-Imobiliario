//Formata texto para so permitir numeros

export function formatTextToNumber(valor) {
    return valor = valor.replace(/\D/g, '');
}

//Formata texto para so permitir string sem caracteres
export function formatTextToString(valor) {
    return valor = valor.replace(/[^a-zA-ZÀ-ÿ0-9 .,´`]/g, '');
}

//Converte para estilo de dinhero
export function formatInputToMoney(valor) {
    valor = formatTextToNumber(valor);

    valor = valor.padStart(3, '0');

    let inteiro = valor.slice(0, -2);
    const decimal = valor.slice(-2);

    //Evita numeros 00 antes do input
    inteiro = inteiro.replace(/^0+/, '') || '0';

    return formatTextForMoney(inteiro, decimal);
}

export function formatTextForMoney(inteiro, decimal) {
    inteiro = inteiro.replace(
        /\B(?=(\d{3})+(?!\d))/g,
        '.'
    );

    return `R$ ${inteiro},${decimal}`;
}

