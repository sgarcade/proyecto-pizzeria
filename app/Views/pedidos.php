<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Pedidos</title>

    <!-- Google Fonts -->
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

    </style>
</head>
<body>
<?php include("includes/header.php") ?>

<div class="container2">
    <h1 style="color: #e0a800; text-align: center;">Mis Pedidos</h1>

    <!-- Filtros -->
    <div class="filter-container">
        <label for="filterEstado">Filtrar por estado:</label>
        <select id="filterEstado">
            <option value="">Todos</option>
            <option value="Pendiente">Pendiente</option>
            <option value="Enviado">Enviado</option>
            <option value="Cancelado">Cancelado</option>
        </select>
    </div>

    <?php if (!empty($pedidos)): ?>
        <?php 
        $pedidosAgrupados = []; 
        foreach ($pedidos as $pedido): 
            $pedidosAgrupados[$pedido['id_pedido']][] = $pedido; 
        endforeach;
        ?>

        <!-- Cards agrupados por ID de Pedido -->
        <div class="cards-container" id="pedidoCards">
            <?php foreach ($pedidosAgrupados as $id_pedido => $pedidoGroup): ?>
                <div class="card-main" data-id="<?= $id_pedido ?>" data-estado="<?= htmlspecialchars($pedidoGroup[0]['estado']) ?>">
                    <h2>Pedido ID: <?= htmlspecialchars($id_pedido) ?></h2>
                    <?php foreach ($pedidoGroup as $pedido): ?>
                        <div class="card" data-estado="<?= htmlspecialchars($pedido['estado']) ?>">
                            <p><strong>Estado:</strong> <?= htmlspecialchars($pedido['estado']) ?></p>
                            <p><strong>Fecha:</strong> <?= htmlspecialchars($pedido['fecha']) ?></p>
                            <p><strong>Total:</strong> $<?= number_format($pedido['total'], 2) ?></p>
                            <p><strong>Método de Pago:</strong> <?= htmlspecialchars($pedido['metodo_pago']) ?></p>
                            <p><strong>Producto:</strong> <?= htmlspecialchars($pedido['nombre_producto']) ?></p>
                            <p><strong>Cantidad:</strong> <?= htmlspecialchars($pedido['cantidad']) ?></p>
                            <p><strong>Precio Unitario:</strong> $<?= number_format($pedido['precio_unitario'], 2) ?></p>
                        </div>
                    <?php endforeach; ?>

                    <!-- Botón de cancelar al final de cada pedido -->
                    <?php if ($pedidoGroup[0]['estado'] == 'Pendiente'): ?>
                      <button class="btn btn-danger btn-card" onclick="cancelarPedido(<?= $id_pedido ?>)">Cancelar Pedido</button>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>


    <?php else: ?>
        <p>No tienes pedidos disponibles.</p>
    <?php endif; ?>
</div>

<script>
    // Filtrar pedidos por estado
    document.getElementById('filterEstado').addEventListener('change', function() {
        const estadoFiltro = this.value;
        const pedidoCards = document.querySelectorAll('.card-main');

        pedidoCards.forEach(card => {
            const estadoPedido = card.getAttribute('data-estado');
            if (estadoFiltro === '' || estadoPedido === estadoFiltro) {
                card.style.display = 'block'; // Mostrar el card si el estado coincide o no hay filtro
            } else {
                card.style.display = 'none'; // Ocultar el card si no coincide el estado
            }
        });
    });

    function cancelarPedido(idPedido) {
        if (confirm('¿Estás seguro de que deseas cancelar este pedido?')) {
            // Seleccionamos el botón de cancelación
            const botonCancelar = document.querySelector(`.card-main[data-id="${idPedido}"] .btn-card`);

            // Aplicamos la clase para animar la sacudida
            botonCancelar.classList.add('animate__animated', 'animate__shakeX');

            // Esperamos a que termine la animación para redirigir
            botonCancelar.addEventListener('animationend', () => {
                // Hacer la solicitud AJAX para cancelar el pedido
                fetch(`/misPedidos/cancelarPedido/${idPedido}`, {
                    method: 'POST'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        alert(data.message); // Muestra el mensaje de éxito
                        // Recargar la página para reflejar los cambios
                        window.location.reload();
                    } else {
                        alert(data.message || 'Error al cancelar el pedido');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error al realizar la solicitud');
                });
            });
        }
    }


</script>
</body>
</html>
