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