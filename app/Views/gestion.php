<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos - Pizza Nostra</title>

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

        .product-card {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .product-card h3 {
            font-size: 1.8em;
            margin-bottom: 20px;
            color: #343a40;
        }

        .product-card .form-group {
            margin-bottom: 20px;
        }

        .product-card label {
            font-weight: 500;
            color: #343a40;
        }

        .product-card input, .product-card select, .product-card textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #fff;
        }

        .product-card input:focus, .product-card select:focus, .product-card textarea:focus {
            border-color: #ffc107;
        }

        .product-card button {
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

        .product-card button:hover {
            background-color: #e0a800;
        }

        .table {
            width: 100%;
            margin-top: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .table th, .table td {
            padding: 12px 15px;
            text-align: center;
        }

        .table th {
            background-color: #343a40;
            color: #fff;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
            color: #fff;
            padding: 8px 16px;
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
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light">
		<div class="container">
			<a class="navbar-brand" href="<?= base_url('/'); ?>"><span class="flaticon-pizza-1 mr-1"></span>Pizza<br><small>Delicious</small></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Pedidos
			</button>
			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a href="<?= base_url('/'); ?>" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="<?= base_url('menu'); ?>" class="nav-link">Menu</a></li>
					<li class="nav-item"><a href="<?= base_url('services'); ?>" class="nav-link">Services</a></li>
                    <li class="nav-item"><a href="<?= base_url('pedidos'); ?>" class="nav-link">Pedidos</a></li>
					<li class="nav-item"><a href="<?= base_url('blog'); ?>" class="nav-link">Blog</a></li>
					<li class="nav-item"><a href="<?= base_url('about'); ?>" class="nav-link">About Us</a></li>
					<li class="nav-item"><a href="<?= base_url('contact'); ?>" class="nav-link">Contact</a></li>
					<li class="nav-item active"><a href="<?= base_url('login'); ?>" class="nav-link">Login</a></li>
          <li class="nav-item"><a href="<?= base_url('gestion'); ?>" class="nav-link">Gestion de productos</a></li>
				</ul>
			</div>
		</div>
	</nav>

<div class="container mt-5">
    <h2>Gestión de Productos</h2>
    
    <!-- Formulario para agregar o editar productos -->
    <div class="product-card">
        <h3>Agregar Nuevo Producto</h3>
        <form action="<?= base_url('productos/guardar'); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombre_producto">Nombre del Producto:</label>
                <input type="text" id="nombre_producto" name="nombre_producto" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="precio">Precio (USD):</label>
                <input type="number" id="precio" name="precio" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoría:</label>
                <select id="categoria" name="categoria" required>
                    <option value="Pizza">Pizza</option>
                    <option value="Bebidas">Bebidas</option>
                    <option value="Postres">Postres</option>
                </select>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen del Producto:</label>
                <input type="file" id="imagen" name="imagen" required>
            </div>

            <button type="submit">Guardar Producto</button>
        </form>
    </div>

    <!-- Tabla de productos -->
    <h3 class="mt-5">Productos Existentes</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- Ejemplo de fila de producto -->
            <tr>
                <td><img src="path_to_image.jpg" alt="Producto" width="100"></td>
                <td>Pizza Margherita</td>
                <td>Pizza clásica con tomate, mozzarella y albahaca.</td>
                <td>$12.99</td>
                <td>Pizza</td>
                <td>
                    <a href="<?= base_url('productos/editar/1'); ?>" class="btn btn-warning">Editar</a>
                    <button class="btn-danger">Eliminar</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<footer class="ftco-footer ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Contact Us</h2>
                    <ul class="list-unstyled">
                        <li><a href="tel://123456789" class="py-2 d-block">+1 234 567 89</a></li>
                        <li><a href="mailto:info@example.com" class="py-2 d-block">info@example.com</a></li>
                        <li><a href="#" class="py-2 d-block">1234 Example St.</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Follow Us</h2>
                    <ul class="ftco-footer-social list-unstyled">
                        <li><a href="#"><span class="icon-twitter"></span></a></li>
                        <li><a href="#"><span class="icon-facebook"></span></a></li>
                        <li><a href="#"><span class="icon-google"></span></a></li>
                        <li><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
