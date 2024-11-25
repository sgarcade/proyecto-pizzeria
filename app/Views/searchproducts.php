<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Selecciona tu Producto - Tienda de Pizza</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php include("includes/header.php"); ?>

    <section class="product-selection" style="padding: 2rem; background-color: #222; color: #fff; border: 1px solid #444; border-radius: 8px; max-width: 700px; margin: 0 auto; text-align: center; box-shadow: 0px 4px 10px rgba(0,0,0,0.3);">
      <h2 style="font-size: 1.8rem; color: #ffcc00;">🛍️ Selección de Productos</h2>

      <form method="POST" action="/searchproducts" style="margin-top: 1rem;">
        <input type="text" name="search" placeholder="Buscar productos..." style="padding: 0.7rem; width: 80%; border-radius: 5px; border: 1px solid #ccc;">
        <button type="submit" style="padding: 0.7rem 1rem; background-color: #28a745; color: #fff; border: none; border-radius: 5px; cursor: pointer; margin-left: 0.5rem;">Buscar</button>
      </form>

      <div class="product-items" style="margin-top: 1.5rem;">
        <?php if (!empty($productos)): ?>
          <?php foreach ($productos as $producto): ?>
            <div class="product-item" style="display: flex; justify-content: space-between; align-items: center; padding: 1rem 0; border-bottom: 1px solid #555;">
              <div class="item-details" style="text-align: left;">
                <p style="margin: 0; font-size: 1.2rem; color: #ffcc00;">🍕 <?= htmlspecialchars($producto['nombre_producto']); ?></p>
                <p style="margin: 0; color: #bbb; font-size: 0.9rem;"><?= htmlspecialchars($producto['descripcion']); ?></p>
                <p style="margin: 0.5rem 0 0; color: #ffcc00;">Desde $<?= number_format($producto['precio_base'], 0, ',', '.'); ?></p>
              </div>
              <button style="padding: 0.3rem 0.8rem; background-color: #28a745; color: #fff; border: none; border-radius: 5px; cursor: pointer; font-size: 0.9rem;">
                Agregar
              </button>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p style="color: #ffcc00;">No se encontraron productos.</p>
        <?php endif; ?>
      </div>

      <button style="margin-top: 2rem; padding: 0.7rem 1.5rem; background-color: #007bff; color: #fff; border: none; border-radius: 8px; cursor: pointer; font-size: 1.1rem; transition: background-color 0.3s;">
        Ver Carrito
      </button>
    </section>

    <footer class="ftco-footer ftco-section img">
      <div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Sobre Nosotros</h2>
              <p>Lejos, detrás de las montañas, viven los textos ciegos que forman el mundo de Vokalia y Consonantia.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li><a href="#"><span class="icon-twitter"></span></a></li>
                <li><a href="#"><span class="icon-facebook"></span></a></li>
                <li><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Blog Reciente</h2>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Servicios</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Cocinados</a></li>
                <li><a href="#" class="py-2 d-block">Entrega</a></li>
                <li><a href="#" class="py-2 d-block">Comida de Calidad</a></li>
                <li><a href="#" class="py-2 d-block">Mixto</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">¿Tienes Preguntas?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                  <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                  <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <p>
              Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | Esta plantilla fue hecha con <i class="icon-heart" aria-hidden="true"></i> por <a href="https://colorlib.com" target="_blank">Colorlib</a>
            </p>
          </div>
        </div>
      </div>
    </footer>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
