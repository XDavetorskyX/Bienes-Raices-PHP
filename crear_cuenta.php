<?php
require 'includes/config/database.php';
$db = conectarDB();
require 'includes/funciones.php';
incluirTemplate('header');

$errores = []; // Array para almacenar errores
$formularioEnviado = false; // Bandera para saber si se envió el formulario

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formularioEnviado = true; // Se marcó como enviado el formulario

    $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) : null;
    $contra = isset($_POST['password']) ? trim($_POST['password']) : null;
    $contra2 = isset($_POST['Cpassword']) ? trim($_POST['Cpassword']) : null;

    // Validaciones
    if (!$email) {
        $errores[] = "Formato de email no válido.";
    }
    if (empty($contra) || empty($contra2)) {
        $errores[] = "Las contraseñas no pueden estar vacías.";
    }
    if (strlen($contra) < 6) {
        $errores[] = "La contraseña debe tener al menos 6 caracteres.";
    }
    if ($contra !== $contra2) {
        $errores[] = "Las contraseñas no coinciden.";
    }

    // Si no hay errores, proceder con el registro
    if (empty($errores)) {
        $contra_hash = password_hash($contra, PASSWORD_DEFAULT);

        $stmt = $db->prepare("INSERT INTO usuarios (email, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $contra_hash);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "<p class='mensaje exito'>Cuenta creada exitosamente</p>";
        } else {
            $errores[] = "Error al registrar usuario.";
        }
    }
}
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Crear cuenta</h1>

    <!-- Mostrar errores solo si el formulario ha sido enviado -->
    <?php if ($formularioEnviado && !empty($errores)) : ?>
        <div class="alerta error">
            <ul>
                <?php foreach ($errores as $error) : ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" class="formulario" novalidate>
        <fieldset>
            <legend>Datos Personales</legend>

            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Tu Nombre" id="nombre" name="nombre" required>

            <label for="email">E-mail</label>
            <input type="email" placeholder="Tu Email" id="email" name="email" required>

            <label for="password">Contraseña</label>
            <input type="password" name="password" placeholder="Tu contraseña" id="password" required>

            <label for="Cpassword">Confirmar contraseña</label>
            <input type="password" name="Cpassword" placeholder="Tu contraseña" id="Cpassword" required>
        </fieldset>

        <input type="submit" value="Crear cuenta" class="boton boton-verde">
    </form>

    <!-- Botón para regresar a login.php -->
    <a href="login.php" class="boton boton-amarillo">Volver para Iniciar Sesión</a>
</main>

<?php incluirTemplate('footer'); ?>