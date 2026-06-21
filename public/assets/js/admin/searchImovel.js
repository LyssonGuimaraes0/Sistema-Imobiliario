//Verifica o click dos card do catalogo e leva para página de edição
document.addEventListener('click', function (e) {
    const card = e.target.closest('[data-card]');

    if (!card) return;

    console.log(card);
    const id = card.dataset.card;

    //Redireciona para página de edição
    window.location.href = `${urlBase}/admin/imoveis/edit/${id}`

});