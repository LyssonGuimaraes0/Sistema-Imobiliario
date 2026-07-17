//Abre e Fecha menu Mobile
const menuMobile = document.querySelector('.navbar-menu');
const overlay = document.querySelector('.menu-overlay')
const closeBtn = document.querySelector('.close-mobile-navbar')

//Habilita Menu Mobile
document.querySelector('.menu-toggle').addEventListener('click', () => {
    displayMobile()
})
//Verifica overlay
overlay.addEventListener('click', () => {
    displayMobile()
})
//Valida Botão de close navbar-mobile
closeBtn.addEventListener('click', ()=>{
    displayMobile()
})

//Função para Alteração de Elementos da navbar
function displayMobile() {
    menuMobile.classList.toggle('active')
    overlay.classList.toggle('active')
    document.body.classList.toggle('no-scroll')
}