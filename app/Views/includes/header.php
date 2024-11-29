<style>
.navbar {
    padding-left: 350px; /* Elimina el padding por defecto a la izquierda */
    padding-right: 350px; /* Elimina el padding por defecto a la derecha */
}

.navbar-nav {
    display: flex;
    flex-wrap: nowrap;
    justify-content: flex-start; /* Alinea todo a la izquierda */
    width: 100%;
    padding-left: 120px; /* Elimina el padding */
    margin-left: 0; /* Elimina el margen */
}

/* Estilo para los items del navbar */
.nav-item {
    flex: none; /* Evita que los elementos se distribuyan de manera equitativa */
    text-align: center;
}

/* Asegurar que el contenido dentro de .bienvenido esté alineado correctamente */


/* Aseguramos que los elementos li ocupen todo el ancho disponible */
.nav-item {
    flex: 1; /* Hace que cada li ocupe todo el ancho disponible */
    text-align: center; /* Centra el texto dentro de cada li */
}

/* Estilo de los enlaces para evitar que el texto se divida en varias líneas */
.nav-link {
    display: block; /* Hace que el enlace ocupe todo el bloque */
    text-transform: uppercase; /* Opcional: convierte el texto a mayúsculas */
    padding: 10px; /* Ajuste de espacio interno */
    white-space: nowrap; /* Evita que el texto se divida en varias líneas */
    color: #fff; /* Color de texto */
    font-weight: 500; /* Peso de la fuente */
}

/* Asegura que los elementos se comporten bien en pantallas pequeñas */
@media (max-width: 991px) {
    .navbar-nav {
        flex-direction: column; /* Cambia la dirección a columna en pantallas pequeñas */
        align-items: flex-start; /* Alinea los elementos al principio */
    }

    .nav-item {
        flex: none; /* Evita que los elementos se distribuyan de manera equitativa en pantallas pequeñas */
        margin-bottom: 10px; /* Añade espacio entre los elementos */
    }
}
.bienvenido {
    color: #ffcc00;
    font-size: 13px;
    font-weight: 600;
    padding: 10px 20px;
    background-color: none; /* Fondo oscuro */
 /* Fondo oscuro translúcido */
    border-radius: 5px;
    position: relative; /* Posicionamos el div de bienvenida */
    top: 41px; /* Centrado vertical */
    left: -120px;
    right: 0; /* Lo estiramos a lo largo de la barra */
    transform: translateY(-50%); /* Ajuste para centrar verticalmente */
    text-align: center; /* Centra el texto dentro del div */
    white-space: nowrap; /* Evita que el texto se divida en varias líneas */
}
</style>
<!-- Agregar Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light">
    <div class="container">
        <?php 
        use App\Models\DomiciliarioModel;
        use App\Models\ChefModel;
            $rol = intval(session()->get('usuario')['id_rol']); 
            $id_usuario = session()->get('usuario')['id_usuario']; 
            $nombre = session()->get('usuario')['nombre'];  
            $domiciliarioModel = new DomiciliarioModel();
            $domiciliario = $domiciliarioModel->getDomiciliarioByUserId($id_usuario);
            $id_domiciliario = $domiciliario ? $domiciliario['id_domiciliario'] : null;           
            $chefModel = new ChefModel();
            $chef = $chefModel->getChefByUserId($id_usuario);
            $id_chef = $chef ? $chef['id_chef'] : null;           
        ?>
        
        <div class="bienvenido">
            <p>Bienvenid@ <?php echo $nombre; ?></p>
        </div>
        <a class="navbar-brand" href="<?= base_url('/'); ?>"><span class="flaticon-pizza-1 mr-1"></span>Pizza<br><small>Delicious</small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Blog Single
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                

                

                <?php if ($rol === 1): ?>
                    <li class="nav-item"><a href="<?= base_url('shopcar'); ?>" class="nav-link">Carrito de compra</a></li>
                    <li class="nav-item"><a href="<?= base_url('searchproducts'); ?>" class="nav-link">Búsqueda de producto</a></li>
                    <li class="nav-item"><a href="<?= base_url('misPedidos/' . $id_usuario); ?>" class="nav-link">Mis Pedidos</a></li>
                <?php endif; ?>

                <?php if ($rol === 2): ?>
                    <li class="nav-item"><a href="<?= base_url('gestion'); ?>" class="nav-link">Gestión de productos</a></li>
                    <li class="nav-item"><a href="<?= base_url('empleados/lista'); ?>" class="nav-link">Empleados</a></li>
                <?php endif; ?>

                <?php if ($rol === 3): ?>
                    <li class="nav-item"><a href="<?= base_url('recepcionPedidos'); ?>" class="nav-link">Recepción de pedidos</a></li>                    
                <?php endif; ?>

                <?php if ($rol === 4): ?>
                    <li class="nav-item"><a href="<?= base_url('preparacionPedidos/' . $id_chef); ?>" class="nav-link">Preparación de ordenes</a></li>
                <?php endif; ?>

                <?php if ($rol === 5): ?>
                    <li class="nav-item"><a href="<?= base_url('entregarPedidos/' . $id_domiciliario); ?>" class="nav-link">Entrega de pedidos</a></li>
                <?php endif; ?>
                <li class="nav-item"><a href="<?= base_url('perfil'); ?>" class="nav-link">Perfil</a></li>
                <li class="nav-item"><a href="<?= base_url('logout'); ?>" class="nav-link"><i class="fas fa-sign-out-alt"></i></a> </li>
            </ul>
        </div>
    </div>
</nav>
