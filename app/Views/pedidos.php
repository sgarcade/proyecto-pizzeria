<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Nostra</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">
    
    <!-- CSS Styles -->
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

    <style>        
        body {
            color: #fff;
        }
        nav {
            background-color: #343a40; /* Dark navigation background */
        }

        h2 {
            color: #ffc107; /* Amber color for headings */
            margin-bottom: 30px;
            text-align: center;
            font-size: 2.5em;
            font-weight: 600;
        }

        .container2 {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff; /* White table background */
            border-radius: 8px; /* Rounded corners for the table */
            overflow: hidden; /* Hide overflow for rounded corners */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #ffc107; /* Amber header background */
            color: #fff; /* White text for header */
            font-weight: 500;
            text-transform: uppercase; /* Uppercase for better visibility */
        }

        .status-select {
            padding: 5px;
            border-radius: 4px;
            background-color: #fff;
            cursor: pointer;
            transition: border-color 0.3s ease;
            width: 100%;
        }

        .status-select:hover {
            border-color: #ffc107; /* Highlight border on hover */
        }

        .btn {
            background-color: #ffc107; /* Amber button color */
            border: none;
            color: #fff; /* White text for buttons */
            padding: 12px 24px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            font-weight: 500;
            text-transform: uppercase; /* Uppercase for emphasis */
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn:hover {
            background-color: #e0a800; /* Darker amber on hover */
            transform: translateY(-2px); /* Slight lift effect */
        }

        .pagination {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .pagination button {
            background-color: #343a40; /* Dark background for pagination */
            color: #fff; /* White text for pagination */
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .pagination button:hover {
            background-color: #495057; /* Darker shade on hover */
            transform: translateY(-2px); /* Slight lift effect */
        }

        footer {
            background-color: #343a40; /* Dark footer background */
            color: #fff; /* White text in footer */
            padding: 40px 0;
        }

        footer h2 {
            color: #ffc107; /* Amber color for footer heading */
        }

        footer a {
            color: #ffc107; /* Amber color for footer links */
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #e0a800; /* Darker amber on hover */
        }
    </style>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light">
		<div class="container">
			<a class="navbar-brand" href="<?= base_url('/'); ?>"><span class="flaticon-pizza-1 mr-1"></span>Pizza<br><small>Delicious</small></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Pedidos
			</button>
			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active"><a href="<?= base_url('/'); ?>" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="<?= base_url('menu'); ?>" class="nav-link">Menu</a></li>
					<li class="nav-item"><a href="<?= base_url('services'); ?>" class="nav-link">Services</a></li>
                    <li class="nav-item"><a href="<?= base_url('pedidos'); ?>" class="nav-link">Pedidos</a></li>					
					<li class="nav-item"><a href="<?= base_url('blog'); ?>" class="nav-link">Blog</a></li>
					<li class="nav-item"><a href="<?= base_url('about'); ?>" class="nav-link">About Us</a></li>
					<li class="nav-item"><a href="<?= base_url('contact'); ?>" class="nav-link">Contact</a></li>
					<li class="nav-item"><a href="<?= base_url('login'); ?>" class="nav-link">Login</a></li>
				</ul>
			</div>
		</div>
	</nav>

<div class="container mt-5">
    <h2>Estado de pedidos</h2>
    <table class="table table-striped">
        <thead class="table-header">
            <tr>
                <th># Pedido</th>
                <th>Cliente</th>                
                <th>Productos</th> <!-- New column added -->
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
        <tr>
                <td>1026</td>
                <td>Daniel Lopez</td>                
                <td>Pizza BBQ, Ensalada Mixta</td> <!-- Product details added -->
                <td>Preparado</td>
            </tr>
            <tr>
                <td>1027</td>
                <td>Luisa Vasquez</td>                
                <td>Pizza Margarita, Bebida</td> <!-- Product details added -->
                <td>Preparado</td>
            </tr>
            <tr>
                <td>1028</td>
                <td>Juan Moreno</td>                
                <td>Pizza Hawaiana, Postre</td> <!-- Product details added -->
                <td>Entregado</td>
            </tr>
            <tr>
                <td>1029</td>
                <td>David Diaz</td>                
                <td>Pizza Pepperoni, ensalada de frutas</td> <!-- Product details added -->
                <td>Cocinandose</td>
            </tr>
            
        </tbody>
    </table>

    <div class="pagination">
        <button onclick="prevPage()">Anterior</button>
        <button onclick="nextPage()">Siguiente</button>
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

<script>
    function updateOrderStatus(orderId, status) {
        // Add your AJAX request logic to update order status
        console.log('Updating order ' + orderId + ' to status: ' + status);
    }

    function prevPage() {
        // Add your logic for previous page
        console.log('Previous page');
    }

    function nextPage() {
        // Add your logic for next page
        console.log('Next page');
    }
</script>

</body>
</html>
