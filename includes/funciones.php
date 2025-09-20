<?php

require 'app.php';

function incluirTemplate( string  $nombre, bool $inicio = false ) {
    include TEMPLATES_URL . "/{$nombre}.php"; 
}

function estaAutenticado() : bool {
    session_start();

    $auth = $_SESSION['login'];
    if($auth) {
        return true;
    }
    return false;
}

function DatosCrear() : bool{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $contra = $_POST['password'];
        $contra2 = $_POST['Cpassword'];
    
        if ($contra === $contra2) {
            $query = "INSERT INTO usuarios (email, password) VALUES ('$email', '$contra')";
            $resultado = mysqli_query($db, $query);
    
            if ($resultado) {
                return true;
            }
        } else {
            return false;
        }
    }
}