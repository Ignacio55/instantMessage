<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Instant message</title>
<link rel="stylesheet" href="/static/css/bootstrap.css">
<link rel="stylesheet" href="/static/css/bootstrap-theme.css">
<?php
session_start();
$con = mysqli_connect("localhost:3306","administrador","123Daw$321","instantMessage") or die("No se pudo conectar");


    if (isset($_POST['eliminar'])){
        $id=$_POST['id'];
        // Consulta SQL para obtener los datos de los centros.
        $sql="delete from usuarios where usuario_id='$id'";
        $resultados=mysqli_query($con,$sql) or die(mysqli_error());
    }


?>
	</head>
	<body>
		<header>
			<h1>Seleccione una sala</h1>
			<a href="index.php">Logout</a>
		</header>
		<main>
		<div class="row justify-content-center">
			<h1 class="col-6">Usuarios registrados</h1>
			
			
			<?php 
                $ssql="SELECT * FROM usuarios";
                $result = mysqli_query($con, $ssql) or die ( "Algo ha ido mal en la consulta a la base de datos");
                echo("-".mysqli_num_rows($result));
                if(mysqli_num_rows($result)){
                    
                    $reg=mysqli_fetch_array($result);                  
                    $tabla="<table>";
                    //$reg=mysqli_fetch_row($result);
                    
                    for($i=0;$i<count($reg);$i++){
                        
                        $tabla=$tabla."<tr><td>".$reg['usuario_id']."</td><td>".$reg['nombre']."</td><td>".
                            $reg['email']."</td><td><input type='submit' name='eliminar' value='".$reg['usuario_id']."'></td></tr>";
                    }
                    $tabla=$tabla."</table>";
                    echo($tabla);
                }else{
                    echo("No hay usuarios registrados");
                }
			?>
			</div>
		</main>
		<script src="/static/js/bootstrap.js"></script>
	</body>
</html>