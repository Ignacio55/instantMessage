<?php
session_start();


//$user = $_SESSION['user'];

if(isset($_POST['botonEnviar'])){
    $con = mysqli_connect("localhost:3306","administrador","123Daw$321", "instantMessage") or die("No se pudo conectar");
    //mysqli_select_db("instantMessage",$con);
    
    
    $mensaje=$_POST['mensaje'];
    $fecha = date("Y-m-d H:i:s");
    
    if($mensaje != ""){
        $ssql = "INSERT INTO mensajes (usuario,texto,publicado,sala) VALUES ('1', '$mensaje','$fecha','1')";
        mysqli_query($con, $ssql) or die("No se pudo enviar el mensaje");
    }
}

//abrirChat($con);

function abrirChat($conexion){
    /*$ssql="SELECT * FROM mensajes ORDER BY publicado DESC LIMIT 2";
    
    $result=mysqli_query($conexion, $ssql);
    //$registro=mysqli_fetch_array($result, MYSQL_ASSOC);
    echo("H");
    if(mysqli_num_rows($result)){
        echo("M");
        while($registro = mysqli_fetch_array($result, MYSQL_ASSOC)){
            $num += 1;
            echo("<h1>".$num."-".$registro['texto']."</h1>");
        }
    }*/
}
