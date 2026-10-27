<?php
    require "../config/Conexion.php";

    Class Empleado{
        public function __construct() {
            
        }

        public function insertar_empleado($nombres_empleado,$apellidos_empleado,$fecha_nacimiento_empleado,$iddepartamento){
            //generar codigo empleado
            $sql_update_corr = "UPDATE correlativos SET correlativo_empleado = correlativo_empleado + 1 WHERE idcorrelativo = '1'";
            ejecutarConsulta($sql_update_corr);

            $sql_select_corr = "SELECT correlativo_empleado FROM correlativos WHERE idcorrelativo = '1'";
            $correlativo_info = ejecutarConsultaSimpleFila($sql_select_corr);
            $numero = $correlativo_info["correlativo_empleado"];
            
            $codigo_empleado = 'EMP-' . str_pad($numero, 4, '0', STR_PAD_LEFT);

            $sql_insetar = "INSERT INTO empleados(codigo_empleado, nombres_empleado, apellidos_empleado, fecha_nacimiento_empleado, iddepartamento)
                VALUES ('$codigo_empleado', '$nombres_empleado', '$apellidos_empleado', '$fecha_nacimiento_empleado', '$iddepartamento')";
            
            if(ejecutarConsulta($sql_insetar)){
                return true;
            }else{
                return false;
            }
        }

        public function listar(){
            $sql_listar = "SELECT
                e.idempleado,
                e.codigo_empleado,
                e.nombres_empleado,
                e.apellidos_empleado,
                e.fecha_nacimiento_empleado,
                d.codigo_departamento,
                d.nombre_departamento
            FROM empleados e
            INNER JOIN departamentos d ON e.iddepartamento = d.iddepartamento";
            
            return ejecutarConsulta($sql_listar);
        }

        public function mostrar($idempleado){
            $sql_mostrar = "SELECT
                e.idempleado,
                e.codigo_empleado,
                e.nombres_empleado,
                e.apellidos_empleado,
                e.fecha_nacimiento_empleado,
                e.iddepartamento,
                d.codigo_departamento,
                d.nombre_departamento
            FROM empleados e
            INNER JOIN departamentos d ON e.iddepartamento = d.iddepartamento
            WHERE e.idempleado = '$idempleado'";
            
            return ejecutarConsultaSimpleFila($sql_mostrar);
        }

        public function editar_empleado($idempleado,$nombres_empleado,$apellidos_empleado,$fecha_nacimiento_empleado,$iddepartamento){
            $sql_editar = "UPDATE empleados
                SET
                    nombres_empleado = '$nombres_empleado',
                    apellidos_empleado = '$apellidos_empleado',
                    fecha_nacimiento_empleado = '$fecha_nacimiento_empleado',
                    iddepartamento = '$iddepartamento'
                WHERE idempleado = '$idempleado'";

            if(ejecutarConsulta($sql_editar)){
                return true;
            }else{
                return false;
            }
        }

        public function eliminar_empleado($idempleado){
            $sql_eliminar = "DELETE FROM empleados WHERE idempleado = '$idempleado'";
            if(ejecutarConsulta($sql_eliminar)){
                return true;
            }else{
                return false;
            }
        }
    }
?>