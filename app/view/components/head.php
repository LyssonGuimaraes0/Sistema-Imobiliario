<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href=<?= BASE_URL . "./public/assets/css/main.css" ?>>
    <title>Imobiliaria - FA</title>
</head>

<!--Define rota padrão para JS-->
<script>
    // O PHP imprime a rota diretamente dentro do objeto global do JS
    window.env = {
        ROTA_RAIZ: "<?php echo BASE_URL  ?>"
    };

    //Variavel Global JS de raiz
    const urlBase = window.env.ROTA_RAIZ;
</script>