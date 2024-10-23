<?php
$usuario=$_POST['usuario'];
$contraseña=$_POST['contrasena'];
session_start();
$_SESSION['usuario']=$usuario;

$conexion = mysqli_connect("localhost","root","","prueba");

$consulta="SELECT*FROM sub1 WHERE usuario='$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
    header("location:home.php");
}else{
    ?>
    <?php
    include("index.php");
    ?>
    <h1 class="bad">error en la autenticacion</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);