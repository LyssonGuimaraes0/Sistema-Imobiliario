import { request } from "./service/ajax.js";
import { delay } from "./utils/delay.js";
import { getFormData } from "./utils/form.js";

const formLogin = document.querySelector('#form-login');

//Configuração do botão do formulario
const btnLogin = document.querySelector('#btn-login');
const animationLoading = btnLogin.querySelector('.loading');
const textErro = document.querySelector('#mensagem-error');

//Coleta os dados do formulario
formLogin.addEventListener('submit', async (event) => {
    event.preventDefault();

    textErro.style.display = 'none';

    if (btnLogin.lastChild && btnLogin.lastChild.nodeType === Node.TEXT_NODE) {
        btnLogin.lastChild.textContent = "";
    }

    animationLoading.style.display = 'block';

    await delay(800);

    // Captura os dados usando sua função padrão
    const dados = getFormData(event.target);

    //Define Method Post e dados do formulario
    const options = {
        method: 'POST',
        body: {
            email: dados.email,
            password: dados.password
        }
    }

    let response;

    try {
        response = await request(`${urlBase}/api/auth/login`, options);


        if (!response || response.success === false) {
            throw new Error(response?.error);
        }

        //Login conseguiu ser cadastrado
        window.location.href = `${urlBase}/admin/dashboard`;
        
    } catch (error) {
        textErro.style.display = 'block';

    } finally {
        animationLoading.style.display = 'none';
        if (btnLogin.lastChild && btnLogin.lastChild.nodeType === Node.TEXT_NODE) {
            btnLogin.lastChild.textContent = "Acessar";
        }

    }

});