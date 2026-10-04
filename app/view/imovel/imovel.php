<?php

/** @var object $capa */
/** @var object $imagens */
/** @var object $imovel */
/** @var object $componentes */
?>

<!DOCTYPE html>
<html lang="pt-BR">
<?php include_once VIEW_PATH . '/components/head.php'; ?>

<body>
    <!--Navbar-->
    <?php include_once COMPONENTS_PATH . '/navbar.php'; ?>

    <!--Tags-->
    <?php include_once COMPONENTS_PATH . '/imovel/tag.php'; ?>

    <section class="section-catalog" id="catalog">
        <div class="section-container">
            <div class="container-imagens-imovel">
                <div class="container-imagem-capa">
                    <img
                        class="img-cover-container"
                        src="<?= BASE_URL . $capa ?>"
                        alt="">
                </div>
                <div class="container-imagem-segundaria">

                    <?php foreach ($imagens as $ordem => $imagem): ?>
                        <?php
                        if ($ordem > 4) {
                            break;
                        } ?>
                        <div class="item-imagem">
                            <img
                                class="img-cover-container"
                                src="<?= BASE_URL . $imagem ?>"
                                alt="">
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
            <!-- Header Section -->
            <div class="container-head-imovel">
                <div class="container-info">
                    <h1 class="title-imovel"><?= $imovel['nome_imovel'] ?></h1>
                    <!-- Location -->
                    <div class="location-imovel">
                        <i class="fa-solid fa-location-dot"></i>
                        <span><?= "{$imovel['bairro']}, {$imovel['municipio']} - {$imovel['estado']}" ?></span>
                    </div>
                    <!-- Publication Badge -->
                    <div class="badge">
                        <span>Publicado</span>
                        <span class="badge-dot">•</span>
                        <span>Há 10 hrs</span>
                    </div>
                    <div class="features-grid">
                        <!-- Area -->
                        <div class="feature-item">
                            <i class="fa-solid fa-ruler-horizontal"></i>
                            <span><?= $imovel['area_total'] ?><span style="font-size: 12px;">m²</span></span>
                        </div>

                        <?php foreach ($componentes as $componente => $valor): ?>
                            <?php if ($valor > 0):
                                $icon = [
                                    "Quarto" => "fa-solid fa-bed",
                                    'Banheiro' => "fa-solid fa-bath",
                                    'Sala de estar' => "fa-solid fa-couch",
                                    'Cozinha' => "fa-solid fa-sink",
                                    'Suite' => "fa-solid fa-person-booth",
                                    'Garagem' => "fa-solid fa-car",
                                ];
                                $class = $icon[$componente];

                            ?>
                                <div class="feature-item">
                                    <i class="<?= $class ?>"></i>
                                    <span><?= "$valor $componente" ?></span>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="container-tabs">
                        <button class="tab-button active">Descrição</button>
                        <button class="tab-button">Ficha Técnica</button>
                    </div>

                    <div id="container-info-tab">
                        <?php include VIEW_PATH . "/imovel/components/descricao.php" ?>
                    </div>

                    <!--Localização-->
                    <!-- 5. Seção de Localização -->
                    <section class="location-section">
                        <h2>Localização</h2>
                        <div class="map-card-wrapper">
                            <div class="map-info-side">
                                <div class="map-address">
                                    <svg viewBox="0 0 24 24">
                                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                                        <circle cx="12" cy="9" r="2.5" fill="#1e3a8a" />
                                    </svg>
                                    <div class="map-address-text">
                                        <?= $imovel['bairro'] ?><br><?= "{$imovel['municipio']} - {$imovel['estado']}" ?>
                                    </div>
                                </div>

                                <a href="https://maps.google.com/?q=<?= $imovel['bairro'] ?>,+<?= $imovel['municipio'] ?>+-+<?= $imovel['estado'] ?>" target="_blank" class="map-link-btn">
                                    <span>Abrir no mapa</span>
                                    <svg viewBox="0 0 24 24">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12 5 19 12 12 19"></polyline>
                                    </svg>
                                </a>
                            </div>

                            <div class="map-preview">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15549.467888741366!2d-38.4038676!3d-12.9182397!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x71617178ee72ad3%3A0x8677c7d41f0f2955!2sBairro%20da%20Paz%2C%20Salvador%20-%20BA!5e0!3m2!1spt-BR!2sbr!4v1710000000000!5m2!1spt-BR!2sbr"
                                    width="100%"
                                    height="100%"
                                    style="border:0;"
                                    allowfullscreen=""
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                        </div>
                    </section>

                </div>
                <aside class="sidebar-card">
                    <?php if ($imovel['destaque'] != "nenhum"):  ?>
                        <span class="tag-lancamento"><?= $imovel['destaque'] ?></span>
                    <?php endif; ?>

                    <h2 class="card-title"><?= $imovel['nome_imovel'] ?></h2>

                    <div class="card-subtitle">
                        Modalidade: <?= $imovel['modalidade'] ?><span class="cod-text">(cód:755698)</span>
                    </div>

                    <div class="label-price">Valor do imóvel</div>
                    <div class="main-price">R$<?= $imovel['preco'] ?></div>

                    <!-- Lista de Despesas Secundárias -->
                    <div class="cost-list">
                        <div class="cost-item">
                            <span>Condomínio</span>
                            <span class="cost-value">R$ <?= $imovel['condominio'] ?>/Mês</span>
                        </div>
                    </div>

                    <!-- Botões de Ação -->
                    <div class="actions">
                        <button class="btn-sidebar-imovel btn-blue">
                            <i class="fa-brands fa-whatsapp"></i>
                            Entre em contato
                        </button>

                        <button class="btn-sidebar-imovel btn-outline">
                            <i class="fa-solid fa-share-nodes"></i>
                            Compartilhar
                        </button>
                    </div>
                </aside>
            </div>

        </div>

    </section>

    <!--Footer-->
    <?php require_once COMPONENTS_PATH . '/footer.php'; ?>

</body>

</html>
<!--<img src=IMAGEM_URL . "/placeholder/image-not-found.png"?>-->