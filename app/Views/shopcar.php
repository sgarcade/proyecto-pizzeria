<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pizza - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
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
    <?php include("includes/header.php")?>
    
    <section class="shopping-cart" style="padding: 2rem; background-color: #222; color: #fff; border: 1px solid #444; border-radius: 8px; max-width: 600px; margin: 0 auto; text-align: center; box-shadow: 0px 4px 10px rgba(0,0,0,0.3);">
  <h2 style="text-align: center; font-size: 1.8rem; color: #ffcc00;">🛒 Carrito de Compras</h2>

  <div class="cart-items" style="margin-top: 1.5rem;">
    <?php if (!empty($shopcar)): ?>
      <?php foreach ($shopcar as $item): ?>
        <div class="cart-item" style="display: flex; justify-content: space-between; align-items: center; padding: 1rem 0; border-bottom: 1px solid #555;">
          <div class="item-details" style="text-align: left;">
            <p style="margin: 0; font-size: 1.2rem;">🍕 <?= esc($item['nombre_producto']) ?></p>
            <p style="margin: 0; color: #bbb; font-size: 0.9rem;">Descripción: <?= esc($item['descripcion'] ?? 'Sin descripción') ?></p>
            <p style="margin: 0.5rem 0 0; font-weight: bold;">Cantidad: <?= esc($item['cantidad']) ?></p>
          </div>
          <div class="item-price">
            <p style="font-size: 1rem; color: #ffcc00;">$<?= number_format($item['precio_unitario'], 3) ?></p>
            <p style="font-size: 0.9rem; color: #bbb;">Subtotal: $<?= number_format($item['subtotal'], 3) ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div style="padding: 2rem; text-align: center; color: #ccc;">
        <h3 style="color: #ffcc00; margin-bottom: 1rem;">Whoops! Tu carrito está vacío. 🛒</h3>
        <p style="margin-bottom: 1.5rem;">Explora nuestros productos y agrega tus favoritos.</p>
        <a href="searchproducts" style="text-decoration: none; color: #fff; background-color: #007bff; padding: 0.7rem 1.5rem; border-radius: 8px; transition: background-color 0.3s;">Ir al Catálogo</a>
      </div>
    <?php endif; ?>
  </div>

  <?php if (!empty($shopcar)): ?>
    <div class="total" style="margin-top: 1.5rem; font-size: 1.2rem;">
      <p style="color: #ffcc00;">Subtotal: $<?= number_format($total, 3) ?></p>
      <p style="margin-top: 0.5rem; color: #ccc;">Envío: Gratis!</p>
      <p style="margin-top: 1rem; font-weight: bold; color: #ffcc00; font-size: 1.5rem;">Total: $<?= number_format($total , 3) ?></p>
      <p style="margin-top: 1rem; color: #bbb;">Cantidad total de productos: <?= esc($cantidad_total) ?></p>
    </div>

    <button style="margin-top: 2rem; padding: 0.7rem 1.5rem; background-color: #007bff; color: #fff; border: none; border-radius: 8px; cursor: pointer; font-size: 1.1rem; transition: background-color 0.3s;",
    onclick="window.location.href='paymentGetaway'">
      Proceder al Pago
    </button>
  <?php endif; ?>
</section>


    <footer class="ftco-footer ftco-section img">
      <div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About Us</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Recent Blog</h2>
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
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
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
              <h2 class="ftco-heading-2">Services</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Cooked</a></li>
                <li><a href="#" class="py-2 d-block">Deliver</a></li>
                <li><a href="#" class="py-2 d-block">Quality Foods</a></li>
                <li><a href="#" class="py-2 d-block">Mixed</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Have a Questions?</h2>
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
            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | Esta plantilla está diseñada por <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
          </div>
        </div>
      </div>
    </footer>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>