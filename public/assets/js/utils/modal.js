//Função modal Toast
export function showModalToast(mensagem, type = "sucess") {
    const template = document.querySelector('#modal-toast')
    const clone = template.content.cloneNode(true);

    const modalToast = clone.querySelector('.modal-toast');

    //Monta modal Toast
    const text = clone.querySelector('.container-text p');
    text.textContent = mensagem;

    modalToast.classList.add(type);

    document.body.appendChild(clone);

    //Toca animação e elimina o toast
    setTimeout(() => {
        modalToast.classList.add('hide');
        setTimeout(() => {
            modalToast.remove();
        }, 300)
    }, 1500);

}