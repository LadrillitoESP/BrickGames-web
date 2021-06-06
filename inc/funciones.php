<?php


/**
 * @param array Se le pasa un array y lo devuelve filtrado.

 */
function limpiarFiltrar($arrayFormulario)
{
    foreach ($arrayFormulario as $campo => $valor)
    {
        $arrayFormulario[$campo]=htmlspecialchars(trim($arrayFormulario[$campo]));
    }

    return $arrayFormulario;
}

