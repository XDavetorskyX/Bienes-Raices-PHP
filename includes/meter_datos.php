<?php
require 'includes/config/database.php';
$db = conectarDB();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $contra = $_POST['password'];
    $contra2 = $_POST['Cpassword'];

    if ($contra === $contra2) {
        $query = "INSERT INTO usuarios (email, password) VALUES ('$email', '$contra')";
        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            echo "Datos guardados exitosamente";
        } else {
            echo "Error al guardar los datos: " . mysqli_error($db);
        }
    } else {
        echo "Las contraseñas no son iguales";
    }
}
?>