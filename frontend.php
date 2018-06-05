<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Instant message</title>
		<link rel="stylesheet" href="/static/css/bootstrap.css">
	  	<link rel="stylesheet" href="/static/css/bootstrap-theme.css">
	  	<?php 
	  	function cambiar($id){
    	  	if(isset($_POST['sala'])){
    	  	    $_SESSION['sala']=$id;
    	  	    header("refresh:5,url='salaChat.html'");
    	  	}
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
			<h1 class="col-6">Elija una sala de chat</h1>
			</div>
			
			<?php 
			
				session_start();
				
				$con = mysqli_connect("localhost:3306","administrador","123Daw$321","instantMessage") or die("No se pudo conectar");

$ssql="SELECT * FROM salas";
    $result = mysqli_query($con, $ssql) or die ( "Algo ha ido mal en la consulta a la base de datos");
    
    if(mysqli_num_rows($result)){
        //$reg = mysqli_fetch_array($result);
        
        while($reg = mysqli_fetch_array($result)){
			echo("<div class='row justify-content-center'>");
            echo ("<button type='submit' class='btn-primary col-2' name='sala' onClick='cambiar(".$reg['id_sala'].")'>".$reg['nombre_sala'].$reg['descripcion_sala']."</button>");
            echo("</div>");
        }
        
    }

			?>
			
		
			
			
			
			
		</main>
		<script src="/static/js/bootstrap.js"></script>
	</body>
</html>