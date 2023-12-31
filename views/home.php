<!DOCTYPE html PUBLIC>
<html>

<head>
    <title>Gato Preto Restaurant</title>
    
    <!-- Metadatos y enlaces a estilos -->
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
    
    <!-- Sección de Artículos de Interés con Carousels -->
    <section class="d-flex flex-column justify-content-center align-items-center pb-3">
        <h3>ARTÍCULOS DE INTERÉS</h3>

        <!-- Carrusel con formato para la pantalla xl o formato escritorio -->
        <div class="caruselXL">
            <div class="row w-100 mx-0 px-3 d-flex justify-content-center">
                <div class="container mt-5">
                    <div id="myCarouselXL" class="carousel slide">
                        <div class="carousel-inner">
                            <!-- Mostramos todos los productos de interes desde la base de datos -->
                            <?php $totalProductos = count($productos); ?>
                            <?php $numProductos = ceil($totalProductos / 5); ?>

                            <?php for ($i = 0; $i < $numProductos; $i++) { ?>
                                <div class="carousel-item <?php echo ($i === 0) ? 'active' : ''; ?>">
                                    <div class="card-deck px-2">
                                        <?php for ($j = 0; $j < 5; $j++) { ?>
                                            <?php $index = $i * 5 + $j; ?>
                                            <?php if ($index < $totalProductos) { ?>
                                                
                                                <!-- Creamos una carta para cada producto con toda su informacion -->
                                                <div class="card border-0 col-xl-2 px-0 py-4 mx-xl-3 p-xl-0">

                                                    <img src="desing/img/Productos/<?= $productos[$index]->getImg() ?>" style="background-color: #F7F7F7" class="object-fit-scale">

                                                    <div class="infoProducto p-1 d-flex flex-column">

                                                        <p><?= $productos[$index]->getNombre() ?></p>

                                                        <div class="d-flex justify-content-between">

                                                            <div class="m-0 fw-bold d-flex align-items-center">

                                                                <form action="<?= URL . "?controller=producto&action=addFavorite" ?>" method="post" class="m-0">
                                                                    <input hidden name="id" value="<?= $productos[$index]->getId() ?>">
                                                                    <button type="submit" class="añadirCarrito p-0"><img src="desing/img/Iconos/corazon.png" style="height: 12px; width: 12px"></button>
                                                                </form>

                                                                <p class="align-self-start ms-1 mb-0"><?= $productos[$index]->getPrecioDescuento() . "€" ?></p>

                                                                <?php
                                                                    if($productos[$index]->getDescuento()!= null){
                                                                        echo "<p class=\"promo align-self-start ms-1 mb-0\">" . $productos[$index]->getPrecio() . "€ </p>";
                                                                    }
                                                                ?>

                                                                <div class="descuento d-flex justify-content-center bg-descuento rounded-1 px-1 ms-1">

                                                                    <p class="mb-0"><?= $productos[$index]->getDescuentoText() ?></p>

                                                                </div>

                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-end">
                                                                <form action="<?= URL . "?controller=producto&action=addCart" ?>" method="post" class="m-0">
                                                                    <input hidden name="id" value="<?= $productos[$index]->getId() ?>">
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
                        <a class="carousel-control-prev d-flex justify-content-start ms-4" href="#myCarouselXL" role="button" data-slide="prev">
                            <span class="carouselPrevIcon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next d-flex justify-content-end me-4" href="#myCarouselXL" role="button" data-slide="next">
                            <span class="carouselNextIcon" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="caruselLG">
            <div class="row w-100 mx-0 px-3 px-sm-5 px-md-0 px-lg-0 d-flex justify-content-center">
                <div class="container mt-5">
                    <div id="myCarouselLG" class="carousel slide">
                        <div class="carousel-inner">
                            <?php $totalProductos = count($productos); ?>
                            <?php $numProductos = ceil($totalProductos / 3); ?>

                            <?php for ($i = 0; $i < $numProductos; $i++) { ?>
                                <div class="carousel-item <?php echo ($i === 0) ? 'active' : ''; ?>">
                                    <div class="card-deck px-2">
                                        <?php for ($j = 0; $j < 3; $j++) { ?>
                                            <?php $index = $i * 3 + $j; ?>
                                            <?php if ($index < $totalProductos) { ?>
                                                <div class="card border-0  col-11 mt-4 col-md-5 col-lg-3 col-xl-2 px-0 py-4 mx-md-3 p-md-0 mx-lg-3 p-lg-0 mx-xl-3 p-xl-0">

                                                    <img src="desing/img/Productos/<?= $productos[$index]->getImg() ?>" style="background-color: #F7F7F7" class="object-fit-scale">

                                                    <div class="infoProducto p-2 d-flex flex-column">

                                                        <p><?= $productos[$index]->getNombre() ?></p>

                                                        <div class="d-flex justify-content-between">

                                                            <div class="m-0 fw-bold d-flex align-items-center">

                                                                <form action="<?= URL . "?controller=producto&action=addFavorite" ?>" method="post" class="m-0">
                                                                    <input hidden name="id" value="<?= $productos[$index]->getId() ?>">
                                                                    <button type="submit" class="añadirCarrito p-0"><img src="desing/img/Iconos/corazon.png" style="height: 12px; width: 12px"></button>
                                                                </form>

                                                                <p class="align-self-start ms-1 mb-0"><?= $productos[$index]->getPrecio() . "€" ?></p>

                                                                <p class="promo align-self-start ms-2 mb-0">4,50 €</p>

                                                                <div class="descuento d-flex justify-content-center bg-descuento rounded-1 px-1 ms-1">

                                                                    <p class="mb-0">-35%</p>

                                                                </div>

                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-end">
                                                                <form action="<?= URL . "?controller=producto&action=addCart" ?>" method="post" class="m-0">
                                                                    <input hidden name="id" value="<?= $productos[$index]->getId() ?>">
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
                        <a class="carousel-control-prev d-flex justify-content-start ms-4" href="#myCarouselLG" role="button" data-slide="prev">
                            <span class="carouselPrevIcon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next d-flex justify-content-end me-4" href="#myCarouselLG" role="button" data-slide="next">
                            <span class="carouselNextIcon" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="caruselMD">
            <div class="row w-100 mx-0 px-3 px-sm-5 px-md-0 px-lg-0 d-flex justify-content-center">
                <div class="container mt-5">
                    <div id="myCarouselMD" class="carousel slide">
                        <div class="carousel-inner">
                            <?php $totalProductos = count($productos); ?>
                            <?php $numProductos = ceil($totalProductos / 2); ?>

                            <?php for ($i = 0; $i < $numProductos; $i++) { ?>
                                <div class="carousel-item <?php echo ($i === 0) ? 'active' : ''; ?>">
                                    <div class="card-deck px-2">
                                        <?php for ($j = 0; $j < 2; $j++) { ?>
                                            <?php $index = $i * 2 + $j; ?>
                                            <?php if ($index < $totalProductos) { ?>
                                                <div class="card border-0  col-11 mt-4 col-md-5 col-lg-3 col-xl-2 px-0 py-4 mx-md-3 p-md-0 mx-lg-3 p-lg-0 mx-xl-3 p-xl-0">

                                                    <img src="desing/img/Productos/<?= $productos[$index]->getImg() ?>" style="background-color: #F7F7F7" class="object-fit-scale">

                                                    <div class="infoProducto p-2 d-flex flex-column">

                                                        <p><?= $productos[$index]->getNombre() ?></p>

                                                        <div class="d-flex justify-content-between">

                                                            <div class="m-0 fw-bold d-flex align-items-center">

                                                                <form action="<?= URL . "?controller=producto&action=addFavorite" ?>" method="post" class="m-0">
                                                                    <input hidden name="id" value="<?= $productos[$index]->getId() ?>">
                                                                    <button type="submit" class="añadirCarrito p-0"><img src="desing/img/Iconos/corazon.png" style="height: 12px; width: 12px"></button>
                                                                </form>

                                                                <p class="align-self-start ms-1 mb-0"><?= $productos[$index]->getPrecio() . "€" ?></p>

                                                                <p class="promo align-self-start ms-2 mb-0">4,50 €</p>

                                                                <div class="descuento d-flex justify-content-center bg-descuento rounded-1 px-1 ms-1">

                                                                    <p class="mb-0">-35%</p>

                                                                </div>

                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-end">
                                                                <form action="<?= URL . "?controller=producto&action=addCart" ?>" method="post" class="m-0">
                                                                    <input hidden name="id" value="<?= $productos[$index]->getId() ?>">
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
                        <a class="carousel-control-prev d-flex justify-content-start ms-4" href="#myCarouselMD" role="button" data-slide="prev">
                            <span class="carouselPrevIcon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next d-flex justify-content-end me-4" href="#myCarouselMD" role="button" data-slide="next">
                            <span class="carouselNextIcon" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="caruselSM">
            <div class="row w-100 mx-0 px-3 px-sm-5 px-md-0 px-lg-0 d-flex justify-content-center">
                <div class="container">
                    <div id="myCarouselSM" class="carousel slide">
                        <div class="carousel-inner">
                            <?php $totalProductos = count($productos); ?>
                            <?php $numProductos = ceil($totalProductos / 1); ?>

                            <?php for ($i = 0; $i < $numProductos; $i++) { ?>
                                <div class="carousel-item <?php echo ($i === 0) ? 'active' : ''; ?>">
                                    <div class="card-deck px-2 d-flex justify-content-center">
                                        <?php for ($j = 0; $j < 1; $j++) { ?>
                                            <?php $index = $i * 1 + $j; ?>
                                            <?php if ($index < $totalProductos) { ?>
                                                <div class="card border-0  col-11 mt-4 col-md-5 col-lg-3 col-xl-2 px-0 py-4 mx-md-3 p-md-0 mx-lg-3 p-lg-0 mx-xl-3 p-xl-0">

                                                    <img src="desing/img/Productos/<?= $productos[$index]->getImg() ?>" style="background-color: #F7F7F7" class="object-fit-scale">

                                                    <div class="infoProducto p-2 d-flex flex-column">

                                                        <p><?= $productos[$index]->getNombre() ?></p>

                                                        <div class="d-flex justify-content-between">

                                                            <div class="m-0 fw-bold d-flex align-items-center">

                                                                <form action="<?= URL . "?controller=producto&action=addFavorite" ?>" method="post" class="m-0">
                                                                    <input hidden name="id" value="<?= $productos[$index]->getId() ?>">
                                                                    <button type="submit" class="añadirCarrito p-0"><img src="desing/img/Iconos/corazon.png" style="height: 12px; width: 12px"></button>
                                                                </form>

                                                                <p class="align-self-start ms-1 mb-0"><?= $productos[$index]->getPrecio() . "€" ?></p>

                                                                <p class="promo align-self-start ms-2 mb-0">4,50 €</p>

                                                                <div class="descuento d-flex justify-content-center bg-descuento rounded-1 px-1 ms-1">

                                                                    <p class="mb-0">-35%</p>

                                                                </div>

                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-end">
                                                                <form action="<?= URL . "?controller=producto&action=addCart" ?>" method="post" class="m-0">
                                                                    <input hidden name="id" value="<?= $productos[$index]->getId() ?>">
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
                        <a class="carousel-control-prev d-flex justify-content-start ms-4" href="#myCarouselSM" role="button" data-slide="prev">
                            <span class="carouselPrevIcon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next d-flex justify-content-end me-4" href="#myCarouselSM" role="button" data-slide="next">
                            <span class="carouselNextIcon" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>


    </section>

    <!-- Sección de Descubre Nuestros Bocadillos -->
    <section class="row pt-5 d-flex justify-content-center d-flex flex-column justify-content-center align-items-center">
        <div class="info p-0 col-10 d-flex justify-content-center">
            <div class="imagen">
            </div>
            <div class="infoBocadillo pt-5">
                <h4>DESCUBRE NUESTROS BOCADILLOS</h4>
                <p>Encuentra tu bocadillo ideal o uno que te sorprenda</p>
                <!-- Boton que te envia a la categoria de bocadillos -->
                <form action="<?= URL . "?controller=producto&action=goCategory" ?>" method="post" class="d-flex justify-content-center">
                    <input hidden name="categoria" value="2">
                    <button type="submit" class="buttonEstilo">Descubre</button>
                </form>
            </div>
        </div>

    </section>

    <!-- Seccion de categorias-->
    <section class="d-flex flex-column justify-content-center align-items-center">
        <h3>CATEGORIAS</h3>
        
        <!-- Mostramos todas las categorias en una imagen-->
        <div class="categorias row mx-0 px-5 px-md-0 px-lg-5 px-xl-5 d-flex justify-content-center">
            <?php foreach ($categorias as $categoria) { ?>
                <div class="categoria col-11 col-md-5 col-lg-3 col-xl-2 px-5 py-4 p-md-0 p-lg-0 p-xl-2 d-flex justify-content-center" >
                    <div class="fondoCategoria d-flex justify-content-end align-items-center flex-column " style="background-image: linear-gradient(rgba(255,255,255,0.1), rgba(255,255,255,0.3)),  url(desing/img/categorias/<?= $categoria->getImg() ?>);">
                        <p><?= strtoupper($categoria->getNombre()) ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

</body>

<?php
include_once "footer.php";
?>

<script src="assets/js/bootstrap.bundle.min.js"></script>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



</html>