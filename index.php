<?php 
session_start();

$con = mysqli_connect("localhost:3306","administrador","123Daw$321","instantMessage") or die("No se pudo conectar");

if(isset($_POST['botonAcceder'])){
    
    $nombre=$_POST['campoUsuario'];
    $password=$_POST['campoPassword'];
    $ssql="SELECT * FROM usuarios WHERE nombre = '$nombre'";
    $result = mysqli_query($con, $ssql) or die ( "Algo ha ido mal en la consulta a la base de datos");
    
    if(mysqli_num_rows($result)){
        $reg = mysqli_fetch_array($result);
        
        if($reg['contraseņa'] == $password){
            $_SESSION['user'] = $nombre;
            
            if($reg['permisos'] == "admin"){
                header("refresh:5,url='backend.php'");
            }else if($reg['permisos']=="usuario"){
                header("refresh:5,url='frontend.php'");
            }
        }
    }else{
        header("refresh:5,url='registro.html'");
    }
}
?>
