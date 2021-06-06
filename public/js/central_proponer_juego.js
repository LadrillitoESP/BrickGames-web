$(document).ready(function(){
/*  $.ajaxSetup({
        cache:false
    });
*/
    $("#btnProponer").on("click", function(){
        let datosEnviar = {nombre: $("#titulo").val(), idUsuario: $("#inputIdUsuario").val(), descripcion: $("#descripcion").val()};
        console.log(datosEnviar);

        $.post("crud.php?op=9", datosEnviar, function(res){
            console.log(res);
            if (res == "ok") {
                alert("Juego sugerido correctamente");
                document.location = "https://gamesbreak.kozow.com/index.php?cargar=default";
            }else{
                alert("Error");
            }
        });
    });

    
});