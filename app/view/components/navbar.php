<header>
    <div class="section-container">
        <!--Overlay para Mobile-->
        <div class="menu-overlay"></div>
        <nav class="navbar">
            <div class="navbar-brand">
                <div class="logo">
                    <img src="<?= IMAGEM_URL . "/placeholder/image-not-found.png" ?>" alt="Logo">
                </div>

                <div class="brand-text">
                    <h1>Nome da Imobiliária</h1>
                    <span>slogan</span>
                </div>
            </div>

            <ul class="navbar-menu">
                <!--Logo Navbar mobile-->
                <div class="logo-mobile">
                    <!--Botão fecha menu mobile-->
                    <button class="close-mobile-navbar" aria-label="Fechar menu">
                        <i class="fa-solid fa-xmark"></i>
                    </button>

                    <div class="logo">
                        <img src="<?= IMAGEM_URL . "/placeholder/image-not-found.png" ?>" alt="Logo">
                    </div>
                    <div class="brand-text">
                        <h1>Nome da Imobiliária</h1>
                    </div>

                </div>

                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>

                    <input class="search-input"
                        type="search"
                        placeholder="Busque por Localidade ou Tipo de Imovel ">
                </div>

                <li>
                    <a href="<?= BASE_URL . "/" ?>">Inicio</a>
                </li>
                <li>
                    <a href="<?= BASE_URL . "/catalog" ?>">Catálogo</a>
                </li>
                <li>
                    <a href="#">Serviços</a>
                </li>
                <li>
                    <a href="#">Contato</a>
                </li>
                <li>
                    <a href="#">Sobre Mim</a>
                </li>
            </ul>

            <button class="menu-toggle" aria-label="Abrir menu">
                <i class="fa-solid fa-bars"></i>
            </button>
        </nav>
    </div>
</header>