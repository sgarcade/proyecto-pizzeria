<style>
	.navbar-nav {
    display: flex;
    flex-wrap: nowrap; /* Evita que los elementos se desborden a una nueva línea */
    justify-content: flex-start; /* Alinea todos los elementos a la izquierda */
    width: 100%; /* Hace que la lista ocupe todo el espacio horizontal disponible */
    padding-left: 0; /* Elimina el padding predeterminado */
    margin-left: 0; /* Elimina el margen predeterminado */
}

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
</style>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light">
		<div class="container">
			<a class="navbar-brand" href="<?= base_url('/'); ?>"><span class="flaticon-pizza-1 mr-1"></span>Pizza<br><small>Delicious</small></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Blog Single
			</button>
		<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<!--<li class="nav-item active"><a href="<?= base_url('/'); ?>" class="nav-link">Inicio</a></li>
					<li class="nav-item"><a href="<?= base_url('menu'); ?>" class="nav-link">Menu</a></li>
					<li class="nav-item"><a href="<?= base_url('services'); ?>" class="nav-link">Servicios</a></li>                    					
					<li class="nav-item"><a href="<?= base_url('blog'); ?>" class="nav-link">Blog</a></li>
					<li class="nav-item"><a href="<?= base_url('about'); ?>" class="nav-link">Sobre Nosotros</a></li>
					<li class="nav-item"><a href="<?= base_url('contact'); ?>" class="nav-link">Contactanos</a></li>
					<li class="nav-item"><a href="<?= base_url('perfil'); ?>" class="nav-link">Perfil</a></li>-->                    
					<li class="nav-item"><a href="<?= base_url('gestion'); ?>" class="nav-link">Gestion de productos</a></li>
					<li class="nav-item"><a href="<?= base_url('shopcar'); ?>" class="nav-link">Carrito de compra</a></li>
					<li class="nav-item"><a href="<?= base_url('searchproducts'); ?>" class="nav-link">Búsqueda de producto</a></li>
                    <li class="nav-item"><a href="<?= base_url('misPedidos'); ?>" class="nav-link">Mis Pedidos</a></li>
                    <li class="nav-item"><a href="<?= base_url('recepcionPedidos'); ?>" class="nav-link">Recepción de pedidos</a></li>
                    <li class="nav-item"><a href="<?= base_url('preparacionPedidos'); ?>" class="nav-link">Preparación de ordenes</a></li>
                    <!--<li class="nav-item"><a href="<?= base_url('productos'); ?>" class="nav-link">Listado de productos</a></li>-->
                    <li class="nav-item"><a href="<?= base_url('paymentGetaway'); ?>" class="nav-link">Pasarela de pago</a></li>
                    <li class="nav-item"><a href="<?= base_url('empleados/lista'); ?>" class="nav-link">Empleados</a></li>
				</ul>
			</div>
		</div>
</nav>