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
        
        .cards-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .card-main {
            background-color: #343a40;
            color: #fff;
            border-radius: 10px;
            padding: 20px;
            width: 100%;
            margin-bottom: 30px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);            
        }

        .card-main h2 {
            color: #e0a800;  /* Color de fondo del filtro */
            font-size: 1.8em;
            margin-bottom: 15px;
        }

        .card {
            background-color: #fff;
            color: #343a40;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            width: 100%;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .card h3 {
            font-size: 1.3em;
            margin-bottom: 10px;
            color: #343a40;
        }

        .card p {
            font-size: 1em;
            margin: 5px 0;
            color: #6c757d;
        }

        .card strong {
            font-weight: bold;
        }

        .btn-card {
          background-color: red;
          color: #fff;
          border: none;
          padding: 10px 20px;
          border-radius: 5px;
          cursor: pointer;
          transition: background-color 0.3s ease, transform 0.2s ease;
          margin-left: auto;  
          display: block; 
      }

      .btn-card:hover {
          background-color: lightcoral;
          transform: translateY(-2px);
      }


        .filter-container {
            margin-bottom: 20px;
            background-color: #e0a800; 
            padding: 15px;
            border-radius: 10px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .filter-container select {
            padding: 10px;
            margin-left: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
        }

        .filter-container label {
            font-size: 18px;
            font-weight: bold;
            color: #fff;
        }

        .fade-out {
            opacity: 0;
            transition: opacity 1s ease-out;
        }


        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            margin-top: 20px;
        }

        .card {
            width: 100%;
            max-width: 380px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin: 10px;
            padding: 20px;
            border: 1px solid #ddd;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            font-weight: 600;
            font-size: 1.3em;
            border-radius: 8px 8px 0 0;
        }

        .card-body {
            padding: 15px;
            font-size: 0.95em;
        }

        .pedido-header {
            font-size: 1.1em;
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
        }

        .pedido-details {
            margin-top: 10px;
            color: #6c757d;
            line-height: 1.6;
        }

        .pedido-details p {
            margin: 5px 0;
        }

        .pedido-actions {
            margin-top: 20px;
            text-align: center;
        }

        .btn-cancelar {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 1.1em;
        }

        .btn-cancelar:hover {
            background-color: #d32f2f;
        }

        .label {
            font-size: 0.9em;
            padding: 6px 12px;
            border-radius: 15px;
        }

        .label-warning {
            background-color: #ff9800;
            color: white;
        }

        .label-info {
            background-color: #2196f3;
            color: white;
        }

        .pedido-productos {
            margin-top: 20px;
            padding-left: 15px;
        }

        .pedido-productos p {
            font-size: 1em;
            margin: 8px 0;
        }

        .pedido-productos strong {
            font-weight: 600;
        }

        .total-acumulado {
            font-size: 1.2em;
            font-weight: 700;
            color: #333;
            margin-top: 15px;
        }

        

    /* Estilo para los botones */
    .btn-primary {
        background-color: #e0a800;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 1em;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #e0a800;
    }

    /* Estilo para los contenedores de los formularios */
    .pedido-actions {
        margin-top: 20px;
        text-align: center;
    }
        .btn-primary {
            background-color: #e0a800;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1em;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #e0a800;
        }
        label {
            font-size: 1.1em;
            color: #343a40;
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        /* Estilo para el select */
        select {
            width: 100%;
            padding: 12px 15px;
            font-size: 1em;
            color: #343a40; /* Texto negro */
            background-color: #f9f9f9; /* Fondo claro */
            border-radius: 8px;
            border: 1px solid #ccc;
            outline: none;
            transition: all 0.3s ease;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        /* Efectos al interactuar */
        select:focus {
            border-color: #e0a800; /* Color azul al tener foco */
            box-shadow: 0 0 8px rgba(185, 150, 2, 0.5); /* Sombra suave */
            background-color: #fff;
        }

        /* Estilo para hover */
        select:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }
        option{
            color: #333;
        }
        select:selected{
            color: #333;
        }
    

    </style>

</head>
<body>
<?php include("includes/header.php")?>

    <h1 class="text-center mb-4">Entrega de Pedidos - Domiciliario</h1>

    <?php if (session()->getFlashdata('message')): ?>
        <p class="alert alert-success"><?= session()->getFlashdata('message') ?></p>
    <?php elseif (session()->getFlashdata('error')): ?>
        <p class="alert alert-danger"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>

    <?php 

        $pedidosAgrupados = [];
        foreach ($pedidos as $pedido) {
            $pedidosAgrupados[$pedido['id_pedido']][] = $pedido;
        }
    ?>

    <div class="card-container">
        <?php foreach ($pedidosAgrupados as $idPedido => $grupoPedidos): ?>
            <div class="card">
                <div class="card-header">
                    <strong>ID Pedido: <?= $idPedido ?></strong>
                </div>
                <div class="card-body">

                    <div class="pedido-header">
                        <strong>Cliente:</strong> <?= $grupoPedidos[0]['nombre_cliente'] ?>
                    </div>

                    <div class="pedido-details">
                        <p><strong>Estado:</strong> 
                            <span class="label <?= $grupoPedidos[0]['estado'] === 'En camino' ? 'label-warning' : 'label-info' ?>">
                                <?= $grupoPedidos[0]['estado'] ?>
                            </span>
                        </p>
                        <p><strong>Fecha:</strong> <?= $grupoPedidos[0]['fecha'] ?></p>
                    </div>

                    <div class="pedido-productos">
                        <?php 
                            $totalPedido = 0;
                            foreach ($grupoPedidos as $pedido):
                                $totalPedido += $pedido['total'];
                        ?>
                            <p><strong>Producto:</strong> <?= $pedido['nombre_producto'] ?></p>
                            <p><strong>Cantidad:</strong> <?= $pedido['cantidad'] ?></p>
                        <?php endforeach; ?>
                    </div>

                    <div class="total-acumulado">
                        <strong>Total del Pedido:</strong> $<?= number_format($totalPedido, 2) ?>
                    </div>

                    <div class="pedido-actions">
                        <?php if ($grupoPedidos[0]['estado'] === 'En camino'): ?>
                            <form action="<?= base_url('entregarPedidos/pedido/entregarPedido/' . $grupoPedidos[0]['id_pedido']) ?>" method="post">
                                <button type="submit" class="btn btn-primary mt-3">Pedido Entregado</button>
                            </form>                              
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    

</body>
</html>