import { request } from '../service/ajax.js';

//Criação de elememento ao clicar em footer usuario da navbar admin

export function toggleOptions(footerSelector, optionsSelector) {
    const footerNavbar = document.querySelector(footerSelector);
    const options = document.querySelector(optionsSelector);

    if (!footerNavbar || !options) return;

    // Abrir / fechar opções
    footerNavbar.addEventListener('click', function (event) {
        event.stopPropagation();
        options.classList.toggle('active');
    });

    // Clique fora
    document.addEventListener('click', function (event) {
        const clicouFora = !footerNavbar.contains(event.target);

        if (clicouFora) {
            options.classList.remove('active');
        }
    });
}

export function logout() {

    const logout = document.querySelector('#logout');

    if (!logout) return;

    logout.addEventListener('click', async function () {

        const options = {
            method: 'POST'
        };

        try {

            const response = await request(
                `${urlBase}/api/auth/logout`,
                options
            );

            if (!response || response.success === false) {
                throw new Error(response?.error);
            }

            window.location.href =
                "/trabalhos/imobiliaria/admin/login";

        } catch (error) {
            console.error(error);
        }

    });
}



