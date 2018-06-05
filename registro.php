<?php
session_start();

$con = mysqli_connect("localhost:3306","administrador","123Daw$321","instantMessage") or die("No se pudo conectar");

if(isset($_POST['botonRegistro'])){
    
    $nombre=$_POST['campoNombre'];
    $password=$_POST['campoPassword'];
    $email=$_POST['campoEmail'];
    $ssql="INSERT INTO usuarios VALUES (NULL, '$nombre', '$email', 'usuario', '".date("Y-m-d H:i:s")."', '$password');";
    $result = mysqli_query($con, $ssql) or die ( "Algo ha ido mal en la consulta a la base de datos");
    $_SESSION['user'] = $nombre;
    header("refresh:5,url='frontend.php'");
}
?>
