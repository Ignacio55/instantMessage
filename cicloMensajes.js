tiempo="";
d = new Date();
$tiempo= d.getFullYear()+ '-' + (d.getMonth()+1) +'-'+ d.getDate() +' '+ d.getHours() +':'+ d.getMinutes() +':'+d.getSeconds();


function objetoXHR(){
	if (window.XMLHttpRequest)
	{
		// El navegador implementa la interfaz XHR de forma nativa
		return new XMLHttpRequest();
	} 
	else if (window.ActiveXObject)
	{
		var versionesIE = new Array('Msxml2.XMLHTTP.5.0', 'Msxml2.XMLHTTP.4.0',
		'Msxml2.XMLHTTP.3.0', 'Msxml2.XMLHTTP', 'Microsoft.XMLHTTP'); 
		 
		for (var i = 0; i < versionesIE.length; i++) 
		{ 
			try  
			{ /* Se intenta crear el objeto en Internet Explorer comenzando
			en la versión más moderna del objeto hasta la primera versión. 
			En el momento que se consiga crear el objeto, saldrá del bucle
			devolviendo el nuevo objeto creado. */
			return new ActiveXObject(versionesIE[i]); 
			}  
			catch (errorControlado) {}//Capturamos el error,
		} 
	} 
	/* Si llegamos aquí es porque el navegador no posee ninguna forma de crear el objeto.
	Emitimos un mensaje de error usando el objeto Error. 
	
	*/ 
	throw new Error("No se pudo crear el objeto XMLHttpRequest"); 
}

function llenarMensajes() {
	xhrMensaje=new objetoXHR();
	//comprobamos que lo ha creado
	if (xhrMensaje){
		xhrMensaje.open('POST','procesarMensaje.php', true );
		
		xhrMensaje.onreadystatechange=function(){
			if (xhrMensaje.readyState==4){ 
				if (xhrMensaje.status==200 || xhrMensaje.status==304){
					dibujarMensaje(xhrMensaje);
				}else{
					alert("Ha habido un error");
				}
			}
		}
		xhrMensaje.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhrMensaje.send("tiempo = nada");	
		
	}
}

function actualizarChat(){
	
	xhrMensaje=new objetoXHR();
	//comprobamos que lo ha creado
	if (xhrMensaje){
		console.log("hhhhh");
		xhrMensaje.open('POST','procesarMensaje.php', true );
		if ((xhrMensaje.status==200) || (xhrMensaje.status==304)){
			
			dibujarMensaje(xhrMensaje);
		}		
		
	}
	//YYYY-MM-DD HH:MM:SS
	d = new Date();
    $hasta= d.getFullYear()+ '-' + (d.getMonth()+1) +'-'+ d.getDate() +' '+ d.getHours() +':'+ d.getMinutes() +':'+d.getSeconds();
    

    xhrMensaje.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	tiempo=$hasta;
		xhrMensaje.send("tiempo ="+tiempo);
}

function dibujarMensaje(xhr1){
	
	var mensajes=eval('('+xhr1.responseText+')');
	
	if(mensajes.length != -1){
		
		for(var i=0; i < mensajes.length ; i++){
			alert(i);
			if(mensajes[i].usuario == "<?php echo $_SESSION['user']; ?>"){
				mensaje="<p class='mensaje ajeno' "+mensajes[i].texto+"</p>";
				document.getElementById("chat").insertAdjacentHTML("beforeend",mensaje);
			}else{
				mensaje="<p class='mensaje propio' "+mensajes[i].texto+"</p>";
				document.getElementById("chat").insertAdjacentHTML("beforeend",mensaje);
			}
		}
		
	}else{
		alert("Error al recibir los datos");
	}
}