<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">

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
            background-color: #2c3e50;
            color: #ecf0f1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }
        .container {
            max-width: 400px;
            width: 100%;
        }
        .card {
            background-color: #343a40;
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-header {
            background-color: #ffc107;
            color: #fff;
            padding: 20px;
            text-align: center;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            font-weight: bold;
            letter-spacing: 1px;
            font-size: 1.2em;
        }
        .btn-primary {
            background-color: #ffc107;
            border: none;
            padding: 12px;
            font-size: 16px;
            transition: background-color 0.3s;
            border-radius: 25px;
            color: #343a40;
        }
        .btn-primary:hover {
            background-color: #343a40;
            color: #ffc107;
        }
        .flaticon {
            font-size: 60px;
            color: #ffc107;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-control {
            border-radius: 25px;
            border: 1px solid #ffc107;
            background-color: #fff;
            color: #343a40;
            padding: 10px 15px;
            transition: border-color 0.3s;
        }
        .form-control:focus {
            border-color: #ffc107;
            box-shadow: 0 0 5px rgba(255, 193, 7, 0.5);
        }
        .text-center {
            text-align: center;
        }
        .forgot-password {
            margin-top: 10px;
            text-align: center;
            color: #fff;
        }
        .forgot-password a {
            color: #ffc107;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }
        .forgot-password a.iniciar-sesion {
            background-color: transparent;
            border: 1px solid #ffc107;
        }
        .forgot-password a.iniciar-sesion:hover {
            background-color: #ffc107;
            color: #343a40;
        }
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h2 class="text-center">
            <span class="flaticon-pizza-1 mr-1"></span>Pizza Nostra<br>
        </h2>
        
        <div class="card mb-4">
            <div class="card-header">
                Iniciar sesión
            </div>
            <div class="card-body">
                
                <?php if(session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger text-center">
                        <?= session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>


                
                <form method="POST" action="<?= base_url('login/authenticate'); ?>">
                   
                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input type="text" class="form-control" id="correo" name="correo" placeholder="Introduce tu correo" required>
                    </div>
                   
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="contrasena" placeholder="Introduce tu contraseña" required>
                    </div>
                 
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                    </div>
                </form>
            
                <div class="forgot-password">
                    <br>
                    <a href="<?= base_url('olvidoContrasena'); ?>">¿Olvidaste tu contraseña?</a>
                </div>
                <div class="forgot-password">
                    <a href="<?= base_url('signup'); ?>">¿No tienes cuenta? Créala</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
