<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Comentarios de Clientes - Tienda de Pizza</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9; /* Fondo sólido */
            color: #333;
        }

        h1 {
            text-align: center;
            color: #ffffff; /* Color oscuro para contrastar con el fondo claro */
            margin-top: 1.5rem;
            font-size: 2.5rem;
        }

        .cards-container {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            justify-content: center;
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            max-width: 300px;
            text-align: center;
            width: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.15);
        }

        .card h3 {
            font-size: 1.4rem;
            margin: 0.5rem 0;
            color: #333;
        }

        .card p {
            font-size: 1rem;
            color: #555;
            margin: 0.5rem 0;
        }

        .card .calificacion {
            font-weight: bold;
            font-size: 1.2rem;
            color: #ff7849;
        }

        .card button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 0.6rem 1rem;
            border-radius: 20px;
            cursor: pointer;
            font-size: 1rem;
            margin-top: 1rem;
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

    <section class="feedback-section">
        <h1>Comentarios de Clientes</h1>

        <div class="cards-container">
            <?php if (!empty($comentarios)) : ?>
                <?php foreach ($comentarios as $comentario) : ?>
                    <div class="card">
                        <h3>Cliente #<?= esc($comentario['id_cliente']) ?></h3>
                        <p><strong>Comentario:</strong> <?= esc($comentario['comentario']) ?></p>
                        <p class="calificacion"><strong>Calificación:</strong> <?= esc($comentario['calificacion']) ?> / 10</p>
                        <p><small>Fecha: <?= esc($comentario['fecha']) ?></small></p>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p style="text-align: center; font-size: 1.2rem; color: #555;">No se han encontrado comentarios.</p>
            <?php endif; ?>
        </div>
    </section>

    <div id="message-container"></div>

    <script>
        // Aquí puedes agregar cualquier funcionalidad adicional que necesites, como la manipulación de mensajes o validaciones.
    </script>
</body>
</html>
