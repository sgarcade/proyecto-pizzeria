<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Selecciona tu Producto - Tienda de Pizza</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .cards-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            justify-content: center;
            padding: 2rem;
        }
        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1rem;
            max-width: 250px;
            text-align: center;
        }
        .card img {
            max-width: 100%;
            border-radius: 8px;
        }
        .card h3 {
            font-size: 1.2rem;
            margin: 0.5rem 0;
        }
        .card p {
            font-size: 0.9rem;
            color: #555;
        }
        .card button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .card button:hover {
            background-color: #0056b3;
        }
        #message-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }
        .message {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            color: #fff;
            font-family: Arial, sans-serif;
            transition: opacity 0.5s ease;
        }
        .message.success {
            background-color: #28a745;
        }
        .message.error {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <?php include("includes/header.php"); ?>

    <section class="product-selection">
    <h1 style="text-align: center; color: #ffcc00;">Búsqueda de Productos</h1>

    <div class="search-container" style="text-align: center; margin: 1rem 0;">
        <input type="text" id="search" placeholder="Buscar productos..." 
            style="padding: 0.5rem; width: 70%; max-width: 500px; border-radius: 4px; border: 1px solid #ccc;">
    </div>

    <div class="cards-container" id="product-list">
        <?php if (!empty($productos)) : ?>
            <?php foreach ($productos as $producto) : ?>
                <div class="card" data-name="<?= esc($producto['nombre_producto']) ?>">
                    <img src="<?= base_url('uploads/' . esc($producto['imagen'] ?? 'placeholder.png')) ?>" alt="<?= esc($producto['nombre_producto']) ?>">
                    <h3><?= esc($producto['nombre_producto']) ?></h3>
                    <p><?= esc($producto['descripcion']) ?></p>
                    <p><strong>Precio:</strong> $<?= number_format(esc($producto['precio_base']), 2) ?></p>
                    <button class="add-to-cart" data-id="<?= esc($producto['id_producto']) ?>">Añadir al carrito</button>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p style="text-align: center; font-size: 1.2rem;">No se encontraron productos.</p>
        <?php endif; ?>
    </div>
</section>

<div id="message-container"></div>

<script>

    document.getElementById('search').addEventListener('input', function () {
        const searchTerm = this.value.toLowerCase();
        const cards = document.querySelectorAll('.card');
        
        cards.forEach(card => {
            const productName = card.getAttribute('data-name').toLowerCase();
            if (productName.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });

    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault(); 
            const productId = this.getAttribute('data-id');

            fetch(`<?= base_url('/addToCart') ?>/${productId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => 
            {
                if (data.success) {
                    showMessage('Producto añadido al carrito', 'success');
                } else {
                    showMessage('Error al añadir producto', 'error');
                }
            })
            .catch(() => {
                showMessage('Producto añadido al carrito', 'success');
            });
        });
    });

    function showMessage(message, type) {
        const messageContainer = document.getElementById('message-container');
        const messageElement = document.createElement('div');
        messageElement.className = `message ${type}`;
        messageElement.textContent = message;

        messageContainer.appendChild(messageElement);

        setTimeout(() => {
            messageElement.style.opacity = '0';
            setTimeout(() => messageElement.remove(), 500);
        }, 3000);
    }
</script>

</body>
</html>
