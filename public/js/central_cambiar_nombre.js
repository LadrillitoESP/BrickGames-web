$(document).ready(function(){
/*	$.ajaxSetup({
		cache:false
	});
*/
	$("#btnCambiar").on("click", function(){
		let datosEnviar = {nombre: $("#nombre").val(), idUsuario: $("#inputIdUsuario").val()};
		console.log(datosEnviar);

		$.post("crud.php?op=8", datosEnviar, function(res){
			console.log(res);
			if (res == "ok") {
				alert("Nombre cambiado correctamente");
				document.location = "https://gamesbreak.kozow.com/index.php?cargar=default";
			}else{
				alert("Error");
			}
		});
	});

	
});