<!DOCTYPE html PUBLIC>
<html>

<head>
    <title>Gato Preto Restaurant</title>

    <meta charset="UTF-8">
    <meta name="description" content="Descripció web">
    <meta name="keywords" content="Paraules clau">
    <meta name="viewport" content="width=device-width, initial-cover=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/full_estil.css" rel="stylesheet" type="text/css" media="screen">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

</head>

<?php
include_once "header.php";
?>

<body class="d-flex flex-column justify-content-center">

    <section class="d-flex flex-column justify-content-center align-items-center pb-3">
        <h3 class="caruselXL">ARTÍCULOS DE INTERÉS</h3>

        <!-- Carrusel con formato para la pantalla xl o formato escritorio -->
        <div class="caruselXL">
            <div class="row w-100 mx-0 px-3 d-flex justify-content-center">
                <div class="container mt-5">
                    <div id="myCarouselXL" class="carousel slide">
                        <!-- Mostramos todos los productos de interes desde la base de datos -->
                        <?php $totalProductos = count($productos); ?>
                        <?php $numProductos = ceil($totalProductos / 10); ?>
                        <div class="card-deck px-2 d-flex flex-wrap">
                            <?php for ($j = 0; $j < 10; $j++) { ?>
                                <?php if ($j < $totalProductos) { ?>
                                    <div class="card border-0 col-xl-2 px-0 py-4 mx-xl-3 mb-xl-5 p-xl-0">
                                        <img src="desing/img/Productos/<?= $productos[$j]->getImg() ?>" style="background-color: #F7F7F7" class="object-fit-scale">

                                        <div class="infoProducto p-1 d-flex flex-column">

                                            <p><?= $productos[$j]->getNombre() ?></p>

                                            <div class="d-flex justify-content-between">

                                                <div class="m-0 fw-bold d-flex align-items-center">

                                                    <form action="<?= URL . "?controller=producto&action=addFavorite" ?>" method="post" class="m-0">
                                                        <input hidden name="id" value="<?= $productos[$j]->getId() ?>">
                                                        <button type="submit" class="añadirCarrito p-0"><img src="desing/img/Iconos/corazon.png" style="height: 12px; width: 12px"></button>
                                                    </form>

                                                    <p class="align-self-start ms-1 mb-0"><?= $productos[$j]->getPrecioDescuento() . "€" ?></p>

                                                    <?php
                                                    if ($productos[$j]->getDescuento() != null) {
                                                        echo "<p class=\"promo align-self-start ms-1 mb-0\">" . $productos[$j]->getPrecio() . "€ </p>";
                                                    }
                                                    ?>

                                                    <div class="descuento d-flex justify-content-center bg-descuento rounded-1 px-1 ms-1">

                                                        <p class="mb-0"><?= $productos[$j]->getDescuentoText() ?></p>

                                                    </div>

                                                </div>
                                                <div class="d-flex align-items-center justify-content-end">
                                                    <form action="<?= URL . "?controller=producto&action=addCart" ?>" method="post" class="m-0">
                                                        <input hidden name="id" value="<?= $productos[$j]->getId() ?>">
                                                        <button type="submit" class="añadirCarrito"><img src="desing/img/Iconos/shopping-cart.png" style="height: 19px; width: 19px"></button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php
                                if ($j == 9) {
                                    break;
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="d-flex flex-column justify-content-center align-items-center pb-3">

        <form id="filtroCategoriasForm" class=" mt-5 mb-3 d-flex flex-column align-items-center">
            <div class="d-flex">
                <?php foreach ($categorias as $categoria) { ?>
                    <div class="form-check mx-3">
                        <input type="checkbox" class="form-check-input" id="categoria<?= $categoria->getId() ?>" name="categorias[]" value="<?= $categoria->getId() ?>">
                        <label class="form-check-label" for="categoria<?= $categoria->getId() ?>"><?= $categoria->getNombre() ?></label>
                    </div>
                <?php } ?>
            </div>
        </form>

        <?php
        foreach ($categorias as $categoria) {

            $productosByCategoria = ProductoDAO::getProductByCategory($categoria->getId());
            $bebidasByCategoria = ProductoDAO::getBebidaByCategory($categoria->getId());



        ?>
            <h3 id="cartaCatName<?= $categoria->getId() ?>"><?= $categoria->getNombre() ?></h3>

            <div id="cartaProdCat<?= $categoria->getId() ?>" class="categorias row mx-0 px-5 px-md-0 px-lg-5 px-xl-5 d-flex justify-content-center">

                <div class="caruselXL">
                    <div class="row w-100 mx-0 px-3 d-flex justify-content-center">
                        <div class="container mt-5">
                            <?php
                            if ($categoria->getId() != 4 && $categoria->getId() != 5 && $categoria->getId() != 6) {
                            ?>
                                <div id="myCarouselXL<?php echo $categoria->getNombre() ?>" class="carousel slide">
                                    <div class="carousel-inner">
                                        <?php $totalProductos = count($productosByCategoria); ?>
                                        <?php $numProductos = ceil($totalProductos / 5); ?>

                                        <?php for ($i = 0; $i < $numProductos; $i++) { ?>
                                            <div class="carousel-item <?php echo ($i === 0) ? 'active' : ''; ?>">
                                                <div class="card-deck px-2 d-flex justify-content-evenly">
                                                    <?php for ($j = 0; $j < 5; $j++) { ?>
                                                        <?php $index = $i * 5 + $j; ?>
                                                        <?php if ($index < $totalProductos) { ?>
                                                            <div class="card border-0 col-xl-2 px-0 py-4 mx-xl-3 p-xl-0">

                                                                <img src="desing/img/Productos/<?= $productosByCategoria[$index]->getImg() ?>" style="background-color: #F7F7F7" class="object-fit-scale">

                                                                <div class="infoProducto p-1 d-flex flex-column">

                                                                    <p><?= $productosByCategoria[$index]->getNombre() ?></p>

                                                                    <div class="d-flex justify-content-between">

                                                                        <div class="m-0 fw-bold d-flex align-items-center">

                                                                            <form action="<?= URL . "?controller=producto&action=addFavorite" ?>" method="post" class="m-0">
                                                                                <input hidden name="id" value="<?= $productosByCategoria[$index]->getId() ?>">
                                                                                <button type="submit" class="añadirCarrito p-0"><img src="desing/img/Iconos/corazon.png" style="height: 12px; width: 12px"></button>
                                                                            </form>

                                                                            <p class="align-self-start ms-1 mb-0"><?= $productosByCategoria[$index]->getPrecioDescuento() . "€" ?></p>

                                                                            <?php
                                                                            if ($productos[$index]->getDescuento() != null) {
                                                                                echo "<p class=\"promo align-self-start ms-1 mb-0\">" . $productosByCategoria[$index]->getPrecio() . "€ </p>";
                                                                            }
                                                                            ?>

                                                                            <div class="descuento d-flex justify-content-center bg-descuento rounded-1 px-1 ms-1">

                                                                                <p class="mb-0"><?= $productosByCategoria[$index]->getDescuentoText() ?></p>

                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex align-items-center justify-content-end">
                                                                            <form action="<?= URL . "?controller=producto&action=addCart" ?>" method="post" class="m-0">
                                                                                <input hidden name="id" value="<?= $productosByCategoria[$index]->getId() ?>">
                                                                                <button type="submit" class="añadirCarrito"><img src="desing/img/Iconos/shopping-cart.png" style="height: 19px; width: 19px"></button>
                                                                            </form>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <a class="carousel-control-prev d-flex justify-content-start ms-4" href="#myCarouselXL<?php echo $categoria->getNombre() ?>" role="button" data-slide="prev">
                                        <span class="carouselPrevIcon" aria-hidden="true"></span>
                                    </a>
                                    <a class="carousel-control-next d-flex justify-content-end me-4" href="#myCarouselXL<?php echo $categoria->getNombre() ?>" role="button" data-slide="next">
                                        <span class="carouselNextIcon" aria-hidden="true"></span>
                                    </a>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div id="myCarouselXL<?php echo $categoria->getNombre() ?>" class="carousel slide">
                                    <div class="carousel-inner">
                                        <?php $totalProductos = count($bebidasByCategoria); ?>
                                        <?php $numProductos = ceil($totalProductos / 5); ?>

                                        <?php for ($i = 0; $i < $numProductos; $i++) { ?>
                                            <div class="carousel-item <?php echo ($i === 0) ? 'active' : ''; ?>">
                                                <div class="card-deck px-2 d-flex justify-content-evenly">
                                                    <?php for ($j = 0; $j < 5; $j++) { ?>
                                                        <?php $index = $i * 5 + $j; ?>
                                                        <?php if ($index < $totalProductos) { ?>
                                                            <div class="card border-0 col-xl-2 px-0 py-4 mx-xl-3 p-xl-0">
                                                                <?php
                                                                if ($bebidasByCategoria[$index]->getPajita() == 1) {
                                                                ?>
                                                                    <img src="desing/img/Productos/<?= $bebidasByCategoria[$index]->getImg() ?>" style="background-color: #F7F7F7; z-index: 0;" class="object-fit-scale">
                                                                    <img src="desing/img/Iconos/pajita.png" style="z-index: 1; position: absolute; width: 100px;" class="d-flex object-fit-scale">
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <img src="desing/img/Productos/<?= $bebidasByCategoria[$index]->getImg() ?>" style="background-color: #F7F7F7" class="object-fit-scale">
                                                                <?php
                                                                }
                                                                ?>
                                                                <div class="infoProducto p-1 d-flex flex-column">

                                                                    <p><?= $bebidasByCategoria[$index]->getNombre() ?></p>


                                                                    <div class="d-flex justify-content-between">

                                                                        <div class="m-0 fw-bold d-flex align-items-center">

                                                                            <form action="<?= URL . "?controller=producto&action=addFavorite" ?>" method="post" class="m-0">
                                                                                <input hidden name="id" value="<?= $bebidasByCategoria[$index]->getId() ?>">
                                                                                <button type="submit" class="añadirCarrito p-0"><img src="desing/img/Iconos/corazon.png" style="height: 12px; width: 12px"></button>
                                                                            </form>

                                                                            <p class="align-self-start ms-1 mb-0"><?= $bebidasByCategoria[$index]->getPrecioDescuento() . "€" ?></p>

                                                                            <?php
                                                                            if ($productos[$index]->getDescuento() != null) {
                                                                                echo "<p class=\"promo align-self-start ms-1 mb-0\">" . $bebidasByCategoria[$index]->getPrecio() . "€ </p>";
                                                                            }
                                                                            ?>

                                                                            <div class="descuento d-flex justify-content-center bg-descuento rounded-1 px-1 ms-1">

                                                                                <p class="mb-0"><?= $bebidasByCategoria[$index]->getDescuentoText() ?></p>

                                                                            </div>

                                                                        </div>
                                                                        <div class="d-flex align-items-center justify-content-end">
                                                                            <form action="<?= URL . "?controller=producto&action=addCart" ?>" method="post" class="m-0">
                                                                                <input hidden name="id" value="<?= $bebidasByCategoria[$index]->getId() ?>">
                                                                                <button type="submit" class="añadirCarrito"><img src="desing/img/Iconos/shopping-cart.png" style="height: 19px; width: 19px"></button>
                                                                            </form>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <a class="carousel-control-prev d-flex justify-content-start ms-4" href="#myCarouselXL<?php echo $categoria->getNombre() ?>" role="button" data-slide="prev">
                                        <span class="carouselPrevIcon" aria-hidden="true"></span>
                                    </a>
                                    <a class="carousel-control-next d-flex justify-content-end me-4" href="#myCarouselXL<?php echo $categoria->getNombre() ?>" role="button" data-slide="next">
                                        <span class="carouselNextIcon" aria-hidden="true"></span>
                                    </a>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>


                <form action="<?= URL . "?controller=producto&action=goCategory" ?>" method="post" class="d-flex justify-content-center">
                    <input hidden name="categoria" value="<?= $categoria->getId() ?>">
                    <button type="submit" class="my-xl-5 buttonEstilo">Ver Todo</button>
                </form>

            </div>
        <?php } ?>

    </section>


</body>

<?php
include_once "footer.php";
?>


<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/filtroCarta.js"></script>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



</html>