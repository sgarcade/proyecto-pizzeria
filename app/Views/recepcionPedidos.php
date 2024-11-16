<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Nostra</title>
    
    <!-- Fuentes y Estilos -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">
    
    <!-- Estilos -->
    <link rel="stylesheet" href="<?php echo base_url('css/open-iconic-bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/animate.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/owl.carousel.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/owl.theme.default.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/magnific-popup.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/aos.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/ionicons.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap-datepicker.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/jquery.timepicker.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/flaticon.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/icomoon.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>">


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('/'); ?>"><span class="flaticon-pizza-1 mr-1"></span>Pizza<br><small>Delicious</small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Order Reception
        </button>
        <?php include("includes/header.php")?>
    </div>
</nav>

<div class="container2">
    <h1 class="order-header">Recepción de Pedidos</h1>

    <!-- Pedido 1 -->
    <div class="order-card">
        <div class="order-item">
            <div class="order-info">
                <h5>Pedido #1023</h5>
                <p><strong>Cliente:</strong> Juan Pérez</p>
                <p><strong>Dirección:</strong> Calle 123, Bogotá</p>
                <p><strong>Teléfono:</strong> 3101234567</p>
                <p><strong>Notas:</strong> Sin cebolla en la pizza</p>
                <p><strong>Estado:</strong> Preparado</p>
            </div>
            <div class="order-actions">
                <button class="btn-process">Asignar Domiciliario</button>
            </div>
        </div>
        
        <div class="order-item">
			<div class="order-item-details">
				<span class="order-item-icon">🍕</span> <!-- Icono personalizado, como emoji o fuente -->
				<strong>Pizza Pepperoni</strong>
			</div>
			<span>Grande - Queso Extra</span>
		</div>
		<div class="order-item">
			<div class="order-item-details">
				<span class="order-item-icon">🍕</span> <!-- Icono personalizado, como emoji o fuente -->
				<strong>Pizza Hawaina</strong>
			</div>
			<span>Mediana - Masa Delgada</span>
		</div>
        <div class="order-item">
			<div class="order-item-details">
				<span class="order-item-icon">🥤</span> <!-- Icono de refresco -->
				<strong>Coca Cola</strong>
			</div>
			<span>2 L</span>
		</div>

    </div>

    <!-- Pedido 2 -->
    <div class="order-card">
        <div class="order-item">
            <div class="order-info">
                <h5>Pedido #1024</h5>
                <p><strong>Cliente:</strong> María López</p>
                <p><strong>Dirección:</strong> Avenida 45, Medellín</p>
                <p><strong>Teléfono:</strong> 3208765432</p>
                <p><strong>Notas:</strong> Entregar sin picante</p>
                <p><strong>Estado:</strong> Preparado</p>
            </div>           
            <div class="order-actions">
                <button class="btn-process">Asignar Domiciliario</button>
            </div>
        </div>
		<div class="order-item">
			<div class="order-item-details">
				<span class="order-item-icon">🍕</span> <!-- Icono personalizado, como emoji o fuente -->
				<strong>Pizza 4 Quesos</strong>
			</div>
			<span>Grande - Masa Gruesa</span>
		</div>
        <div class="order-item">
			<div class="order-item-details">
				<span class="order-item-icon">🥗</span> <!-- Icono de ensalada -->
				<strong>Ensalada César</strong>
			</div>
			<span>Sin crutones</span>
		</div>
    </div>
    <div class="order-card">
        <div class="order-item">
            <div class="order-info">
                <h5>Pedido #1025</h5>
                <p><strong>Cliente:</strong> Carlos Fernández</p>
                <p><strong>Dirección:</strong> Calle 10, Cali</p>
                <p><strong>Teléfono:</strong> 3159876543</p>
                <p><strong>Notas:</strong> Agregar extra de queso</p>
                <p><strong>Estado:</strong> Preparado</p>
            </div>            
            <div class="order-actions">
                <button class="btn-process">Asignar Domiciliario</button>
            </div>
        </div>
        <div class="order-item">
            <div class="order-item-details">
                <span class="order-item-icon">🍕</span> <!-- Icono de pizza -->
                <strong>Pizza Margarita</strong>
            </div>
            <span>Mediana - Masa Delgada</span>
        </div>
        <div class="order-item">
            <div class="order-item-details">
                <span class="order-item-icon">🥤</span> <!-- Icono de refresco -->
                <strong>Refresco</strong>
            </div>
            <span>1.5 L</span>
        </div>
    </div>

    <div class="order-card">
        <div class="order-item">
            <div class="order-info">
                <h5>Pedido #1026</h5>
                <p><strong>Cliente:</strong> Ana Gómez</p>
                <p><strong>Dirección:</strong> Carrera 15, Bogotá</p>
                <p><strong>Teléfono:</strong> 3001234567</p>
                <p><strong>Notas:</strong> Sin mayonesa en la ensalada</p>
                <p><strong>Estado:</strong> En preparación</p>
            </div>
            <div class="order-actions">
                <button class="btn-process">Enviar a Cocina</button>
            </div>
        </div>
        <div class="order-item">
            <div class="order-item-details">
                <span class="order-item-icon">🍕</span> <!-- Icono de pizza -->
                <strong>Pizza BBQ</strong>
            </div>
            <span>Grande - Masa Gruesa</span>
        </div>
        <div class="order-item">
            <div class="order-item-details">
                <span class="order-item-icon">🥗</span> <!-- Icono de ensalada -->
                <strong>Ensalada Mixta</strong>
            </div>
            <span>Con aderezo de yogur</span>
        </div>
    </div>

    <div class="order-card">
        <div class="order-item">
            <div class="order-info">
                <h5>Pedido #1027</h5>
                <p><strong>Cliente:</strong> Luis Martínez</p>
                <p><strong>Dirección:</strong> Avenida 20, Medellín</p>
                <p><strong>Teléfono:</strong> 3145678901</p>
                <p><strong>Notas:</strong> Sin picante en la pizza</p>
                <p><strong>Estado:</strong> En cola</p>
            </div>
            <div class="order-actions">
                <button class="btn-process">Enviar a Cocina</button>
            </div>
        </div>
        <div class="order-item">
            <div class="order-item-details">
                <span class="order-item-icon">🍕</span> <!-- Icono de pizza -->
                <strong>Pizza Vegetariana</strong>
            </div>
            <span>Mediana - Masa Delgada</span>
        </div>
        <div class="order-item">
            <div class="order-item-details">
                <span class="order-item-icon">🥤</span> <!-- Icono de refresco -->
                <strong>Jugo Natural</strong>
            </div>
            <span>1 L</span>
        </div>
    </div>

    <div class="order-card">
        <div class="order-item">
            <div class="order-info">
                <h5>Pedido #1028</h5>
                <p><strong>Cliente:</strong> Pedro Sánchez</p>
                <p><strong>Dirección:</strong> Calle 50, Barranquilla</p>
                <p><strong>Teléfono:</strong> 3187654321</p>
                <p><strong>Notas:</strong> Con extra de piña en la pizza</p>
                <p><strong>Estado:</strong> En cola</p>
            </div>
            <div class="order-actions">
                <button class="btn-process">Enviar a Cocina</button>
            </div>
        </div>
        <div class="order-item">
            <div class="order-item-details">
                <span class="order-item-icon">🍕</span> <!-- Icono de pizza -->
                <strong>Pizza Hawaiana</strong>
            </div>
            <span>Grande - Masa Gruesa</span>
        </div>
        <div class="order-item">
            <div class="order-item-details">
                <span class="order-item-icon">🥗</span> <!-- Icono de ensalada -->
                <strong>Ensalada César</strong>
            </div>
            <span>Con aderezo ranch</span>
        </div>
    </div>

    <div class="order-card">
        <div class="order-item">
            <div class="order-info">
                <h5>Pedido #1029</h5>
                <p><strong>Cliente:</strong> Sofía Rodríguez</p>
                <p><strong>Dirección:</strong> Calle 8, Cartagena</p>
                <p><strong>Teléfono:</strong> 3212345678</p>
                <p><strong>Notas:</strong> Sin cebolla en la pizza</p>
                <p><strong>Estado:</strong> En cola</p>
            </div>
            <div class="order-actions">
                <button class="btn-process">Enviar a Cocina</button>
            </div>
        </div>
        <div class="order-item">
            <div class="order-item-details">
                <span class="order-item-icon">🍕</span> <!-- Icono de pizza -->
                <strong>Pizza Pepperoni</strong>
            </div>
            <span>Mediana - Masa Delgada</span>
        </div>
        <div class="order-item">
            <div class="order-item-details">
                <span class="order-item-icon">🥗</span> <!-- Icono de ensalada -->
                <strong>Ensalada de Frutas</strong>
            </div>
            <span>Con miel</span>
        </div>
    </div>

</div>
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

</body>
</html>
