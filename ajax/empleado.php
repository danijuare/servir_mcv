<?php
require_once "../Modelos/Empleado.php";

$empleado = new Empleado();

$idempleado = isset($_POST["idempleado"]) ? limpiarCadena($_POST["idempleado"]) : "";
$nombres_empleado = isset($_POST["nombres_empleado"]) ? limpiarCadena($_POST["nombres_empleado"]) : "";
$apellidos_empleado = isset($_POST["apellidos_empleado"]) ? limpiarCadena($_POST["apellidos_empleado"]) : "";
$fecha_nacimiento_empleado = isset($_POST["fecha_nacimiento_empleado"]) ? limpiarCadena($_POST["fecha_nacimiento_empleado"]) : "";
$iddepartamento = isset($_POST["iddepartamento"]) ? limpiarCadena($_POST["iddepartamento"]) : "";

switch ($_GET["op"]){
    case 'guardaryeditar':
        if (empty($idempleado)){
            $respuesta = $empleado->insertar_empleado($nombres_empleado, $apellidos_empleado, $fecha_nacimiento_empleado, $iddepartamento);
            if ($respuesta) {
                echo "Empleado registrado con exito";
            } else {
                echo "No se pudieron registrar todos los datos";
            }
        } else {
            $respuesta = $empleado->editar_empleado($idempleado, $nombres_empleado, $apellidos_empleado, $fecha_nacimiento_empleado, $iddepartamento);
            if ($respuesta) {
                echo "Empleado actualizado con exito";
            } else {
                echo "Error al actualizar el empleado";
            }
        }
        break;

    case 'eliminar':
        $respuesta = $empleado->eliminar_empleado($idempleado);
        if ($respuesta) {
            echo "Empleado eliminado con exito";
        } else {
            echo "No se pudo eliminar el empleado";
        }
        break;

    case 'mostrar':
        $rspta = $empleado->mostrar($idempleado);
        echo json_encode($rspta);
        break;

    case 'listar':
        $rspta = $empleado->listar();
        $data = array();

        while ($reg = $rspta->fetch_object()){
            $data[] = array(
                "0" => '<button class="btn btn-warning btn-sm text-white" onclick="mostrar('.$reg->idempleado.')" title="Editar"><i class="fa fa-pencil"></i></button> '.
                       '<button class="btn btn-danger btn-sm" onclick="eliminar('.$reg->idempleado.')" title="Eliminar"><i class="fa fa-trash"></i></button>',
                "1" => $reg->codigo_empleado,
                "2" => $reg->nombres_empleado,
                "3" => $reg->apellidos_empleado,
                "4" => $reg->fecha_nacimiento_empleado,
                "5" => $reg->nombre_departamento
            );
        }
        
        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecords" => count($data),
            "aaData" => $data
        );
        echo json_encode($results);
        break;
}
?>