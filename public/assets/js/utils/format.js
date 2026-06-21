// Formata texto para só permitir números (Protegido contra null/undefined/vazio)
export function formatTextToNumber(valor) {
    if (valor === undefined || valor === null) return '';
    return String(valor).replace(/\D/g, '');
}

// Formata texto para só permitir string sem caracteres especiais
export function formatTextToString(valor) {
    if (valor === undefined || valor === null) return '';
    return String(valor).replace(/[^a-zA-ZÀ-ÿ0-9 .,´`]/g, '');
}

// Converte para estilo de dinheiro
export function formatInputToMoney(valor) {
    
    let valorLimpo = formatTextToNumber(valor);

    if (!valorLimpo || valorLimpo === '0') {
        valorLimpo = '000';
    }


    valorLimpo = valorLimpo.padStart(3, '0');

    const inteiro = valorLimpo.slice(0, -2).replace(/^0+/, '') || '0';
    const decimal = valorLimpo.slice(-2);

    return formatTextForMoney(inteiro, decimal);
}

export function formatTextForMoney(inteiro, decimal) {
    // Adiciona os pontos de milhar
    const inteiroFormatado = inteiro.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    
    // Força o decimal a ter sempre 2 dígitos por segurança contra undefined
    const decimalFormatado = String(decimal || '00').padStart(2, '0');

    return `R$ ${inteiroFormatado},${decimalFormatado}`;
}