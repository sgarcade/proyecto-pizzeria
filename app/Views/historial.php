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

    <!-- Bootstrap & CSS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>">
    <style>
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 30px;
            margin-bottom: 30px;
        }

        h1 {
            ccolor: #e0a800;
            font-weight: bold;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.2);
        }

        /* Table Styles */
        .table {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .table th {
            background-color: #343a40;
            color: #fff;
            text-align: center;
        }

        .table td {
            text-align: center;
        }

        /* Filter Styles */
        .filter-container {
            margin-bottom: 20px;
            background-color: #ffc107;
            padding: 15px;
            border-radius: 10px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .filter-container select {
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
        }

        .filter-container label {
            font-size: 18px;
            font-weight: bold;
            color: #343a40;
        }

        /* Footer */
        footer {
            background-color: #343a40;
            color: #fff;
            padding: 30px 0;
            text-align: center;
        }

        footer a {
            color: #ffc107;
            text-decoration: none;
        }

        footer a:hover {
            color: #ffcd39;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <?php include("includes/header.php") ?>

    <!-- Main Content -->
    <div class="container">
        <h1 class="text-center mb-4">Historial de Ventas</h1>

        <div class="filter-container">
            <label for="filterEstado">Filtrar por Estado:</label>
            <select id="filterEstado">
                <option value="">Todos</option>
                <option value="pendiente">Pendiente</option>
                <option value="completado">Completado</option>
                <option value="cancelado">Cancelado</option>
            </select>
        </div>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID Reporte</th>
                    <th>ID Pedido Detalle</th>
                    <th>Fecha</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($reporteVentas)) : ?>
                    <?php foreach ($reporteVentas as $reporte) : ?>
                        <tr>
                            <td><?= htmlspecialchars($reporte['id_reporte']) ?></td>
                            <td><?= htmlspecialchars($reporte['id_pedido_detalle']) ?></td>
                            <td><?= htmlspecialchars($reporte['fecha']) ?></td>
                            <td><?= htmlspecialchars($reporte['cantidad']) ?></td>
                            <td>$<?= number_format($reporte['precio_unitario'], 2) ?></td>
                            <td>$<?= number_format($reporte['total'], 2) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6" class="text-center">No hay datos disponibles</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
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
            const pedidoCards = document.querySelectorAll('.table tbody tr');

            pedidoCards.forEach(row => {
                const estadoPedido = row.getAttribute('data-estado');
                if (estadoFiltro === '' || estadoPedido === estadoFiltro) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        function cancelarPedido(idPedido) {
            if (confirm('¿Estás seguro de que deseas cancelar este pedido?')) {
                fetch(`/misPedidos/cancelarPedido/${idPedido}`, {
                        method: 'POST'
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            alert(data.message);
                            window.location.reload();
                        } else {
                            alert(data.message || 'Error al cancelar el pedido');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error al realizar la solicitud');
                    });
            }
        }
    </script>
</body>

</html>
