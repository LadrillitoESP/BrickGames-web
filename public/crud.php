<?php
require_once '../inc/config.php';

function actualizarDummyData()
{
    global $pdo;

    if (isset($_SESSION["idUsuario"]) === false) {
        echo '<script language="javascript">alert("';
        echo 'Hoolas'.$_SESSION["idUsuario"];
        echo '");</script>';
        $_SESSION['idUsuario'] = -1;
        $_SESSION["nombreUsuario"] = "";
    }

    // leer datos de la base de datos
    // actualizar el fichero dummydata.js

    $dummyData = 'var dummyData = {'."\n";

    $tituloJuego;
    $descripcionJuego;
    $puntuacionJuego;
    $duracionJuego;

    //CALIDAD PRECIO
    $dummyData .= '"Calidad Precio":"';

    $stmt=$pdo->prepare('SELECT * FROM juegos ORDER BY puntuacion DESC, duracion DESC');
    $stmt->execute();

    if ($stmt->rowCount()!=0){
        while ($fila = $stmt->fetch()) {
            $tituloJuego = $fila['nombre'];
            $descripcionJuego = $fila['descripcion'];
            $puntuacionJuego = $fila['puntuacion'];
            $duracionJuego = $fila['duracion'];
            $idJuego = $fila['idJuego'];


            $textoAñadir = '<li class=\"product\"><div class=\"'.$idJuego.'\"><h3 class=\"titulo\">'.$tituloJuego.'</h3><p class=\"descripcion\">'.$descripcionJuego.'</p><span class=\"puntuacion\" onclick=\"alertaPuntuacion('.$idJuego.', '.$_SESSION["idUsuario"].')\">'.$puntuacionJuego.'</span> | <span class=\"tiempo\" onclick=\"alertaTiempo('.$idJuego.', '.$_SESSION["idUsuario"].')\">'.$duracionJuego.'</span></div></li>';

            $dummyData .= $textoAñadir;
        }
    }

    $dummyData .= '", '."\n";


    //MAS LARGOS
    $dummyData .= '"Mas largos":"';

    $stmt=$pdo->prepare('SELECT * FROM juegos ORDER BY duracion DESC');
    $stmt->execute();

    if ($stmt->rowCount()!=0){
        while ($fila = $stmt->fetch()) {
            $tituloJuego = $fila['nombre'];
            $descripcionJuego = $fila['descripcion'];
            $puntuacionJuego = $fila['puntuacion'];
            $duracionJuego = $fila['duracion'];
            $idJuego = $fila['idJuego'];

            $textoAñadir = '<li class=\"product\"><div class=\"'.$idJuego.'\"><h3 class=\"titulo\">'.$tituloJuego.'</h3><p class=\"descripcion\">'.$descripcionJuego.'</p><span class=\"puntuacion\" onclick=\"alertaPuntuacion('.$idJuego.', '.$_SESSION["idUsuario"].')\">'.$puntuacionJuego.'</span> | <span class=\"tiempo\" onclick=\"alertaTiempo('.$idJuego.', '.$_SESSION["idUsuario"].')\">'.$duracionJuego.'</span></div></li>';

            $dummyData .= $textoAñadir;
        }
    }

    $dummyData .= '", '."\n";


    //MAS CORTOS
    $dummyData .= '"Mas cortos":"';

    $stmt=$pdo->prepare('SELECT * FROM juegos ORDER BY duracion ASC');
    $stmt->execute();

    if ($stmt->rowCount()!=0){
        while ($fila = $stmt->fetch()) {
            $tituloJuego = $fila['nombre'];
            $descripcionJuego = $fila['descripcion'];
            $puntuacionJuego = $fila['puntuacion'];
            $duracionJuego = $fila['duracion'];
            $idJuego = $fila['idJuego'];

            $textoAñadir = '<li class=\"product\"><div class=\"'.$idJuego.'\"><h3 class=\"titulo\">'.$tituloJuego.'</h3><p class=\"descripcion\">'.$descripcionJuego.'</p><span class=\"puntuacion\" onclick=\"alertaPuntuacion('.$idJuego.', '.$_SESSION["idUsuario"].')\">'.$puntuacionJuego.'</span> | <span class=\"tiempo\" onclick=\"alertaTiempo('.$idJuego.', '.$_SESSION["idUsuario"].')\">'.$duracionJuego.'</span></div></li>';

            $dummyData .= $textoAñadir;
        }
    }

    $dummyData .= '", '."\n";



    //MEJOR VALORADOS
    $dummyData .= '"Mejor valorados":"';

    $stmt=$pdo->prepare('SELECT * FROM juegos ORDER BY puntuacion DESC');
    $stmt->execute();

    if ($stmt->rowCount()!=0){
        while ($fila = $stmt->fetch()) {
            $tituloJuego = $fila['nombre'];
            $descripcionJuego = $fila['descripcion'];
            $puntuacionJuego = $fila['puntuacion'];
            $duracionJuego = $fila['duracion'];
            $idJuego = $fila['idJuego'];

            $textoAñadir = '<li class=\"product\"><div class=\"'.$idJuego.'\"><h3 class=\"titulo\">'.$tituloJuego.'</h3><p class=\"descripcion\">'.$descripcionJuego.'</p><span class=\"puntuacion\" onclick=\"alertaPuntuacion('.$idJuego.', '.$_SESSION["idUsuario"].')\">'.$puntuacionJuego.'</span> | <span class=\"tiempo\" onclick=\"alertaTiempo('.$idJuego.', '.$_SESSION["idUsuario"].')\">'.$duracionJuego.'</span></div></li>';

            $dummyData .= $textoAñadir;
        }
    }

    $dummyData .= '", '."\n";


    //PEOR VALORADOS
    $dummyData .= '"Peor valorados":"';

    $stmt=$pdo->prepare('SELECT * FROM juegos ORDER BY puntuacion ASC');
    $stmt->execute();

    if ($stmt->rowCount()!=0){
        while ($fila = $stmt->fetch()) {
            $tituloJuego = $fila['nombre'];
            $descripcionJuego = $fila['descripcion'];
            $puntuacionJuego = $fila['puntuacion'];
            $duracionJuego = $fila['duracion'];
            $idJuego = $fila['idJuego'];

            $textoAñadir = '<li class=\"product\"><div class=\"'.$idJuego.'\"><h3 class=\"titulo\">'.$tituloJuego.'</h3><p class=\"descripcion\">'.$descripcionJuego.'</p><span class=\"puntuacion\" onclick=\"alertaPuntuacion('.$idJuego.', '.$_SESSION["idUsuario"].')\">'.$puntuacionJuego.'</span> | <span class=\"tiempo\" onclick=\"alertaTiempo('.$idJuego.', '.$_SESSION["idUsuario"].')\">'.$duracionJuego.'</span></div></li>';

            $dummyData .= $textoAñadir;
        }
    }

    //$dummyData .= '",'. "\n"; AL ULTIMO HAY QUE QUITARLE LA COMA, si añado mas hay que volver a ponerla
    $dummyData .= '" '."\n";


    $dummyData .= '}';
    // Escribimos el fichero dummydata
    $file = fopen("./js/dummydata.js", "w");

    fwrite($file,  $dummyData);
    fclose($file);

  

}




