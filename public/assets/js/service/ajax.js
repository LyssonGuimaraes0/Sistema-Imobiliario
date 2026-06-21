export async function request(url, options = {}) {
    try {

        const config = {
            method: options.method || 'GET'
        };

        if (options.body instanceof FormData) {

            config.body = options.body;

        } else {

            config.headers = {
                'Content-Type': 'application/json'
            };

            config.body = options.body
                ? JSON.stringify(options.body)
                : null;
        }

        const response = await fetch(url, config);

        if (!response.ok) {
            throw new Error(`Erro HTTP: ${response.status}`);
        }

/*         //Testes de resposta de servidor

        const clone = response.clone();

        console.log('RESPOSTA BRUTA:', await clone.text()); */

        return await response.json();

    } catch (error) {
        return {
            success: false,
            error: error.message
        };
    }
}