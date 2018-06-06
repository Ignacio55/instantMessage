<?php
session_start();
$con = mysqli_connect("localhost:3306","administrador","123Daw$321","instantMessage") or die("No se pudo conectar");


if (isset($_POST['botonBorrar'])){
    $id=$_POST['id'];
    
    // Consulta SQL para obtener los datos de los centros.
    $sql="delete from usuarios where usuario_id='$id'";
    $resultados=mysqli_query($con,$sql) or die(mysqli_error());
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Instant message</title>
<link rel="stylesheet" href="/static/css/bootstrap.css">
<link rel="stylesheet" href="/static/css/bootstrap-theme.css">

	</head>
	<body>
		<header>
			<h1>Seleccione una sala</h1>
			<a href="registro.html">&#xe081;</a>
			<a href="edit.php">&#xe065;</a>
			<a href="delete.php">&#xe020;</a>
			<a href="index.php">&#xe163;</a>
		</header>
		<main>
		<form id="form1" name="form1" method="post" action="edit.php">
		<div class="row justify-content-center">
			<h1 class="col-6">Usuarios registrados</h1>
			
			
			<?php 
                $ssql="SELECT * FROM usuarios";
                $result = mysqli_query($con, $ssql) or die ( "Algo ha ido mal en la consulta a la base de datos");
                if(mysqli_num_rows($result)){               
                    $select="<select name='id'>";

                    while($reg=mysqli_fetch_array($result)){
                        $select=$select."<option value='".$reg['usuario_id']."'>".$reg['nombre']."</option>";
                    }
                    
                    $select=$select."</select>";
                    echo($select);
                }else{
                    echo("No hay usuarios registrados");
                }
			?>
			</div>
			<input type="submit" class="btn btn-success" name="botonBorrar" value="Borrar"/>
		</form>
		</main>
		<script src="/static/js/bootstrap.js"></script>
	</body>
</html>