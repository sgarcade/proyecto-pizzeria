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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery (necesario para Bootstrap JS) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap JS (con dependencias de Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

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
    /* Estilo para el cuerpo */
    body {
        font-family: Poppins, sans-serif;
        background-color: #f8f9fa;
        color: white;
    }

    /* Títulos */
    h1 {
        color: #ffc107;
        text-align: center;
        margin-bottom: 30px;
    }

    /* Estilo para la tabla */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        border-radius: 15px; /* Bordes redondeados */
        overflow: hidden; /* Para que los bordes redondeados se vean correctamente */
    }

    table th, table td {
        padding: 15px;
        text-align: left;
        border: 1px solid #ffc107;
        color: white; /* Texto blanco */
    }

    table th {
        background-color: #ffc107;
        color: white;
    }

    table tr {
        background-color: transparent; /* Sin fondo en las filas */
    }


    /* Estilo para botones */
    .btn {
        border-radius: 5px;
        font-size: 14px;
    }


    .btn-info {
        background-color: #17a2b8;
        color: white;
    }

    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
        color: white;
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }

    /* Estilos para modales */
    .modal-content {
        background-color: #ffffff;
        border-radius: 5px;
        padding: 20px;
    }

    .modal-header {
        background-color: #ffc107;
        color: white;
        border-bottom: 2px solid #ddd;
    }

    .modal-title {
        font-size: 20px;
        font-weight: bold;
    }

    .modal-body {
        font-size: 16px;
        color: #555;
    }

    .modal-footer {
        text-align: center;
    }

    /* Estilo para campos de entrada */
    .form-control {
        border-radius: 5px;
        border: 1px solid #ddd;
        padding: 10px;
        font-size: 16px;
    }

    .form-control:focus {
        border-color: #ffc107;
        box-shadow: 0 0 5px rgba(255, 193, 7, 0.5);
    }

    .form-group {
        margin-bottom: 20px;
    }

    /* Estilos para el modal de eliminar */
    .modal-header .close {
        color: white;
        font-size: 1.5rem;
    }

    .modal-body p {
        font-size: 16px;
        color:black;
    }

    /* Estilo para los botones del modal */
    .btn-secondary {
        background-color: #6c757d;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    /* Estilo para el botón de agregar producto */
    .btn-primary {
        background-color: #ffc107;
        border-color: #ffc107;
        color: white;
        font-size: 16px;
        padding: 12px 20px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .btn-primary i {
        margin-right: 8px; /* Espacio entre el ícono y el texto */
    }

    .btn-primary:hover {
        background-color: #ffc107;
        border-color: #e0a800;
    }

    .btn-primary:focus {
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
    }

    
    /* Hover en los botones de acción en la tabla */
    .btn-info:hover, .btn-warning:hover, .btn-danger:hover {
        background-color: #e0a800;
        border-color: #e0a800;
    }
    

</style>



</head>
<body>
<?php include("includes/header.php")?>

<div class="container mt-5">
<h1>Gestión de Productos</h1>

<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalAgregarProducto">
    <i class="fas fa-plus"></i> Agregar Producto
</button>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?= $producto['id_producto'] ?></td>
                <td><?= $producto['nombre_producto'] ?></td>
                <td><?= $producto['descripcion'] ?></td>
                <td><?= $producto['precio_base'] ?></td>
                <td><?= $producto['stock'] ?></td>
                <td>
                    <button class="btn btn-info" onclick="verProducto(<?= $producto['id_producto'] ?>)">Ver</button>
                    <button class="btn btn-warning" onclick="editarProducto(<?= $producto['id_producto'] ?>)">Editar</button>
                    <button class="btn btn-danger" onclick="eliminarProducto(<?= $producto['id_producto'] ?>)">Eliminar</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Modal para agregar producto -->
<div class="modal fade" id="modalAgregarProducto" tabindex="-1" role="dialog" aria-labelledby="modalAgregarProductoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarProductoLabel">Agregar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAgregarProducto">
                    <div class="form-group">
                        <label for="nombre_producto">Nombre:</label>
                        <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="precio_base">Precio:</label>
                        <input type="number" class="form-control" id="precio_base" name="precio_base" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock:</label>
                        <input type="number" class="form-control" id="stock" name="stock" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Producto</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal para editar producto -->
<div class="modal fade" id="modalEditarProducto" tabindex="-1" role="dialog" aria-labelledby="modalEditarProductoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarProductoLabel">Editar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEditarProducto">
                    <input type="hidden" id="id_producto_editar" name="id_producto">
                    <div class="form-group">
                        <label for="nombre_producto_editar">Nombre:</label>
                        <input type="text" class="form-control" id="nombre_producto_editar" name="nombre_producto" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion_editar">Descripción:</label>
                        <textarea class="form-control" id="descripcion_editar" name="descripcion" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="precio_base_editar">Precio:</label>
                        <input type="number" class="form-control" id="precio_base_editar" name="precio_base" required>
                    </div>
                    <div class="form-group">
                        <label for="stock_editar">Stock:</label>
                        <input type="number" class="form-control" id="stock_editar" name="stock" required>
                    </div>
                    <button type="submit" class="btn btn-warning">Actualizar Producto</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal para confirmar eliminación -->
<div class="modal fade" id="modalEliminarProducto" tabindex="-1" role="dialog" aria-labelledby="modalEliminarProductoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEliminarProductoLabel">Eliminar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas eliminar este producto?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="confirmarEliminar">Eliminar</button>
            </div>
        </div>
    </div>
</div>

<script src="path/to/jquery.min.js"></script>
<script src="path/to/bootstrap.bundle.min.js"></script>
<script>
    // Función para ver detalles del producto en el modal
    function verProducto(id_producto) {
        $.ajax({
            url: '<?= site_url('gestion/verProducto') ?>/' + id_producto,
            type: 'GET',
            success: function(data) {
                const producto = JSON.parse(data);
                alert('Producto: ' + producto.nombre_producto + '\nDescripción: ' + producto.descripcion);
            }
        });
    }

    // Función para editar producto
    function editarProducto(id_producto) {
        $.ajax({
            url: '<?= site_url('gestion/verProducto') ?>/' + id_producto,
            type: 'GET',
            success: function(data) {
                const producto = JSON.parse(data);
                $('#id_producto_editar').val(producto.id_producto);
                $('#nombre_producto_editar').val(producto.nombre_producto);
                $('#descripcion_editar').val(producto.descripcion);
                $('#precio_base_editar').val(producto.precio_base);
                $('#stock_editar').val(producto.stock);
                $('#modalEditarProducto').modal('show');
            }
        });
    }

    // Enviar formulario de edición
    $('#formEditarProducto').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: '<?= site_url('gestion/editarProducto') ?>',
            type: 'POST',
            data: $(this).serialize(),
            success: function() {
                location.reload(); // Recargar la página después de editar
            }
        });
    });

    // Eliminar producto
    function eliminarProducto(id_producto) {
        $('#modalEliminarProducto').modal('show');

        $('#confirmarEliminar').click(function() {
            $.ajax({
                url: '<?= site_url('gestion/eliminarProducto') ?>/' + id_producto,
                type: 'POST',
                success: function() {
                    location.reload(); // Recargar la página después de eliminar
                }
            });
        });
    }
</script>
</body>
</html>