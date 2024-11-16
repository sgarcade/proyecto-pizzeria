<?php
$servername = "localhost";
$username = "root";
$password = "admin";
$database = "nostra_pizza";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener datos de la tabla producto
$sql = "SELECT id_producto, nombre_producto, descripcion, sabor, precio_base, stock, id_tamaño FROM producto";
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    echo "<table border='1' style='border-collapse: collapse; width: 100%;'>
            <tr>
                <th>ID Producto</th>
                <th>Nombre Producto</th>
                <th>Descripción</th>
                <th>Sabor</th>
                <th>Precio Base</th>
                <th>Stock</th>
                <th>ID Tamaño</th>
            </tr>";
    
    // Recorrer los resultados y mostrarlos en la tabla
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id_producto']}</td>
                <td>{$row['nombre_producto']}</td>
                <td>{$row['descripcion']}</td>
                <td>{$row['sabor']}</td>
                <td>{$row['precio_base']}</td>
                <td>{$row['stock']}</td>
                <td>{$row['id_tamaño']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron datos en la tabla producto.";
}

// Cerrar conexión
$conn->close();
?>
