<?php 


if(!isset($_SESSION)){
  session_start();
  
}

$auth = $_SESSION['login'] ?? false;

if(!isset($main)){
    $main = false;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../build/css/app.css" />
    <title>RealState</title>
</head>

<body>
    <header class="header <?php echo $main ? 'main' : ''; ?>">
        <div class="container header-content">
            <div class="bar">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="imagen logotipo" />
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="Icon">
                </div>


                <div class="right">
                    <img src="/build/img/dark-mode.svg" alt="darkmode icon" class="dark-mode-btn">


                    <nav class="navegation">
                        <a href="/about">About us</a>
                        <a href="/ads">Advertisements</a>
                        <a href="/blog">Blog</a>
                        <a href="/contact">Contact</a>

                        <?php if ($auth): ?>
                            <a href="/logout">Logout</a>
                        <?php endif ?>
                    </nav>
                </div>
            </div>
            <!-- CIERRE DE BARRA-->


            <?php

            if ($main) {
                echo "<h1>Venta de casas y departamentos exclusivos de lujo. </h1>";
            }

            ?>
        </div>
    </header>

    <?php echo $content; ?>

    <footer class="footer section">
        <div class="container footer-content">
            <nav class="navegation">
                <a href="/about">About us</a>
                <a href="/ads">Advertisements</a>
                <a href="/blog">Blog</a>
                <a href="/contact">Contact</a>
            </nav>
        </div>

        <p class="copyright">Todos los derechos reservados <?php echo date('Y'); ?> &copy;</p>
    </footer>

    <script src="../build/js/bundle.min.js"></script>
</body>

</html>