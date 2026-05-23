import { request } from "../service/ajax.js";
import { toggleOptions } from "../utils/navbar-admin.js";

const optionsMenu = document.querySelector('.options-footer-admin');

//Realiza criação de elemento em página
toggleOptions('.footer-navbar-admin', '.options-footer-admin');


// botão logout
const logout = optionsMenu.querySelector('#logout');

logout.addEventListener('click', async function () {
    let response;

    const options = {
        method: 'POST'
    }

    try {
        response = await request('http://localhost/trabalhos/imobiliaria/api/auth/logout', options);


        if (!response || response.success === false) {
            throw new Error(response?.error);
        }

        //Login conseguiu ser cadastrado
        window.location.href = "/trabalhos/imobiliaria/admin/login";

    } catch (error) {
        console.log(error)
    }


})