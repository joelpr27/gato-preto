<head>
    <title>Gato Preto Restaurant</title>

    <meta charset="UTF-8">
    <meta name="description" content="Descripció web">
    <meta name="keywords" content="Paraules clau">
    <meta name="author" content="Autor">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/full_estil.css" rel="stylesheet" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/notie/dist/notie.min.css">


</head>


<body>
    <header>
        <nav class="headerNav navbar navbar-expand-lg ">

            <div class="container-fluid py-0">


                <h1 class="col-2 m-0 ps-4 p-0 d-flex justify-content-start">
                    <a href=<?= URL . '?controller=producto' ?> class="w3-bar-item 3-button">
                        <img class="object-fit-scale p-0" src="desing/img/Logo_Gato_Preto_-_Black_Desktop_1530x208px.png" alt="Logo de la pagina Gato Preto">
                    </a>
                </h1>

                <div class="col-6 d-flex align-items-center justify-content-center">
                    <form class="buscador d-flex align-items-center m-0" role="search">
                        <img src="desing/img/Iconos/lupa.png" class="object-fit-cover m-2 me-0">
                        <input class="inputBuscador m-0 px-5 p-0" type="search" placeholder="¿Qué están buscando?" aria-label="Search">
                    </form>
                </div>


                <div class="col-2 m-0 p-0 d-flex align-items-center justify-content-center">

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="menuSocial d-flex flex-column align-items-center me-2">
                        <div class="carro d-flex justify-content-end align-items-start">
                            <img src="desing/img/Iconos/user.png" style="height: 19px; width: 19px">
                        </div>
                        <?php
                           
                            if(!isset($_SESSION['usuario'])){
                                echo "<p><a href=". URL . "?controller=producto&action=sessionStart> Perfil </a></p>";
                            }else{
                                echo "<p><a href=". URL . "?controller=producto&action=userPage>" . $_SESSION['usuario'][0]->getNombre() ."</a></p>";
                            }
                        ?>

                    </div>

                    <div class="menuSocial d-flex flex-column align-items-center me-2">
                        <div class="cantidad d-flex align-self-end justify-content-center">
                            <?php
                            if (count($_SESSION['favorito']) != 0) {
                            ?>
                                <a href="<?= URL . '?controller=producto&action=favorito' ?>" class="w3-bar-item 3-button"><?= count($_SESSION['favorito']) ?></a>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="carro d-flex justify-content-end align-items-start">
                            <img src="desing/img/Iconos/corazon.png" style="height: 19px; width: 19px">
                        </div>
                        <p><a href=<?= URL . '?controller=producto&action=favorito' ?>>Favoritos</a></p>
                    </div>

                    <div class="menuSocial d-flex flex-column align-items-center me-2">
                        <div class="cantidad d-flex align-self-end justify-content-center align-items-center">
                            <?php
                            $cantidad = 0;

                            foreach ($_SESSION['carrito'] as $pedido) {
                                $cantidad += $pedido->getCantidad();
                            }

                            if ($cantidad != 0) {
                            ?>
                                <a href="<?= URL . '?controller=producto&action=compra' ?>" class="w3-bar-item 3-button"><?= $cantidad ?></a>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="carro d-flex justify-content-end align-items-start">
                            <img src="desing/img/Iconos/shopping-cart.png" class="carrito" style="height: 19px; width: 19px">
                        </div>

                        <p><a href="<?= URL . '?controller=producto&action=compra' ?>">Cesta</a></p>
                    </div>
                </div>

            </div>
        </nav>


        
        <nav class="navbar navbar-expand-lg  d-flex justify-content-center">
            <div class="collapse navbar-collapse d-fex justify-content-center" id="navbarSupportedContent">

                <div class="menuSocialMovil d-flex justify-content-center">

                    <div class="menuSocialMovil d-flex flex-column align-items-center me-2">
                        <div class="carro d-flex justify-content-end align-items-start">
                            <img src="desing/img/Iconos/user.png" style="height: 19px; width: 19px">
                        </div>

                        <?php
                           
                           if(!isset($_SESSION['usuario'])){
                               echo "<p><a href=". URL . "?controller=producto&action=sessionStart> Perfil </a></p>";
                           }else{
                               echo "<p><a href=". URL . "?controller=producto&action=userPage>" . $_SESSION['usuario'][0]->getNombre() ."</a></p>";
                           }
                       ?>
                    </div>

                    <div class="menuSocialMovil d-flex flex-column align-items-center me-2">
                        <div class="cantidad d-flex align-self-end justify-content-center align-items-center">
                            <?php
                            if (count($_SESSION['favorito']) != 0) {
                            ?>
                                <a href=<?= URL . '?controller=producto&action=favorito' ?> class="w3-bar-item 3-button"><?= count($_SESSION['favorito']) ?></a>
                            <?php
                            }
                            ?>


                        </div>
                        <div class="carro d-flex justify-content-end align-items-start">
                            <img src="desing/img/Iconos/corazon.png" style="height: 19px; width: 19px">
                        </div>

                        <p><a href="<?= URL . '?controller=producto&action=favorito' ?>">Favoritos</a></p>
                    </div>


                    <div class="menuSocialMovil d-flex flex-column align-items-center me-2">
                        <div class="cantidad d-flex align-self-end justify-content-center align-items-center">
                            <?php
                            $cantidad = 0;

                            foreach ($_SESSION['carrito'] as $pedido) {
                                $cantidad += $pedido->getCantidad();
                            }

                            if ($cantidad != 0) {
                            ?>
                                <a href="<?= URL . '?controller=producto&action=compra' ?>" class="w3-bar-item 3-button"><?= $cantidad ?></a>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="carro d-flex justify-content-end align-items-start">
                            <img src="desing/img/Iconos/shopping-cart.png" class="carrito me-2" style="height: 19px; width: 19px">
                        </div>

                        <p><a href="<?= URL . '?controller=producto&action=compra' ?>">Cesta</a></p>
                    </div>
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item mx-auto" style="height: 38px;">
                        <a class="nav-link" aria-current="page" href="#">NEW IN</a>
                    </li>
                    <li class="nav-item mx-auto" style="height: 38px;">
                        <form action="<?= URL . "?controller=producto&action=goCategory" ?>" method="post">
                            <input hidden name="categoria" value="1">
                            <button type="submit" style="border-style: none; background-color: #FFFFFF; padding: 8px;"><a class="nav-link" style="padding: 0px;">PASTAS</a></button>
                        </form>
                    </li>
                    <li class="nav-item mx-auto" style="height: 38px;">
                        <form action="<?= URL . "?controller=producto&action=goCategory" ?>" method="post">
                            <input hidden name="categoria" value="3">
                            <button type="submit" style="border-style: none; background-color: #FFFFFF; padding: 8px;"><a class="nav-link" style="padding: 0px;">PASTELES</a></button>
                        </form>
                    </li>
                    <li class="nav-item mx-auto" style="height: 38px;">
                        <form action="<?= URL . "?controller=producto&action=goCategory" ?>" method="post">
                            <input hidden name="categoria" value="2">
                            <button type="submit" style="border-style: none; background-color: #FFFFFF; padding: 8px;"><a class="nav-link" style="padding: 0px;">BOCADILLOS</a></button>
                        </form>
                    </li>
                    <li class="nav-item mx-auto" style="height: 38px;">
                        <form action="<?= URL . "?controller=producto&action=goCategory" ?>" method="post">
                            <input hidden name="categoria" value="6">
                            <button type="submit" style="border-style: none; background-color: #FFFFFF; padding: 8px;"><a class="nav-link" style="padding: 0px;">CAFES</a></button>
                        </form>
                    </li>
                    <li class="nav-item mx-auto" style="height: 38px;">
                        <form action="<?= URL . "?controller=producto&action=goCategory" ?>" method="post">
                            <input hidden name="categoria" value="4">
                            <button type="submit" style="border-style: none; background-color: #FFFFFF; padding: 8px;"><a class="nav-link" style="padding: 0px;">REFRESCOS</a></button>
                        </form>
                    </li>
                    <li class="nav-item mx-auto" style="height: 38px;">
                        <form action="<?= URL . "?controller=producto&action=goCategory" ?>" method="post">
                            <input hidden name="categoria" value="5">
                            <button type="submit" style="border-style: none; background-color: #FFFFFF; padding: 8px;"><a class="nav-link" style="padding: 0px;">CHOCOLATES</button>
                        </form>
                    </li>
                    <li class="nav-item mx-auto" style="height: 38px;">
                        <a class="nav-link promo" style="text-decoration: none;" href="#">PROMOCIONES</a>
                    </li>
                    <li class="nav-item mx-auto" style="height: 38px;">
                        <a class="nav-link" href="<?= URL . '?controller=producto&action=carta' ?>">CARTA</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

</body>