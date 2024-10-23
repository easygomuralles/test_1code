<?php
session_start();

$usuario = $_POST['username'];
$contraseña1 = $_POST['contusername'];


if (!empty($usuario) && !empty($contraseña1)) {

    $conexion = mysqli_connect("localhost", "root", "", "prueba");

    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    $consulta = "INSERT INTO sub1 (usuario, contraseña) VALUES (?, ?)";
    $stmt = mysqli_prepare($conexion, $consulta);

    mysqli_stmt_bind_param($stmt, "ss", $usuario, $contraseña1);

    
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['usuario'] = $usuario;
        header("Location: index.php");
        exit();
    } else {
        echo "<h1>Error al registrarse: " . mysqli_error($conexion) . "</h1>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
} else {
    echo "<h1>Por favor, completa todos los campos.</h1>";
}
?>
