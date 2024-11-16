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
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9em;
            font-weight: 500;
            text-transform: uppercase;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-right: 10px; /* Add margin between buttons */
        }

        .btn-view {
            background-color: #007bff; /* Blue for view */
            color: #fff;
        }

        .btn-view:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        .btn-edit {
            background-color: #28a745; /* Green for edit */
            color: #fff;
        }

        .btn-edit:hover {
            background-color: #218838; /* Darker green on hover */
        }

        .btn-delete {
            background-color: #dc3545; /* Red for delete */
            color: #fff;
        }

        .btn-delete:hover {
            background-color: #c82333; /* Darker red on hover */
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

        .actions-btn-container {
            display: flex;
            justify-content: flex-start; /* Align buttons horizontally */
            gap: 10px; /* Add spacing between buttons */
        }
    </style>

</head>
<body>
<?php include("includes/header.php")?>

<div class="container mt-5">
    <h2>Lista de Productos</h2>
    <table class="table table-striped">
        <thead class="table-header">
            <tr>
                <th>ID Producto</th>
                <th>Nombre Producto</th>
                <th>Descripción</th>
                <th>Sabor</th>
                <th>Precio Base</th>
                <th>Stock</th>
                <th>ID Tamaño</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?= $producto['id_producto'] ?></td>
                    <td><?= $producto['nombre_producto'] ?></td>
                    <td><?= $producto['descripcion'] ?></td>
                    <td><?= $producto['sabor'] ?></td>
                    <td><?= $producto['precio_base'] ?></td>
                    <td><?= $producto['stock'] ?></td>
                    <td><?= $producto['id_tamaño'] ?></td>
                    <td>
                        <div class="actions-btn-container">
                            <button class="btn btn-view" onclick="viewProduct(<?= $producto['id_producto'] ?>)">Ver</button>
                            <button class="btn btn-edit" onclick="editProduct(<?= $producto['id_producto'] ?>)">Editar</button>
                            <button class="btn btn-delete" onclick="deleteProduct(<?= $producto['id_producto'] ?>)">Eliminar</button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
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
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
                    <ul class="ftco-footer-social list-unstyled mt-4">
                        <li><a href="#" class="p-2"><span class="icon-twitter"></span></a></li>
                        <li><a href="#" class="p-2"><span class="icon-facebook"></span></a></li>
                        <li><a href="#" class="p-2"><span class="icon-instagram"></span></a></li>
                        <li><a href="#" class="p-2"><span class="icon-youtube"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
