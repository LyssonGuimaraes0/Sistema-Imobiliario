//Criação de elememento ao clicar em footer usuario da navbar admin
const footerNavbar = document.querySelector('.footer-navbar-admin')
const options = document.querySelector('.options-footer-admin')

footerNavbar.addEventListener('click', function () {
    options.classList.toggle('active')
})

// Clique fora
document.addEventListener('click', (event) => {

    const clicouFora = !footerNavbar.contains(event.target);

    if (clicouFora) {
        options.classList.remove('active');
    }

});

//