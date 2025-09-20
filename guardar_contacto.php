<?php
// Conectar a la base de datos
require 'includes/config/database.php';
$db = conectarDB();

// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $mensaje = $_POST['mensaje'];
    $opciones = $_POST['opciones'];
    $presupuesto = $_POST['presupuesto'];
    $contacto = $_POST['contacto'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    // Insertar los datos en la base de datos
    $query = "INSERT INTO contactos (nombre, email, telefono, mensaje, opciones, presupuesto, contacto, fecha, hora) 
              VALUES ('$nombre', '$email', '$telefono', '$mensaje', '$opciones', '$presupuesto', '$contacto', '$fecha', '$hora')";

    $resultado = mysqli_query($db, $query);

    // Verificar si la inserción fue exitosa
    if ($resultado) {
        echo "Datos guardados correctamente.";
    } else {
        echo "Error al guardar los datos: " . mysqli_error($db);
    }
}
?>