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
            <option value="En Preparación">En Preparación</option>
            <option value="A la espera de un Domiciliario">A la espera de un Domiciliario</option>
            <option value="En camino">En camino</option>
            <option value="Entregado">Entregado</option>
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
