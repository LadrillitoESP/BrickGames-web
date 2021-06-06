$(document).ready(function(){
/*  $.ajaxSetup({
        cache:false
    });
*/
    $("#btnProponerMejora").on("click", function(){
        let datosEnviar = {asunto: $("#asunto").val(), idUsuario: $("#inputIdUsuario").val(), descripcion: $("#descripcion").val()};
        console.log(datosEnviar);

        $.post("crud.php?op=10", datosEnviar, function(res){
            console.log(res);
            if (res == "ok") {
                alert("Mejora sugerida correctamente");
                document.location = "https://gamesbreak.kozow.com/index.php?cargar=default";
            }else{
                alert("Error");
            }
        });
    });

    
});