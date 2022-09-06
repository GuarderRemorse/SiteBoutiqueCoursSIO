<html>

<head>
    <title>
        Le Rat'jeu
    </title>
    <link rel="stylesheet" href="<?php echo Chemins::CSS . 'normalize.css'; ?>">
    <link rel="stylesheet" href="<?php echo Chemins::CSS . 'site.css'; ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header role="navigation">
        <nav class="menu" role="navigation">
            <div class="inner">
                <div class="m-left">
                    <h1 class="logo">Le Rat'Jeu<h1>
                </div>
                <div class="m-right">
                    <a href="index.php" class="m-link"><i class="fa-solid fa-house"></i>Accueil</a>
                    <a href="#" class="m-link"><i class="fa-solid fa-basket-shopping"></i>Voir le panier</a>
                    <a href="#" class="m-link"><i class="fa-solid fa-envelope"></i>Contacter</a>
                    <a href="index.php?controleur=admin&action=afficherIndexAdmin" class="m-link"><i class="fa-solid fa-user-gear"></i>Administrateur</a>
                </div>
            </div>
        </nav>
    </header>