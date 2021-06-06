
<?php 
if (isset($_SESSION['mensajeFlash']))
{
	echo "<div class=\"alert alert-success\" role=\"alert\">{$_SESSION['mensajeFlash']}</div>";
	unset($_SESSION['mensajeFlash']);
}
?>

<div class="container">
	<center><h1> Mis publicaciones </h1></center>
	<?php 



	$pdo = Basedatos::getConexion();

	try {
		$stmt = $pdo->prepare('select * from anuncios where id_usuario like ? order by fecha');
		$stmt->bindParam(1,$_SESSION['idUsuario']);

		$stmt->execute();

		if (isset($_SESSION['mensajeFlash']))
		{
			echo "<div class=\"alert alert-success\" role=\"alert\">{$_SESSION['mensajeFlash']}</div>";
			unset($_SESSION['mensajeFlash']);
		}

		if ($stmt->rowCount()!=0) {

			while ($fila = $stmt->fetch()) {
				$fechaOrdenada = ordenarFecha($fila['fecha']);//Hay que hacer esa funcion............................................................................
				echo '<div class="divPublicaciones"><h3>'.$fila['titulo'].'</h3> ';
				if (isset($_SESSION['idUsuario']) && $_SESSION['idUsuario'] == $fila['id_usuario']) {
					echo "<a class='btn btn-warning' href='index.php?cargar=editar&id=".$fila["id"]."'>Editar</a> | <a class='btn btn-danger' href='crud.php?op=6&id=".$fila["id"]."'>Borrar</a>";
				}
				echo ' <br> <img class="imgAnuncio" src="./imagenes/'.$fila['foto'].'?1"</img> <br> <p>'.$fila['descripcion'].'</p> <p class="bg-secondary">'.$fechaOrdenada.'</p> </div>';
			}
		}




	} catch (Exception $e) {

	}

	?>

</div>

