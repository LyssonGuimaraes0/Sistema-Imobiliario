//Formata para Formato de dinhero
export function formatTextForMoney(texto) {
    var grupos = []

    for (let index = texto.length; index > 0; index -= 3) {
        let inicio = index - 3;

        if (inicio < 0) {
            inicio = 0;
        }

        let parte = texto.slice(inicio, index);
        grupos.push(parte);
    }

    grupos.reverse()
    texto = `R$ ${grupos.join('.')}`

    return texto;
}