if (isset($_GET['op']) && $_GET['op']!='')
{
    switch ($_GET['op'])
    {

        case 11: // Alta de usuarios desde Google.

        $_POST=limpiarFiltrar($_POST);

            /* Insertamos en la base de datos*/
            try {
                $stmt=$pdo->prepare('select * from usuarios where google_id = ?');
                $stmt->bindParam(1,$_POST['google_id']);
                $stmt->execute();

                if ($stmt->rowCount()!=0) {
                    $fila = $stmt->fetch();
                    $idUsuario = $fila['idUsuario'];
                    $nombreUsuario = $fila['nombre'];
                }
                else {
                    $stmt=$pdo->prepare('insert into usuarios(google_id,correo) values(?,?)');
                    $stmt->bindParam(1,$_POST['google_id']);
                    $stmt->bindParam(2,$_POST['correo']);
                    $stmt->execute();

                    $stmt=$pdo->prepare('select * from usuarios where google_id = ?');
                    $stmt->bindParam(1,$_POST['google_id']);
                    $stmt->execute();
                    $fila = $stmt->fetch();
                    $idUsuario = $fila['idUsuario'];
                    $nombreUsuario = $fila['nombre'];
                }

                echo '{"usuario": "'.$idUsuario.'", "nombreUsuario": "'.$nombreUsuario.'", "otrodato": "ok"}';

            } catch (PDOException $e) {
                echo "Error en sentencia SQL ".$e->getMessage();
            }

            break;

        case 3:
            # Desconectar

        session_destroy();
        session_start();
        header("location: /");

        break;

        case 4:
            # Actualizar puntuaciones juegos || NO SE USA


        /* Leemos de la base de datos*/
        try {//Hacer este sistema tambien para solo un usuario

            $stmt=$pdo->prepare('SELECT count(idJuego) AS total FROM puntuaciones');
            $stmt->execute();
            $fila = $stmt->fetch();
            $idJuegosLength = $fila['total'];

            $i = 1;
            while ($i < $idJuegosLength) {

                $stmt=$pdo->prepare('SELECT AVG(puntuacion) AS media FROM puntuaciones WHERE idJuego =?');
                $stmt->bindParam(1,$i);
                $stmt->execute();

                $fila = $stmt->fetch();
                $puntuacion = $fila['media'];
            

                $stmt=$pdo->prepare('UPDATE juegos SET puntuacion =? WHERE idJuego =?');
                $stmt->bindParam(1,$puntuacion);
                $stmt->bindParam(2,$i);
                $stmt->execute();
                $i++;
            }

            //header("location:index.php?cargar=anuncios");
        } catch (PDOException $e) {
            echo "Error en sentencia SQL ".$e->getMessage();
        }
        

        break;


        case 5:
            # Actualizar tiempos juegos || NO SE USA


        /* Leemos de la base de datos*/
        try {

            $stmt=$pdo->prepare('SELECT count(idJuego) AS total FROM tiempos');
            $stmt->execute();
            $fila = $stmt->fetch();
            $idJuegosLength = $fila['total'];

            $i = 1;
            while ($i < $idJuegosLength) {

                $stmt=$pdo->prepare('SELECT AVG(duracion) AS media FROM `tiempos` WHERE idJuego =?');
                $stmt->bindParam(1,$i);
                $stmt->execute();

                $fila = $stmt->fetch();
                $duracion = $fila['media'];

                $stmt=$pdo->prepare('UPDATE juegos SET duracion =? WHERE idJuego =?');
                $stmt->bindParam(1,$duracion);
                $stmt->bindParam(2,$i);
                $stmt->execute();
                $i++;
            }

            //header("location:index.php?cargar=anuncios");
        } catch (PDOException $e) {
            echo "Error en sentencia SQL ".$e->getMessage();
        }
        

        break;


        case 6:
            # añadir una puntuacion y actualizar puntuaciones


        /* Insertamos en la base de datos*/
        try {

            $_POST=limpiarFiltrar($_POST);

            $stmt=$pdo->prepare('SELECT idPuntuacion FROM puntuaciones WHERE idUsuario = ? AND idJuego = ?;');
            $stmt->bindParam(1,$_POST['idUsuario']);
            $stmt->bindParam(2,$_POST['idJuego']);
            $stmt->execute();

            if ($stmt->rowCount()!=0) {//Si ya ha añadida una puntuacion la actualizamos
                $fila = $stmt->fetch();
                $idPuntuacion = $fila['idPuntuacion'];

                $stmt=$pdo->prepare('UPDATE puntuaciones SET puntuacion =? WHERE idPuntuacion =?');
                $stmt->bindParam(1,$_POST['puntuacion']);
                $stmt->bindParam(2,$idPuntuacion);
                $stmt->execute();
                
            }
            else{//Si no habia añadido una puntuacion antes creamos una nueva
                $stmt=$pdo->prepare('INSERT INTO puntuaciones (idUsuario, idJuego, puntuacion) VALUES (?, ?, ?);');
                $stmt->bindParam(1,$_POST['idUsuario']);
                $stmt->bindParam(2,$_POST['idJuego']);
                $stmt->bindParam(3,$_POST['puntuacion']);
                $stmt->execute();
            }
            $stmt=$pdo->prepare('SELECT AVG(puntuacion) AS media FROM puntuaciones WHERE idJuego =?');
            $stmt->bindParam(1,$_POST['idJuego']);
            $stmt->execute();

            $fila = $stmt->fetch();
            $puntuacion = $fila['media'];
            
            $stmt=$pdo->prepare('UPDATE juegos SET puntuacion =? WHERE idJuego =?');
            $stmt->bindParam(1,$puntuacion);
            $stmt->bindParam(2,$_POST['idJuego']);
            $stmt->execute();

            actualizarDummyData();
            echo "ok";
            

        } catch (PDOException $e) {
            echo "Error en sentencia SQL ".$e->getMessage();
        }
        

        break;


        case 7:
            # añadir un tiempo y actualizar tiempos


        /* Insertamos en la base de datos*/
        try {

            $_POST=limpiarFiltrar($_POST);

            $stmt=$pdo->prepare('SELECT idTiempo FROM tiempos WHERE idUsuario = ? AND idJuego = ?;');
            $stmt->bindParam(1,$_POST['idUsuario']);
            $stmt->bindParam(2,$_POST['idJuego']);
            $stmt->execute();

            if ($stmt->rowCount()!=0) {//Si ya ha añadido un tiempo lo actualizamos
                $fila = $stmt->fetch();
                $idTiempo = $fila['idTiempo'];

                $stmt=$pdo->prepare('UPDATE tiempos SET duracion =? WHERE idTiempo =?');
                $stmt->bindParam(1,$_POST['duracion']);
                $stmt->bindParam(2,$idTiempo);
                $stmt->execute();
                
            }
            else{//Si no habia añadido un tiempo antes creamos uno nuevo
                $stmt=$pdo->prepare('INSERT INTO tiempos (idUsuario, idJuego, duracion) VALUES (?, ?, ?);');
                $stmt->bindParam(1,$_POST['idUsuario']);
                $stmt->bindParam(2,$_POST['idJuego']);
                $stmt->bindParam(3,$_POST['duracion']);
                $stmt->execute();
            }

            //Atualizar en la tabla de Juegos
            $stmt=$pdo->prepare('SELECT AVG(duracion) AS media FROM `tiempos` WHERE idJuego =?');
            $stmt->bindParam(1,$_POST['idJuego']);
            $stmt->execute();

            $fila = $stmt->fetch();
            $duracion = $fila['media'];
        
            $stmt=$pdo->prepare('UPDATE juegos SET duracion =? WHERE idJuego =?');
            $stmt->bindParam(1,$duracion);
            $stmt->bindParam(2,$_POST['idJuego']);
            $stmt->execute();

            actualizarDummyData();
            echo "ok";
            

        } catch (PDOException $e) {
            echo "Error en sentencia SQL ".$e->getMessage();
        }
        

        break;

        case 8:
            # cambiar nombre de usuario


        /* Insertamos en la base de datos*/
        try {
            $_POST=limpiarFiltrar($_POST);

            $stmt=$pdo->prepare('UPDATE usuarios SET nombre=? WHERE idUsuario=?');
            $stmt->bindParam(1,$_POST['nombre']);
            $stmt->bindParam(2,$_POST['idUsuario']);
            $stmt->execute();

            $_SESSION['nombreUsuario'] = $_POST['nombre'];
            echo "ok";
            

        } catch (PDOException $e) {
            echo "Error en sentencia SQL ".$e->getMessage();
        }
        
        break;

        case 9:
            # Proponer juego


        /* Insertamos en la base de datos*/
        try {
            $_POST=limpiarFiltrar($_POST);

            $juegoSugerido = 'nombre="'.$_POST["nombre"].'",descripcion="'.$_POST["descripcion"].'",idUsuario="'.$_POST["idUsuario"].'"'."\n";

            $file = fopen("./juegosSugeridos.js", "a");

            fwrite($file,  $juegoSugerido);
            fclose($file);

            echo "ok";
            

        } catch (PDOException $e) {
            echo "Error en sentencia SQL ".$e->getMessage();
        }
        
        break;

        case 10:
            # Proponer mejora


        /* Insertamos en la base de datos*/
        try {
            $_POST=limpiarFiltrar($_POST);

            $mejoraSugerida = 'asunto="'.$_POST["asunto"].'",descripcion="'.$_POST["descripcion"].'",idUsuario="'.$_POST["idUsuario"].'"'."\n";

            $file = fopen("./mejorasSugeridas.js", "a");

            fwrite($file,  $mejoraSugerida);
            fclose($file);

            echo "ok";
            

        } catch (PDOException $e) {
            echo "Error en sentencia SQL ".$e->getMessage();
        }
        
        break;
        

    }  

}
