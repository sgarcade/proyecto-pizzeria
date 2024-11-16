<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del Cliente - Pizza Nostra</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    
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
            background-color: #343a40;
        }

        h2 {
            color: #ffc107;
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

        .profile-card {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .profile-card h3 {
            font-size: 1.8em;
            margin-bottom: 20px;
            color: #343a40;
        }

        .profile-card .form-group {
            margin-bottom: 20px;
        }

        .profile-card label {
            font-weight: 500;
            color: #343a40;
        }

        .profile-card input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #fff;
        }

        .profile-card input:focus {
            border-color: #ffc107;
        }

        .profile-card button {
            background-color: #ffc107;
            border: none;
            color: #fff;
            padding: 12px 24px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            font-weight: 500;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }

        .profile-card button:hover {
            background-color: #e0a800;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
            color: #fff;
            padding: 12px 24px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        footer {
            background-color: #343a40;
            color: #fff;
            padding: 40px 0;
        }

        footer h2 {
            color: #ffc107;
        }

        footer a {
            color: #ffc107;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #e0a800;
        }
    </style>
</head>
<body>
<?php include("includes/header.php")?>

<div class="container mt-5">
    <h2>Perfil del Cliente</h2>
    <div class="profile-card">
        <h3>Información Personal</h3>
        <form action="<?= base_url('perfil/guardar'); ?>" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="David Galeaono" required>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" value="david@example.com" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" value="3217539596" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" value="cra 65 a 45#2" required>
            </div>

            <button type="submit" class="btn">Guardar Cambios</button>
        </form>

        <h3 class="mt-4">Cambiar Contraseña</h3>
        <form action="<?= base_url('perfil/cambiar_contrasena'); ?>" method="POST">
            <div class="form-group">
                <label for="current_password">Contraseña Actual:</label>
                <input type="password" id="current_password" name="current_password" required>
            </div>
            <div class="form-group">
                <label for="new_password">Nueva Contraseña:</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirmar Nueva Contraseña:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>

            <button type="submit" class="btn btn-danger">Cambiar Contraseña</button>
        </form>
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
                <li class="ftco-animate"><a href="#"><span class="icon-google"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Quick Links</h2>
              <ul class="list-unstyled">
                <li><a href="<?= base_url('/'); ?>" class="py-2 d-block">Home</a></li>
                <li><a href="<?= base_url('menu'); ?>" class="py-2 d-block">Menu</a></li>
                <li><a href="<?= base_url('services'); ?>" class="py-2 d-block">Services</a></li>
                <li><a href="<?= base_url('pedidos'); ?>" class="py-2 d-block">Pedidos</a></li>
                <li><a href="<?= base_url('about'); ?>" class="py-2 d-block">About Us</a></li>
                <li><a href="<?= base_url('contact'); ?>" class="py-2 d-block">Contact</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
</footer>
</body>
</html>
