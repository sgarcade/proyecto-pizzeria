<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Pedidos</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #e0a800;
            color: white;
            font-weight: 600;
            text-transform: uppercase;
        }

        td {
            background-color: #f9f9f9;
            color: #333;
            font-size: 16px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .header-title {
            text-align: center;
            margin: 20px 0;
            font-size: 2em;
            color: #e0a800;
        }

        .table-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .role-column {
            font-weight: bold;
            color: #e0a800;
        }

        .btn {
            background-color: #e0a800;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #e0a800;
        }
    </style>
</head>
<body>
<?php include("includes/header.php") ?>

    <div class="table-container">
        <h1 class="header-title">Lista de Empleados</h1>

        <?php if (isset($error)): ?>
            <p style="color: red;"><?= esc($error); ?></p>
        <?php endif; ?>

        <!-- Tabla unificada de empleados -->
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol</th>
                </tr>
            </thead>
            <tbody>
                <!-- Mostrar chefs -->
                <?php foreach ($chefs as $chef): ?>
                    <tr>
                        <td><?= esc($chef['nombre']); ?></td>
                        <td><?= esc($chef['correo']); ?></td>
                        <td class="role-column">Chef</td>
                    </tr>
                <?php endforeach; ?>

                <!-- Mostrar domiciliarios -->
                <?php foreach ($domiciliarios as $domiciliario): ?>
                    <tr>
                        <td><?= esc($domiciliario['nombre']); ?></td>
                        <td><?= esc($domiciliario['correo']); ?></td>
                        <td class="role-column">Domiciliario</td>
                    </tr>
                <?php endforeach; ?>

                <!-- Mostrar recepcionistas -->
                <?php foreach ($recepcionistas as $recepcionista): ?>
                    <tr>
                        <td><?= esc($recepcionista['nombre']); ?></td>
                        <td><?= esc($recepcionista['correo']); ?></td>
                        <td class="role-column">Recepcionista</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- <div class="text-center">
            <button class="btn" onclick="window.location.href='pagina_anterior.php'">Volver</button>
        </div> -->
    </div>

</body>
</html>
