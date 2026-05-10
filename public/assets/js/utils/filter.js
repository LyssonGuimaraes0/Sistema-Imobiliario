
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

        let LimparValue = valorInput.normalize('NFD')
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
    console.log(queryParams)
    return queryParams; 
}