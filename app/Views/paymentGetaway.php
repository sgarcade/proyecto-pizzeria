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

   
      <section class="payment-section" style="padding: 2rem; background-color: #222; color: #fff; border: 1px solid #444; border-radius: 8px; max-width: 600px; margin: 2rem auto; text-align: center; box-shadow: 0px 4px 10px rgba(0,0,0,0.3);">
    <h2 style="font-size: 1.8rem; color: #ffcc00; margin-bottom: 1.5rem;">💳 Pasarela de Pago</h2>
    
    <form action="/process-payment" method="POST" style="text-align: left; color: #ddd;">
        <!-- Nombre del titular -->
        <div style="margin-bottom: 1.5rem;">
            <label for="card-name" style="font-size: 1rem; font-weight: bold;">Nombre en la tarjeta</label>
            <input type="text" id="card-name" name="card_name" required style="width: 100%; padding: 0.7rem; margin-top: 0.5rem; border: 1px solid #555; border-radius: 8px; background-color: #333; color: #fff;">
        </div>

        <!-- Número de tarjeta -->
        <div style="margin-bottom: 1.5rem;">
            <label for="card-number" style="font-size: 1rem; font-weight: bold;">Número de tarjeta</label>
            <input type="text" id="card-number" name="card_number" maxlength="16" required style="width: 100%; padding: 0.7rem; margin-top: 0.5rem; border: 1px solid #555; border-radius: 8px; background-color: #333; color: #fff;">
        </div>

        <!-- Fecha de expiración -->
        <div style="display: flex; gap: 1rem; margin-bottom: 1.5rem;">
            <div style="flex: 1;">
                <label for="exp-month" style="font-size: 1rem; font-weight: bold;">Mes de expiración</label>
                <input type="text" id="exp-month" name="exp_month" maxlength="2" placeholder="MM" required style="width: 100%; padding: 0.7rem; margin-top: 0.5rem; border: 1px solid #555; border-radius: 8px; background-color: #333; color: #fff;">
            </div>
            <div style="flex: 1;">
                <label for="exp-year" style="font-size: 1rem; font-weight: bold;">Año de expiración</label>
                <input type="text" id="exp-year" name="exp_year" maxlength="4" placeholder="YYYY" required style="width: 100%; padding: 0.7rem; margin-top: 0.5rem; border: 1px solid #555; border-radius: 8px; background-color: #333; color: #fff;">
            </div>
        </div>

        <!-- CVV -->
        <div style="margin-bottom: 1.5rem;">
            <label for="cvv" style="font-size: 1rem; font-weight: bold;">CVV</label>
            <input type="text" id="cvv" name="cvv" maxlength="3" required style="width: 100%; padding: 0.7rem; margin-top: 0.5rem; border: 1px solid #555; border-radius: 8px; background-color: #333; color: #fff;">
        </div>

        <!-- Botón de enviar -->
        <button type="submit" style="width: 100%; padding: 0.7rem; background-color: #007bff; color: #fff; border: none; border-radius: 8px; cursor: pointer; font-size: 1.1rem; transition: background-color 0.3s;">
            Confirmar Pago
        </button>
    </form>

    <!-- Información de seguridad -->
    <p style="margin-top: 1rem; font-size: 0.9rem; color: #bbb;">🔒 Tus datos no estan seguros, probablemente te van a clonar la tarjeta</p>
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

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>